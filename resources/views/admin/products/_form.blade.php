@if ($errors->any())
    <article class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) with this customer creation</p>
        </div>
    </article>
    <br>
@endif

{{ csrf_field() }}
<div class="columns">


    <div class="column is-8">
        <div class="card">
            <div class="card-content">
                <p class="title is-4">Product overview</p>


                <div class="field">
                    <label for="product_name">Title</label>

                    <div class="control is-expanded">
                        <input
                                id="product_name"
                                type="text"
                                name="product_name"
                                class="input {{ $errors->has('product_name') ? ' is-danger' : '' }}"
                                value="{{ isset($item->title)? $item->title : old('product_name') }}"/>
                    </div>
                    @if ($errors->has('product_name'))
                        <span class="help is-danger">
                            {{ $errors->first('product_name') }}
                        </span>
                    @endif
                </div>


                <div class="field">
                    <label for="product_body">Description</label>
                    <div class="control">
                        <textarea class="textarea"
                                  name="product_body"
                                  id="product_body"
                                  placeholder="Body">{{ isset($item->body_html) ? $item->body_html : old('product_body') }}</textarea>
                    </div>

                    @if ($errors->has('product_body'))
                        <span class="help is-danger">
                            {{ $errors->first('product_body') }}
                        </span>
                    @endif
                </div>


                <div class="field is-horizontal">
                    <div class="field-body">

                        <div class="field">
                            <label for="product_vendor">Vendor</label>
                            <div class="control">
                                <input
                                        class="input {{ $errors->has('product_name') ? ' is-danger' : '' }}"
                                        name="product_vendor" id="product_vendor" type="text" placeholder="Vendor"
                                        value="{{ isset($item->vendor) ? $item->vendor : old('product_vendor') }}"/>
                            </div>

                            @if ($errors->has('product_vendor'))
                                <span class="help is-danger">
		                            {{ $errors->first('product_vendor') }}
		                        </span>
                            @endif
                        </div>


                        <div class="field">
                            <label for="product_generic_name">Generic name</label>
                            <div class="control">
                                <input
                                        class="input {{ $errors->has('product_name') ? ' is-danger' : '' }}"
                                        name="product_generic_name" id="product_generic_name" type="text"
                                        placeholder="Generic name"
                                        value="{{ isset($item->generic_name) ? $item->generic_name : old('product_generic_name') }}"/>
                            </div>

                            @if ($errors->has('product_generic_name'))
                                <span class="help is-danger">
		                            {{ $errors->first('product_generic_name') }}
		                        </span>
                            @endif
                        </div>

                    </div>

                </div>


            </div>


            <div class="card">
                <div class="card-content">

                    <p class="title is-4">Product Images</p>

                    @if(isset($image) && $image != '')
                        <div class="field">
                            <label class="label">Image</label>
                            <div class="box">
                                <figure class="image is-128x128">
                                    <img src={{ url('/attachments/'. $image) }}>
                                </figure>
                            </div>
                        </div>
                    @endif


                    <div class="field">
                        <label class="label">Image</label>
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" name="image" id="image" type="file" multiple
                                           accept='image/*'>
                                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fa fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                        </span>
                                    <span id="imagename" class="file-name">
                        </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        var file = document.getElementById("image");
                        file.onchange = function () {
                            if (file.files.length > 0) {
                                document.getElementById('imagename').innerHTML = file.files[0].name;
                            }
                        };
                    </script>

                </div>


            </div>
        </div>


    </div>

    <div class="column">


        <div class="card">
            <div class="card-content">
                <div class="content">


                    <div class="field">
                        <label for="product_kind">Product Type</label>
                        <div class="control is-expanded">

                            <div class="select is-fullwidth {{ $errors->has('product_kind') ? ' is-danger' : '' }}">

                                <select name="product_kind" id="product_kind">


                                    <option value="">Select one</option>
                                    <option value="pharmaceutical" {{ isset($item->kind) &&  $item->kind == 'pharmaceutical' ? 'selected':  null }}>
                                        Pharmaceutical
                                    </option>
                                    <option value="grocery" {{ isset($item->kind) &&  $item->kind == 'grocery' ? 'selected':  null }}>
                                        Grocery
                                    </option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('product_kind'))
                            <span class="help is-danger">
		                            {{ $errors->first('product_kind') }}
		                        </span>
                        @endif
                    </div>


                    <div class="field">
                        <label for="product_partner">Partner</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth {{ $errors->has('product_partner') ? ' is-danger' : '' }}">




                                {!!   render_partners(isset($item) ? $item->partner_id : old('product_partner') , 'product_partner') !!}
                                {{--<select name="product_partner" id="product_partner">--}}

                                    {{--<option value="">Select Partner</option>--}}
                                    {{--@foreach ($partners as $partner)--}}
                                        {{--<option value="{{$partner->id}}">{{$partner->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            </div>
                        </div>

                        @if ($errors->has('product_partner'))
                            <span class="help is-danger">
		                            {{ $errors->first('product_partner') }}
		                        </span>
                        @endif
                    </div>
                    <div class="field">
                        <label for="product_type">Product Type</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth {{ $errors->has('product_type') ? ' is-danger' : '' }}">

                                <select name="product_type" id="product_type">
                                    @if(isset($item))
                                        <option selected>{{$item->product_type}}</option>
                                    @else
                                        <option selected disabled>Select dropdown</option>
                                    @endif
                                    <option>CAPSULES</option>
                                    <option>CHEWING GUM</option>
                                    <option>EAR DROPS</option>
                                    <option>EYE DROPS</option>
                                    <option>EYE OINT</option>
                                    <option>GEL(TOPICAL)</option>
                                    <option>GRANULES</option>
                                    <option>INHALER</option>
                                    <option>INJECTION</option>
                                    <option>LOTION</option>
                                    <option>LOZENGES</option>
                                    <option>NASAL SPRAY</option>
                                    <option>OINTMENT</option>
                                    <option>POWDER</option>
                                    <option>SOLUTION</option>
                                    <option>SYRUP</option>
                                    <option>TABLET</option>
                                    <option>VAPOCAPS</option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('product_type'))
                            <span class="help is-danger">
		                            {{ $errors->first('product_type') }}
		                        </span>
                        @endif
                    </div>



                    <div class="field">
                        <label for="product_size">Pack Size</label>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input {{ $errors->has('product_size') ? ' is-danger' : '' }}" type="text"
                                       id="product_size"
                                       name="product_size"
                                       value="{{ isset($item->packsize)?  $item->packsize : old('product_size') }}"/>
                            </div>
                            <div class="control">
                                <a class="button is-static">
                                    Size
                                </a>
                            </div>
                        </div>
                        @if ($errors->has('product_size'))
                            <span class="help is-danger">{{ $errors->first('product_size') }}</span>
                        @endif
                    </div>


{{-- 
                    <div class="field">
                        <label for="product_size">Pack Size</label>
                        <div class="control">
                            <input
                                    class="input {{ $errors->has('product_size') ? ' is-danger' : '' }}"
                                    name="product_size" id="product_size" type="text" placeholder="Pack Size"
                                    value="{{ isset($item) ? $item->packsize : old('product_size') }}">
                        </div>
                        @if ($errors->has('product_size'))
                            <span class="help is-danger">
		                            {{ $errors->first('product_size') }}
		                        </span>
                        @endif
                    </div>
--}}




                    <div class="field">
                        <label for="product_price">Price</label>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input {{ $errors->has('product_price') ? ' is-danger' : '' }}" type="text"
                                       id="product_price"
                                       name="product_price"
                                       value="{{ isset($item->price)?  $item->price : old('product_price') }}"/>
                            </div>
                            <div class="control">
                                <a class="button is-static">
                                    ৳
                                </a>
                            </div>
                        </div>
                        @if ($errors->has('product_price'))
                            <span class="help is-danger">{{ $errors->first('product_price') }}</span>
                        @endif
                    </div>

{{-- 
                    <div class="field">
                        <label for="product_price">Price</label>
                        <div class="control">
                            <input
                                    class="input {{ $errors->has('product_price') ? ' is-danger' : '' }}"
                                    name="product_price" id="product_price" type="number" step="0.01"
                                    placeholder="Price"
                                    value="{{ isset($item) ? $item->price : old('product_price') }}">
                        </div>
                        @if ($errors->has('product_price'))
                            <span class="help is-danger">
		                            {{ $errors->first('product_price') }}
		                        </span>
                        @endif
                    </div>
--}}

                    <div class="field">
                        <label for="product_published">Status</label>
                        <div class="control is-expanded">

                            <div class="select is-fullwidth {{ $errors->has('product_published') ? ' is-danger' : '' }}">

                                <select name="product_published" id="product_published">
                                    <option value="">Publish status</option>
                                    <option value="1" {{ isset($item->published) &&  $item->published == 1 ? 'selected':  null }}>
                                        Active
                                    </option>
                                    <option value="0" {{ isset($item->published) &&  $item->published == 0 ? 'selected':  null }}>
                                        De-active
                                    </option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('product_published'))
                            <span class="help is-danger">
                                {{ $errors->first('product_published') }}
                            </span>
                        @endif
                    </div>


                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="content">
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Submit</button>
                        </div>
                        <div class="control">

                            <a class="button is-text" href="{{ route('admin.products') }}">
                                Discard
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>