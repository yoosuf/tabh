<?php
/**
 * Created by PhpStorm.
 * User: yoosuf
 * Date: 11/27/17
 * Time: 7:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->middleware('admin');
    }

    public function index(Request $request)
    {

        $orders = $this->order->All();
        return view('admin.orders.index', compact('orders'));
    }

    public function create(Request $request)
    {

    }

    public function approve($id, Request $request)
    {
        $order = $this->order->find($id);

        $order->status = 'Approved by Admin';
        $order->is_approved_by_admin = true;

        $order->save();

        return back()->withInput();
    }

    public function reject($id, Request $request)
    {
        $order = $this->order->find($id);

        $order->status = 'Rejected by Admin';
        $order->is_approved_by_admin = false;

        $order->save();

        return back()->withInput();
    }

    public function show($id, Request $request)
    {
        $order = $this->order->find($id);

        $line_items = $order->line_items()->get();

        return view('admin.orders.show', compact('order', 'line_items'));
    }

    public function store(Request $request)
    {

    }


    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id, Request $request)
    {

    }

}