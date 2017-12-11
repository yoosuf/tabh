<?php

namespace App\Http\Controllers\App;

use App\Entities\Product;
use App\Http\Controllers\Controller;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Mockery\Exception;

class CartController extends Controller
{
    private $product;

    /**
     * CartController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
//        $url = $request->fullUrl();

        $product = $this->product->find($request->id);

        Cart::add(['id' => $product->id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price]);

        return back()->withInput();
    }

    public function remove(Request $request)
    {
        $item = Cart::get($request->id);

        Cart::update($request->id, $item->qty-1);

        return back()->withInput();
    }

    public  function show(Request $request)
    {
        try {
            Cart::store($request->session()->getId());
        }
        catch (\Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException $e)
        {

        }
        return view('app.checkouts.index');
    }
}
