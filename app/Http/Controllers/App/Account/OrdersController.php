<?php

namespace App\Http\Controllers\App\Account;

use App\Entities\LineItem;
use App\Entities\Order;
use App\Http\Controllers\Controller;
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
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $orders = $this->order->mine()->paginate($limit);
        return view('app.account.orders.index', get_defined_vars());
    }

    public function show(Request $request)
    {
        $user = $request->user();
        $order = $this->order->mine()->find($request->id);
        $line_items = $order->line_items()->get();
        $prescription = get_attachment($order->attachment()->first());
        return view('app.account.orders.order', get_defined_vars());
    }
}
