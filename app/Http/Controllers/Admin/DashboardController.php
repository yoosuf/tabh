<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Entities\Order;
use App\Entities\Partner;
use App\Entities\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    protected $order;
    protected $customer;
    protected $partner;
    protected $product;

    public function __construct(Order $order, User $customer, Partner $partner, Product $product)
    {
        $this->middleware('admin');
        $this->order = $order;
        $this->customer = $customer;
        $this->partner = $partner;
        $this->product = $product;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = [
            'order_total_count' => $this->order->count(),
            'order_completed_count' => $this->order->where('status', 'Completed')->count(),
            'customer_count' => $this->customer->count(),
            'customer_active_count' => $this->customer->where('banned', true)->count(),
            'customer_de_active_count' => $this->customer->where('banned', false)->count(),
            'product_count' => $this->product->count(),
            'product_active_count' => $this->product->where('published', true)->count(),
            'product_de_active_count' => $this->product->where('published', false)->count(),
            'partner_count' => $this->partner->count(),
            'partner_active_count' => $this->partner->where('is_active', true)->count(),
            'partner_de_active_count' => $this->partner->where('is_active', false)->count(),
        ];
        return view('admin.dashboard', get_defined_vars());
    }
}
