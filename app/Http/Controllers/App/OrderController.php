<?php

namespace App\Http\Controllers\App;

use Carbon\Carbon;
use App\Entities\City;
use App\Entities\Order;
use App\Entities\Country;
use App\Entities\Address;
use App\Entities\Partner;
use App\Entities\Product;
use App\Entities\District;
use App\Entities\LineItem;
use App\Entities\CouponCode;
use Illuminate\Http\Request;
use App\Jobs\App\Order\NewOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCheckout(Request $request)
    {
        $addresses = [];
        $grouped = $this->group_by_partner();

        if (auth()->check()) {
            $addresses = $request->user()->addresses()->get();
        }
        return view('app.checkouts.index', compact('grouped', 'addresses'));
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function discard()
    {
        Cart::destroy();
        return redirect()->to('search?type=pharmaceutical');
    }

    /**
     * @param $request
     * @return mixed
     */
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

    /**
     * @param $user
     * @param $order
     * @param $address
     * @param $request
     * @return mixed
     */
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

    /**
     * @param $request
     * @param $order
     */
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


    public function getOrderSummery()
    {
        $grand_total = 0;
        $grand_discount = 0;
        $delivery_charges_for_partners = collect([]);
        $grouped = $this->group_by_partner();


        $partnerCollection = [];
        foreach ($grouped as $key => $partner) {


            $partnerCollection = $partner;


//            $partner_products = [];
//            foreach ($partner as $item) {
//
//
//
//                $partner_products['partners'] = $item;
//
//            }

            $partner_total = 0;
//            $discount_percentage = \App\Entities\Partner::where('name', $key)->first()['preferences']['discount_percentage'];
//            $min_discount_amount = \App\Entities\Partner::where('name', $key)->first()['preferences']['min_discount_amount'];
//            $delivery_charge = \App\Entities\Partner::where('name', $key)->first()['preferences']['delivery_charge'];

//            $partnerProducts = [];
//            foreach ($partner as $item) {

//                $item['partner'] = $partner;
//                $partner_total = $partner_total + ($item['item']->qty * number_format(((float)$item['item']->price), 2, '.', ''));
//                number_format(((float)$item['item']->price), 2, '.', '');
//                number_format(((float)$item['item']->qty * (float)$item['item']->price), 2, '.', '');
//
//                $partnerProducts = $item;
//            }

        }


        return $partnerCollection;

    }


    /**
     * @return static
     */
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
