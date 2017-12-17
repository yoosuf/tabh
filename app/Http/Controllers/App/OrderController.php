<?php

namespace App\Http\Controllers\App;

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

class OrderController extends Controller
{
    private $product;
    private $partner;
    private $order;
    private $line_item;

    /**
     * OrderController constructor.
     * @param Product $product
     * @param Partner $partner
     * @param Order $order
     */
    public function __construct(Product $product, Partner $partner, Order $order, LineItem $line_item)
    {
        $this->product = $product;
        $this->partner = $partner;
        $this->order = $order;
        $this->line_item = $line_item;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function placeOrder(Request $request)
    {

        $request->validate([
            'total_amount' => 'required',
            'address_id' => 'required|exists:addresses,id',
            'attachment_id' => 'required|exists:attachments,id',
            'user_id' => 'required|exists:users,id',
        ], [
            'total_amount.required' => 'Empty value is not allowed',
            'attachment_id.required' => 'A prescription is required',
            'attachment_id.exists' => 'Not an existing prescription ID',
            'address_id.required' => 'An address is required',
            'address_id.exists' => 'Not an existing prescription ID',
            'user_id.required' => 'A User is required',
            'user_id.exists' => 'Not an existing user ID',
        ]);


        $identifier = $request->session()->getId() . '/' . Carbon::now();
        try {
            Cart::store($identifier);
        } catch (\Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException $e) {

        }

        $order = Auth::user()->orders()->create([
            'cart_identifier' => $identifier,
            'total_amount'  => $request->has('total_amount') ? $request->total_amount : '0',
            'total_discount'  => $request->has('total_discount') ? $request->total_discount : '0',
            'tax'  => $request->has('tax') ? $request->tax : '0',
        ]);

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
