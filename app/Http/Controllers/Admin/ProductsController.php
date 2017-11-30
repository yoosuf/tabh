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
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->product->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /***
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return View
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body_html' => 'required|max:2500',
            'vendor' => 'required|max:255',
            'product_type' => 'required|max:255',
            'packsize' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        $productData = [
            'title' => $request->get('title'),
            'body_html' => $request->get('body_html'),
            'vendor' => $request->get('vendor'),
            'product_type' => $request->get('product_type'),
            'packsize' => $request->get('packsize'),
            'price' => $request->get('price'),
            'published' => $request->has('published') ? $request->get('published') : false,
        ];

        $product = $this->product->create($productData);

        if($request->hasFile('image'))
        {
           $path = Storage::putFile('attachments', $request->file('image'));
           $product->attachment()->updateOrCreate([
               'attachable_id'         => $product->id,
               'attachable_type'       => 'App\Product'],
               ['attachable_category'   => 'medicine',
               'path'                  => $path,
               'file_name'             => $request->image->getClientOriginalName()]);
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        $image = $this->GetAttachmentURL($product->attachment()->first());
        return $image;  
        return view('admin.products.show', compact('product','image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return View
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'body_html' => 'required|max:2500',
            'vendor' => 'required|max:255',
            'product_type' => 'required|max:255',
            'packsize' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        $productData = [
            'title' => $request->get('title'),
            'body_html' => $request->get('body_html'),
            'vendor' => $request->get('vendor'),
            'product_type' => $request->get('product_type'),
            'packsize' => $request->get('packsize'),
            'price' => $request->get('price'),
            'published' => $request->has('published') ? $request->get('published') : false,
        ];

        $product = $this->product->find($id);

        $product->update($productData);

        if($request->has('image'))
        {
           $path = Storage::putFile('attachments', $request->file('image'));
           $product->attachment()->updateOrCreate([
               'attachable_id'         => $product->id,
               'attachable_type'       => 'App\Product'],
               ['attachable_category'   => 'medicine',
               'path'                  => $path,
               'file_name'             => $request->image->getClientOriginalName()]);
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetAttachmentURL($attachment)
    {
        try {
            if (isset($attachment)) {
                return Storage::url($attachment->path);
            } else {
                //return  url('/images/placeholder/profile.png');
            }
        } catch (\Exception $exception) {
            //Log::notice($exception);
            //return  url('/images/placeholder/profile.png');
            return $exception;
        }
    }

}