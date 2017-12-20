<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Order;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    private $order;
    private $customer;

    public function __construct(Order $order, User $customer)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;

        if ($request->has('customer_id') && $request->get('customer_id') != '') {
            $customer_id = $request->get('customer_id');
            $customer = $this->customer->find($request->get('customer_id'));

            if ($request->has('status') && $request->get('status') != '') {
                $status = $request->get('status');
                $orders = $customer->orders()->where('status', $request->get('status'))->orderBy('id', 'asc')->paginate($limit);
            } else {
                $orders = $customer->orders()->orderBy('id', 'asc')->paginate($limit);
            }
        } else {
            if ($request->has('status') && $request->get('status') != '') {
                $status = $request->get('status');
                $orders = $this->order->where('status', $request->get('status'))->orderBy('id', 'asc')->paginate($limit);
            } else {
                $orders = $this->order->orderBy('id', 'asc')->paginate($limit);
            }

        }

        $querystringArray = ['customer_id' => $request->get('customer_id'), 'status' => $request->get('status')];

        $customers = $this->customer->orderBy('id', 'desc')->get();

        $orders->appends($querystringArray);

        $request_status = DB::table('orders')
            ->select('status')
            ->groupBy('status')
            ->get();

        return view('admin.orders.index', get_defined_vars());
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

        flash('Approved')->success();
        return back()->withInput();
    }

    public function reject($id, Request $request)
    {
        $order = $this->order->find($id);

        $order->status = 'Rejected by Admin';
        $order->is_approved_by_admin = false;

        $order->save();

        flash('Rejected')->success();
        return back()->withInput();
    }

    public function show($id, Request $request)
    {
        $order = $this->order->find($id);

        $line_items = $order->line_items()->get();

        return view('admin.orders.show', get_defined_vars());
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