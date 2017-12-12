<?php

namespace App\Http\Controllers\App\Account;


use App\Entities\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->middleware('auth');
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->all();
        return view('app.account.orders.index', compact('orders'));
    }

}