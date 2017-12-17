<?php

namespace App\Http\Controllers\App;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $product;

    /**
     * SearchController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
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

        if($type == 'pharmaceutical') {
            $products = $this->product->where('published', true)
                ->where('title', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('generic_name', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('product_type', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('packsize', 'ILIKE', '%' . $search_query . '%')
                ->limit(10)->get();
        } else if ($type == "groceries") {
            $products = [];
        }

        return view('app.results', get_defined_vars());
    }
}
