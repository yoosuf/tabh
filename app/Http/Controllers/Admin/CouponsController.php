<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entities\CouponCode;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    protected $couponcode;

    public function __construct(CouponCode $couponcode)
    {
        $this->middleware('admin');
        $this->couponcode = $couponcode;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $data = $this->couponcode->orderBy('id', 'desc')->paginate($limit);

        return view('admin.settings.coupons.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.settings.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupon_codes|min:6|max:255',
            'reward_type' => 'required|in:fixed,percent',
            'reward' => 'required',
            'expires_at' => 'required|date'
        ], [
            'code.required' => 'Discount code field is required.',
            'code.unique' => 'Discount code already taken.',
            'expires_at.required' => 'Expiry date is required.',

        ]);

        $this->couponcode->create([
            'code' => $request->get('code'),
            'reward_type' => $request->get('reward_type'),
            'reward' => $request->get('reward'),
            'expires_at' => $request->get('expires_at'),
        ]);

        return redirect()->to('/admin/settings/coupons');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param CouponCode $couponcode
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponCode $couponcode, $id)
    {
        $item = $couponcode->find($id);

        return view('admin.settings.coupons.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CouponCode $couponcode
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponCode $couponcode, $id)
    {
        $data = $couponcode->find($id);

        $request->validate([
            'code' => 'required|min:6|max:255|unique:coupon_codes,code,' . $id,
            'reward_type' => 'required|in:fixed,percent',
            'reward' => 'required',
            'expires_at' => 'required|date'
        ], [
            'code.required' => 'Discount code field is required.',
            'code.unique' => 'Discount code already taken.',
            'expires_at.required' => 'Expiry date is required.',

        ]);


        $data->update([
            'code' => $request->get('code'),
            'reward_type' => $request->get('reward_type'),
            'reward' => $request->get('reward'),
            'expires_at' => $request->get('expires_at'),
        ]);
        return redirect()->to('/admin/settings/coupons')->with('status', 'Successfully updated');

    }

}
