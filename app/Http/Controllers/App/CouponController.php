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
            'order_discunt_code' => 'nullable|exists:coupon_codes,code',
        ]);

        $discuntCode = $request->get('order_discunt_code');
        $data = $this->couponcode
            ->whereCode($discuntCode)
            ->first();

        $grouped = $this->group_by_partner();

        $addresses = [];
        if (\Auth::check())
        {
            $addresses = \Auth::user()->addresses()->get();
        }
        

        return view('app.checkouts.index', compact('grouped', 'addresses', 'data'));

    }

     private function group_by_partner()
    {
        $collection = collect([]);
        $items = \Cart::content();

//        dd($items);

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
