<?php
/**
 * Created by PhpStorm.
 * User: yoosuf
 * Date: 11/27/17
 * Time: 7:09 PM
 */

namespace App\Http\Controllers\Admin;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use App\Entities\Partner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Tests\DependencyInjection\RendererService;

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
     * @return Response
     */
    public function index(Request $request)
    {
//        return $request->get('partner_id');

        if ($request->has('partner_id') && $request->get('partner_id') != '') {
            $partner_id = $request->get('partner_id');
            $partner = $this->partner->find($request->get('partner_id'));

            if ($request->has('status') && $request->get('status') != '') {
                $status = $request->get('status');
                $products = $partner->products()->where('published', $request->get('status'))->orderBy('id', 'asc')->paginate(10);
            } else {
                $products = $partner->products()->orderBy('id', 'asc')->paginate(10);
            }
        } else {
            if ($request->has('status') && $request->get('status') != '') {
                $status = $request->get('status');
                $products = $this->product->where('published', $request->get('status'))->orderBy('id', 'asc')->paginate(10);
            } else {
                $products = $this->product->orderBy('id', 'asc')->paginate(10);
            }

        }

        $querystringArray = ['partner_id' => $request->get('partner_id'), 'status' => $request->get('status')];

        $partners = $this->partner->get();

        $products->appends($querystringArray);

        return view('admin.products.index', compact('products', 'partners', 'status', 'partner_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $partners = $this->partner->all();
        return view('admin.products.create', compact('partners'));
    }

    /***
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'partner' => 'required',
            'title' => 'required|max:255',
            'body_html' => 'max:2500',
            'vendor' => 'required|max:255',
            'product_type' => 'required|max:255',
            'packsize' => 'required|max:255',
            'price' => 'required|max:255',
            'product_kind' => 'required',
            'generic_name' => 'required',
            'published' => 'required|boolean',
        ]);

        $partner = $this->partner->where('name', $request->get('partner'))->first();
        if (!isset($partner)) {
            $errors = [
                'Partner Not Found'
            ];
            $partners = $this->partner->all();
            return view('admin.products.create', compact('partners', 'errors'));
        }

        $productData = [
            'title' => $request->get('title'),
            'body_html' => $request->get('body_html'),
            'vendor' => $request->get('vendor'),
            'product_type' => $request->get('product_type'),
            'packsize' => $request->get('packsize'),
            'generic_name'  => $request->get('generic_name'),
            'price' => $request->get('price'),
            'kind' => $request->get('product_kind'),
            'published' => $request->has('published') ? $request->get('published') : false,
        ];

        $product = $partner->products()->create($productData);

        if($request->hasFile('image'))
        {
           $path = Storage::putFile('attachments', $request->file('image'));
           $product->attachment()->updateOrCreate([
               'attachable_id'         => $product->id,
               'attachable_type'       => 'App\Entities\Product'],
               ['attachable_category'   => 'medicine',
               'path'                  => $path,
               'file_name'             => $request->image->getClientOriginalName()]);
        }

        flash('Successfully created')->success();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        $partner = $product->partner()->first();
        $image = get_attachment($product->attachment()->first());
//        return $image;
        return view('admin.products.show', compact('product', 'image', 'partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        // $partner = $product->partner()->first();
        $image = get_attachment($product->attachment()->first());
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body_html' => 'max:2500',
            'vendor' => 'required|max:255',
            'product_type' => 'required|max:255',
            'packsize' => 'required|max:255',
            'price' => 'required|max:255',
            'product_kind' => 'required',
            'published' => 'required|boolean',
            'generic_name' => 'required'

        ]);

        $productData = [
            'title' => $request->get('title'),
            'body_html' => $request->get('body_html'),
            'vendor' => $request->get('vendor'),
            'product_type' => $request->get('product_type'),
            'packsize' => $request->get('packsize'),
            'price' => $request->get('price'),
            'generic_name'  => $request->get('generic_name'),
            'kind' => $request->get('product_kind'),
            'published' => $request->has('published') ? $request->get('published') : false,
        ];

        $product = $this->product->find($id);

        $product->update($productData);

        if ($request->has('image')) {
            $product->attachment()->delete();

            $path = Storage::putFile('attachments', $request->file('image'));
            $product->attachment()->updateOrCreate([
                'attachable_id' => $product->id,
                'attachable_type' => 'App\Product'],
                ['attachable_category' => 'medicine',
                    'path' => $path,
                    'file_name' => $request->image->getClientOriginalName()]);
        }

        flash('Successfully updated')->success();
        return redirect()->route('admin.products.edit', ['id' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}