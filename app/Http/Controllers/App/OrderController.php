<?php

namespace App\Http\Controllers\App;

use App\Entities\Address;
use App\Entities\Country;
use App\Entities\LineItem;
use App\Entities\Order;
use App\Entities\Partner;
use App\Entities\Product;
use App\Http\Controllers\Controller;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    private $product;
    private $partner;
    private $order;
    private $line_item;
    private $address;

    private $cart;

    /**
     * OrderController constructor.
     * @param Product $product
     * @param Partner $partner
     * @param Order $order
     * @param LineItem $line_item
     * @param Address $address
     * @param Cart $cart
     */
    public function __construct(Product $product, Partner $partner, Order $order, LineItem $line_item, Address $address, Cart $cart)
    {
        $this->product = $product;
        $this->partner = $partner;
        $this->order = $order;
        $this->line_item = $line_item;
        $this->address = $address;
        $this->cart = $cart;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function placeOrder(Request $request)
    {
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
             $request->validate([
                 'address_name' => 'required|string|max:255',
                 'address_phone' => 'required',
                 'address_line_1' => 'required|string|max:255',
                 'address_line_2' => 'nullable|string|max:255',
                 'address_city' => 'required|string|max:255',
                 'address_postcode' => 'required|string|max:255',
                 'address_country' => 'required|string|max:255',
                 'address_province' => 'required|string|max:255',
             ], [
                 'address_name.required' => 'Name is required',
                 'address_phone.required' => 'Phone is required',
                 'address_line_1.required' => 'Line 1 is required',
                 //'address_line_2.required' => 'Line 2 is required',
                 'address_city.required' => 'City is required',
                 'address_postcode.required' => 'Postcode is required',
                 'address_province.required' => 'Province is required',
                 'address_country.required' => 'Country is required',
             ]);

            $address = Auth::user()->addresses()->create([
                'name' => $request->get('address_name'),
                'phone' => $request->get('address_phone'),
                'address1' => $request->get('address_line_1'),
                'address2' => $request->get('address_line_2'),
                'city' => $request->get('address_city'),
                'province' => $request->get('address_province'),
                'postcode' => $request->get('address_postcode'),
                'country' => $request->get('address_country'),
                'default' => true,
            ]);

            $addressData = [
                'name' => $request->get('address_name'),
                'phone' => $request->get('address_phone'),
                'address1' => $request->get('address_line_1'),
                'address2' => $request->get('address_line_2'),
                'city' => $request->get('address_city'),
                'postcode' => $request->get('address_postcode'),
                'province' => $request->get('address_province'),
                'country' => $request->get('address_country'),
                'default' => true,
            ];
        } else {
            $address = $this->address->find($request->get('address'));

            $addressData = [
                'name' => $address->name,
                'phone' => $address->phone,
                'address1' => $address->line1,
                'address2' => $address->line2,
                'city' => $address->city,
                'postcode' => $address->postcode,
                'province' => $address->province,
                'country' => $address->country,
                'default' => true,
            ];
        }

        $identifier = $request->session()->getId() . '/' . Carbon::now();
        try {
            Cart::store($identifier);
        } catch (\Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException $e) {

        }

        $order = Auth::user()->orders()->create([
            'cart_identifier' => $identifier,
            'total_amount' => $request->has('total_amount') ? $request->total_amount : '0',
            'total_discount' => $request->has('total_discount') ? $request->total_discount : '0',
            'tax' => $request->has('tax') ? $request->tax : '0',
        ]);

        $order->address()->updateOrCreate(['addressable_id' => $order->id, 'addressable_type' => 'App\Entities\Order'], $addressData);

        if ($request->hasFile('prescription')) {
            $path = Storage::putFile('attachments', $request->file('prescription'));
            $order->attachment()->updateOrCreate([
                'attachable_id' => $order->id,
                'attachable_type' => 'App\Entities\Order'],
                ['attachable_category' => 'medicine',
                    'path' => $path,
                    'file_name' => $request->prescription->getClientOriginalName()]);
        }

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

        return redirect()->route('account.orders');

    }

    public function discard(Request $request)
    {
        Cart::destroy();

        return redirect('/');
    }


}
