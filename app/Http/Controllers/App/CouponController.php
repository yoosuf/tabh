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


    public function validateCouponCode(Request $request)
    {


        $request->validate([
            'order_discount_code' => 'nullable|exists:coupon_codes,code',
        ],[
          'order_discount_code.exists' => 'The discount code is invalid.'
        ]);

        $discountCode = $request->get('order_discount_code');
        $data = $this->couponcode
            ->whereDate('expires_at', '>=', Carbon::today()->toDateString())
            ->whereCode($discountCode)
            ->first();

        if (!isset($data)) {
            return redirect()->back()->withInput($request->input())->with('danger', 'The discount code is expired.');
        } else {



            if ($data->reward_type == "percent") {
                $discountVal = $data->reward . '%' ;
            } else {
                $discountVal = '৳ '. $data->reward;
            }


            $request->session()->put('discount.type', $data->reward_type);
            $request->session()->put('discount.amount', $data->reward);
            $request->session()->put('discount.formatted', $discountVal);

            return redirect()->back()->withInput($request->input())->with('status', "That's a valid discount code  and enjoy " . $discountVal);

        }
    }

    private function group_by_partner()
    {
        $collection = collect([]);
        $items = \Cart::content();


        foreach ($items as $item) {
            $product = \App\Entities\Product::find($item->id);
            $collection->push(['partner' => $product->partner()->first()->name,
                'item' => $item
            ]);
        }

        return $collection->groupBy('partner');
    }

}
