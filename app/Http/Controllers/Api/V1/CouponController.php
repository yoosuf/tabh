<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Entities\CouponCode;
use \Carbon\Carbon;

class CouponController extends ApiController
{

    protected $couponcode;


    /**
     * Create a new CouponController instance.
     *
     * @return void
     */
    public function __construct(CouponCode $couponcode)
    {
        $this->couponcode = $couponcode;
    }


    public function validateCouponCode(Request $request) {

        
        $request->validate([
            'order_discunt_code' => 'required|exists:coupon_codes,code',
        ]);

        $discuntCode = $request->get('order_discunt_code');
        $data = $this->couponcode
            ->whereCode($discuntCode)
            ->first();

        $payload = [
            "data" => $data
        ];

        return response()->json($payload, 200);
    }

}
