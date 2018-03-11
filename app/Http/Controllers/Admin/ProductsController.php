<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Product;
use App\Entities\Partner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $product;
    private $partner;

    public function __construct(Product $product, Partner $partner)
    {
        $this->product = $product;
        $this->partner = $partner;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $products = $this->product->orderBy('id', 'desc')->paginate($limit);
        $querystringArray = ['partner_id' => $request->get('partner_id'), 'status' => $request->get('status')];
        $partners = $this->partner->get();
        $products->appends($querystringArray);
        return view('admin.products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $partners = $this->partner->all();
        return view('admin.products.create', get_defined_vars());
    }

    /***
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->productValidateRequest($request);
        $product = $this->productUpdateOrCreate($request);
        $this->productImageUpload($request, $product);
        flash('Successfully created')->success();
        return redirect()->route('admin.products.edit', ['id' => $product->id]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $product = $this->product->find($id);
        $image = str_replace("/storage/attachments/", "", getAttachmentURL($product->attachment()->first()));
        $partners = $this->partner->all();
        return view('admin.products.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->productValidateRequest($request);
        $product = $this->productUpdateOrCreate($request);
        $this->productImageUpload($request, $product);
        flash('Successfully updated')->success();
        return redirect()->route('admin.products.edit', ['id' => $request->id]);
    }


    private function productValidateRequest($request)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'product_body' => 'max:2500',
            'product_vendor' => 'required|max:255',
            'product_generic_name' => 'required',
            'product_type' => 'required|max:255',
            'product_size' => 'required|max:255',
            'product_price' => 'required|max:255',
            'product_kind' => 'required',
            'product_partner' => 'required',
            'product_published' => 'required|boolean',

        ]);
    }


    private function productUpdateOrCreate($request)
    {
        $productData = [
            'title' => $request->get('product_name'),
            'body_html' => $request->get('product_body'),
            'vendor' => $request->get('product_vendor'),
            'product_type' => $request->get('product_type'),
            'generic_name' => $request->get('product_generic_name'),
            'packsize' => $request->get('product_size'),
            'price' => $request->get('product_price'),
            'kind' => $request->get('product_kind'),
            'partner_id' => $request->has('product_partner') ? $request->get('product_partner') : $request->product_partner,
            'published' => $request->has('product_published') ? $request->get('product_published') : false,
        ];

        if (isset($request->id)) {
            return $this->product->updateOrCreate(['id' => $request->id], $productData);
        } else {
            return $this->product->create($productData);
        }
    }


    private function productImageUpload($request, $product)
    {

        if ($request->hasFile('image')) {
            $path = Storage::putFile('attachments', $request->file('image'));

            $product->attachment()->updateOrCreate([
                'attachable_id' => $product->id,
                'attachable_type' => 'App\Entities\Product'
            ], [
                'attachable_category' => 'product',
                'path' => $path,
                'file_name' => $request->image->getClientOriginalName()
            ]);
        }
    }

}
