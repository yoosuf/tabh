<?php

namespace App\Http\Controllers\App;

use App\Entities\Partner;
use App\Entities\Product;
use App\Http\Controllers\Controller;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class CartController extends Controller
{
    private $product;
    private $partner;

    /**
     * CartController constructor.
     * @param Product $product
     */
    public function __construct(Product $product, Partner $partner)
    {
        $this->product = $product;
        $this->partner = $partner;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $product = $this->product->find($request->id);

        Cart::add(['id' => $product->id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price]);


        if($request->ajax()){
            return response()->json(['message' => $product->title . ' added to cart', 'statusText'=> 'OK'], 200);
        }

        return back()->withInput();
    }

    public function remove(Request $request)
    {
        $item = Cart::get($request->id);

        Cart::update($request->id, $item->qty-1);

        return back()->withInput();
    }

    public function show(Request $request)
    {
        $grouped = $this->group_by_partner();

        $addresses = [];
        if (Auth::check())
        {
            $addresses = Auth::user()->addresses()->get();
        }

        return view('app.checkouts.index', compact('grouped', 'addresses'));
    }

    private function group_by_partner()
    {
        $collection = collect([]);
        $items = Cart::content();

//        dd($items);

        foreach ($items as $item)
        {
            $product = $this->product->find($item->id);
            $collection->push(['partner' => $product->partner()->first()->name,
                'item' => $item
            ]);
        }

        return $collection->groupBy('partner');
    }
}
