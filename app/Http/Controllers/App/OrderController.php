<?php

namespace App\Http\Controllers\App;

use Carbon\Carbon;
use App\Entities\Address;
use App\Entities\City;
use App\Entities\District;
use App\Entities\Country;

use App\Entities\CouponCode;
use App\Entities\LineItem;
use App\Entities\Order;
use App\Entities\Partner;
use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Jobs\App\Order\NewOrder;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{
    private $product;
    private $partner;
    private $order;
    private $line_item;
    private $address;
    private $city;
    private $province;
    private $country;

    private $cart;

    private $couponcode;

    /**
     * OrderController constructor.
     * @param Product $product
     * @param Partner $partner
     * @param Order $order
     * @param LineItem $line_item
     * @param Address $address
     * @param Cart $cart
     * @param CouponCode $couponcode
     * @param City $city
     * @param District $province
     * @param Country $country
     */
    public function __construct(Product $product,
                                Partner $partner,
                                Order $order,
                                LineItem $line_item,
                                Address $address,
                                Cart $cart,
                                CouponCode $couponcode,
                                City $city,
                                District $province,
                                Country $country)
    {
        $this->product = $product;
        $this->partner = $partner;
        $this->order = $order;
        $this->line_item = $line_item;
        $this->address = $address;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->couponcode = $couponcode;
    }




    public function getCheckout(Request $request)
    {
        $grouped = $this->group_by_partner();
        $addresses = [];
        if (Auth::check()) {
            $addresses = Auth::user()->addresses()->get();
        }
        return view('app.checkouts.index', compact('grouped', 'addresses'));
    }



    public function summery(Request $request)
    {

        $grand_total = 0;
        $grand_discount = 0;
        $delivery_charges_for_partners = collect([]);
        $grouped = $this->group_by_partner();


        $request->validate([
            'order_discount_code' => 'nullable|exists:coupon_codes,code',
        ]);


        if ($request->has('order_discount_code')) {

            $validCode = $this->couponcode
                ->whereDate('expires_at', '>=', Carbon::today()->toDateString())
                ->whereCode($request->get('order_discount_code'))
                ->first();


            return [
                'type' => $validCode->reward_type == "percent" ? '%' : null,
                'amount' => $validCode->reward
            ];

        }

        foreach ($grouped as $key => $partner) {
            $partner_total = 0;
            $discount_percentage = $this->partner->where('name', $key)->first()['preferences']['discount_percentage'];
            $min_discount_amount = $this->partner->where('name', $key)->first()['preferences']['min_discount_amount'];
            $delivery_charge = (float)$this->partner->where('name', $key)->first()['preferences']['delivery_charge'];
            $discount_amount = 0;

            foreach ($partner as $item) {
                $partner_total = $partner_total + ($item['item']->qty * number_format(((float)$item['item']->price), 2, '.', ''));
                $item_name = $item['item']->name;
                $iten_price = number_format(((float)$item['item']->price), 2, '.', '');
                $item_qty = $item['item']->qty;
                $total = number_format(((float)$item['item']->qty * (float)$item['item']->price), 2, '.', '');
            }


            $delivery_charges_for_partners->put($this->partner->where('name', $key)->first()->id, $delivery_charge);

            if ($delivery_charge != 0) {
                $partner_total = $partner_total + $delivery_charge;

            }


            if ($min_discount_amount <= $partner_total) {
                $discount_amount = ($partner_total / 100) * $discount_percentage;
                $partner_total = $partner_total - $discount_amount;
            }
        }


        return [
            'grouped' => $partner,
            'partner_total' => $partner_total,
            'delivery_charge' => $delivery_charge,
            'discount_amount' => $discount_amount
        ];
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function placeOrder(Request $request)
    {


        $user = $request->user();

        $request->validate([
            'total_amount' => 'required',
            'prescription' => 'required',
            'address' => 'required',
        ], [
            'total_amount.required' => 'Empty value is not allowed',
            'address.required' => 'A delivery address is required',
            'prescription.required' => 'A prescription is required',
        ]);

        if ($request->get('address') == "-1") {
            $this->addressRequestValidate($request);
            $this->addressCreateOrUpdate($user, $order = null, $address = null, $request);
        } else {
            $address = $this->address->find($request->get('address'));
        }

        $identifier = $request->session()->getId() . '/' . Carbon::now();

        try {
            Cart::store($identifier);
        } catch (\Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException $e) {
        }

        $deliveryDataArray = collect([]);

        if ($request->has('delivery')) {
            foreach ($request->get('delivery') as $item) {
                $deliveryData = collect([]);
                $pieces = explode("-", $item);
                $deliveryData->put('partner_id', $pieces[0]);
                $deliveryData->put('delivery_amount', $pieces[1]);
                $deliveryDataArray->push($deliveryData);
            }
        }

        $order = $user->orders()->create([
            'cart_identifier' => $identifier,
            'total_amount' => $request->has('total_amount') ? $request->total_amount : '0',
            'total_discount' => $request->has('total_discount') ? $request->total_discount : '0',
            'tax' => $request->has('tax') ? $request->tax : '0',
            'payment_type' => $request->has('payment_type') ? $request->payment_type : 'cash',
            'meta' => $deliveryDataArray,
        ]);

        $this->addressCreateOrUpdate($user = null, $order, $address, $request);

        $this->uploadPrescription($request, $order);


        foreach (Cart::content() as $item) {
            $product = $this->product->find($item->id);
            $partner = $product->partner()->first();

            $line_item = $this->line_item->create([
                'rowId' => $item->rowId,
                'quantity' => $item->qty,
                'order_id' => $order->id,
                'partner_id' => $partner->id,
                'product_id' => $product->id
            ]);
        }
        Cart::destroy();

        // $user->notify(new NewOrder($order));

        // Mail::to($request->user()->email)->send(new NewOrder($order));

        NewOrder::dispatch($user, $order);
        return redirect()->route('account.orders');

    }

    public function discard(Request $request)
    {
        Cart::destroy();
        return redirect()->to('search?type=pharmaceutical');
    }


    private function addressRequestValidate($request)
    {
        return $request->validate([
            'address_name' => 'required|string|max:255',
            'address_phone' => 'nullable',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',
        ], [
            'address_name.required' => 'Name is required',
            'address_phone.required' => 'Phone is required',
            'address_line_1.required' => 'Line 1 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
        ]);
    }

    private function addressCreateOrUpdate($user, $order, $address, $request)
    {

        if (isset($user)) {
            $addressableId = $user->id;
            $addressableType = \App\Entities\User::class;
        } else {
            $addressableId = $order->id;
            $addressableType = \App\Entities\Order::class;
        }


        $cityData = $this->city->find($request->get('address_city'));
        $provinceData = $this->province->find($request->get('address_province'));
        $countryData = $this->country->find(18);

        return $this->address->updateOrCreate([
            'addressable_id' => $addressableId,
            'addressable_type' => $addressableType
        ], [
            'name' => isset($address['name']) ? $address['name'] : $request->get('address_name'),
            'phone' => isset($address['phone']) ? $address['phone'] : $request->get('address_phone'),
            'address1' => isset($address['address1']) ? $address['address1'] : $request->get('address_line_1'),
            'address2' => isset($address['address2']) ? $address['address2'] : $request->get('address_line_2'),
            'city' => isset($address['city']) ? $address['city'] : $cityData->name,
            'city_id' => isset($address['city_id']) ? $address['city_id'] : $cityData->id,
            'district' => isset($address['district']) ? $address['district'] : $provinceData->name,
            'district_id' => isset($address['district_id']) ? $address['district_id'] : $provinceData->id,
            'postcode' => isset($address['district_id']) ? $address['district_id'] : $request->get('address_postcode'),
            'country' => isset($address['country']) ? $address['country'] : $countryData->nice_name,
            'country_id' => isset($address['country_id']) ? $address['country_id'] : $countryData->id,
            'default' => true,
        ]);


    }


    private function uploadPrescription($request, $order)
    {
        if ($request->hasFile('prescription')) {
            $path = Storage::putFile('attachments', $request->file('prescription'));
            $order->attachment()->updateOrCreate([
                'attachable_id' => $order->id,
                'attachable_type' => \App\Entities\Order::class],
                ['attachable_category' => 'prescription',
                    'path' => $path,
                    'file_name' => $request->prescription->getClientOriginalName()]);
        }
    }


    private function group_by_partner()
    {
        $collection = collect([]);
        $items = Cart::content();
        foreach ($items as $item) {
            $product = $this->product->find($item->id);
            $collection->push(['partner' => $product->partner()->first()->name,
                'item' => $item
            ]);
        }

        return $collection->groupBy('partner');
    }
}
