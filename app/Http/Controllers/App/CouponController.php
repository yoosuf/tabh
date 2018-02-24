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
     * @return void
     */
    public function __construct(CouponCode $couponcode)
    {
        $this->couponcode = $couponcode;
        $this->middleware('auth');
    }


    public function validateCouponCode(Request $request) {

        
        $request->validate([
            'order_discount_code' => 'nullable|exists:coupon_codes,code',
        ]);

        $discountCode = $request->get('order_discount_code');
        $data = $this->couponcode
            ->whereDate('expires_at', '>=', Carbon::today()->toDateString())
            ->whereCode($discountCode)
            ->first();


         if (empty($data)){
             return redirect()->back()->with('danger', 'Coupon code is expired!');
         }




        $grouped = $this->group_by_partner();

        $addresses = [];
        if (\Auth::check())
        {
            $addresses = \Auth::user()->addresses()->get();
        }
        

        return view('app.checkouts.index', compact('grouped', 'addresses', 'data', 'discountCode'));

    }

     private function group_by_partner()
    {
        $collection = collect([]);
        $items = \Cart::content();


        foreach ($items as $item)
        {
            $product = \App\Entities\Product::find($item->id);
            $collection->push(['partner' => $product->partner()->first()->name,
                'item' => $item
            ]);
        }

        return $collection->groupBy('partner');
    }

}
