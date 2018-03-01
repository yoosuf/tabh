<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Entities\CouponCode;
use \Carbon\Carbon;
use App\Http\Controllers\Controller;


class CouponController extends Controller
{
    protected $couponcode;

    /**
     * Create a new CouponController instance.
     *
     * @param CouponCode $couponcode
     */
    public function __construct(CouponCode $couponcode)
    {
        $this->couponcode = $couponcode;
        $this->middleware('auth');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function validateCouponCode(Request $request)
    {
        $request->validate([
            'order_discount_code' => 'nullable|exists:coupon_codes,code',
        ], [
            'order_discount_code.exists' => 'The discount code is invalid.'
        ]);

        $discountCode = $request->get('order_discount_code');
        $data = $this->couponcode
            ->whereDate('expires_at', '>=', Carbon::today()->toDateString())
            ->whereCode($discountCode)
            ->first();

        if (!isset($data)) {
            $request->session()->forget('discount');
            return redirect()->back()->withInput($request->input())->with('danger', 'The discount code is expired.');
        } else {


            if ($data->reward_type == "percent") {
                $discountVal = $data->reward . '%';
            } else {
                $discountVal = '৳ ' . $data->reward;
            }

            $discountData = [
                'type' => $data->reward_type,
                'amount' => $data->reward,
                'formatted' => $discountVal
            ];

            $request->session()->put('discount', $discountData);

            return redirect()->back()->withInput($request->input())->with('status', "That's a valid discount code  and enjoy " . $discountVal);
        }
    }

}
