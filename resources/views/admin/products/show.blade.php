@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-content">
            <div class="field is-grouped">
                <p class="title">Product</p>&nbsp;
                <button onclick="window.location.href = '/admin/products/'+ {{$product->id}} +'/edit'; return true;" class="button is-primary">Edit</button>&nbsp;
                <button onclick="window.history.go(-1); return false;" class="button is-text">Back</button>
            </div>


            <div class="field">
                <label class="label">Title</label>
                <div class="box">
                    <label class="label">{{ isset($product) ? $product->title : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">HTML Body</label>
                <div class="box">
                    <label class="label">{{ isset($product) ? $product->body_html : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Vendor</label>
                <div class="box">
                    <label class="label">{{ isset($product) ? $product->vendor : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Product Type</label>
                <div class="box">
                    <label class="label">{{ isset($product) ? $product->product_type : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Pack Size</label>
                <div class="box">
                    <label class="label">{{ isset($product) ? $product->packsize : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Price</label>
                <div class="box">
                    <label class="label">{{ isset($product) ? $product->price : '' }}</label>
                </div>
            </div>

            <div class="field">
                <label class="label">Published</label>
                <div class="box">
                    @if(isset($product) && $product->published == true)
                        <label class="label">Published</label>
                    @else
                        <label class="label">Not Published</label>
                    @endif
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button onclick="window.location.href = '/admin/products/'+ {{$product->id}} +'/edit'; return true;" class="button is-primary">Edit</button>&nbsp;
                    <button onclick="window.history.go(-1); return false;" class="button is-text">Back</button>
                </div>
            </div>

        </div>
    </div>

@endsection