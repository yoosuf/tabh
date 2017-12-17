<?php

namespace App\Http\Controllers\App\Account;


use App\Entities\LineItem;
use App\Entities\Order;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $order;
    private $line_item;

    public function __construct(Order $order, LineItem $line_item)
    {
        $this->middleware('auth');
        $this->order = $order;
        $this->line_item = $line_item;
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $orders = $this->order->where('user_id', $user->id)->get();
        return view('app.account.orders.index', compact('orders'));
    }

    public function show(Request $request)
    {
        $user = $request->user();

        $order = $this->order->where('user_id', $user->id)->find($request->id);

//        dd($order);

        $line_items = $order->line_items()->get();

//        dd($line_items);

        return view('app.account.orders.order', compact('order','line_items'));
    }

}