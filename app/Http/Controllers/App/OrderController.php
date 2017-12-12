<?php

namespace App\Http\Controllers\App;

use App\Entities\Partner;
use App\Entities\Product;
use App\Http\Controllers\Controller;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Mockery\Exception;

class OrderController extends Controller
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

        return back()->withInput();
    }

    public function discard(Request $request)
    {
        Cart::destroy();

        return redirect('/');
    }


}
