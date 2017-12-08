<?php

namespace App\Http\Controllers\App;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $product;

    /**
     * Create a new controller instance.
     *
     * @return void
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
        $search_quary = $request->get('search');
        $type = $request->get('type');

        if($type == 'medecine') {
            $products = $this->product->where('title', 'ILIKE', '%' . $search_quary . '%')
                ->orWhere('generic_name', 'ILIKE', '%' . $search_quary . '%')
                ->orWhere('product_type', 'ILIKE', '%' . $search_quary . '%')
                ->orWhere('packsize', 'ILIKE', '%' . $search_quary . '%')
                ->limit(10)->get();
        }

//        $products = $this->product->paginate(10);
        return view('app.results', compact('products','search_quary', 'type'));
    }
}
