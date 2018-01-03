<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Entities\Product;
use App\Http\Resources\V1\Product as ProductResource;


class SearchController extends ApiController
{
    protected $product;

    /**
     * SearchController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function index(Request $request) {
        $search_query = $request->get('q');
        $type = $request->get('type');

        if($type == 'pharmaceutical') {
            $products = $this->product->inRandomOrder()->where('published', true)
                ->where('title', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('generic_name', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('product_type', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('packsize', 'ILIKE', '%' . $search_query . '%')
                ->get()
                ->filter(function ($item, $key)
                {
                    return $item->partner()->first()->is_active == true;
                })->take(10);
        } else if ($type == "groceries") {
            $products = [];
        }
        else {
            $products = [];
        }


        $data = ProductResource::collection($products);

        return response()->json($data, 200);
    }

    public function suggestion(Request $request) {

        $search_query = $request->get('q');
        $type = $request->get('type');

        if($type == 'pharmaceutical') {
            $products = $this->product->where('published', true)
                ->where('title', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('generic_name', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('product_type', 'ILIKE', '%' . $search_query . '%')
                ->orWhere('packsize', 'ILIKE', '%' . $search_query . '%')
                ->get()
                ->filter(function ($item, $key)
                {
                    return $item->partner()->first()->is_active == true;
                })
                ->pluck('generic_name')->toArray();

                $status_code = 200;
        } else if ($type == "groceries") {
            $products = ["error" => true, 'message' => 'No titles found'];
            $status_code = 400;

        } else {
            $products = ["error" => true, 'message' => 'Not a valied type'];
            $status_code = 422;
        }

        return response()->json($products, $status_code);
    }




    private function searchQuery()
    {

    }


    private function seaarchResult()
    {

    }
}
