<?php

namespace App\Http\Controllers\App;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    private $product;

    private $cart;

    /**
     * SearchController constructor.
     * @param Product $product
     */
    public function __construct(Product $product, Cart $cart)
    {
        $this->product = $product;
        $this->cart = $cart;
    }

    /***
     * Search Products.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search_query = $request->get('q');
        $type = $request->get('type');

        if ($type == 'pharmaceutical') {
            $products = $this->product->inRandomOrder()->where('published', true)
                ->where('title', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('generic_name', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('product_type', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('packsize', 'ILIKE', '%' . $search_query . '%')->get()
                ->filter(function ($item, $key) {
                    return $item->partner()->first()->is_active == true;
                })->take(10);
        } else if ($type == "groceries") {
            $products = [];
        } else {
            $products = [];
        }
        $cart = $this->cart->content();

//        if($request->ajax()){
//            return response()->json(['message' => 'Searched', 'statusText'=> 'OK'], 200);
//        }

        return view('app.results', get_defined_vars());
    }

    public function titles(Request $request)
    {
        $search_query = $request->get('q');
        $type = $request->get('type');

        if ($type == 'pharmaceutical') {
            $products = $this->product->where('published', true)
                ->where('title', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('generic_name', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('product_type', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('packsize', 'ILIKE', '%' . $search_query . '%')->get()
                ->filter(function ($item, $key) {
                    return $item->partner()->first()->is_active == true;
                })
                ->pluck('generic_name')->toArray();
        } else if ($type == "groceries") {
            $products = [];
        } else {
            $products = [];
        }
        return $products;
    }
}
