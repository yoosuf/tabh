@if ($errors->any())
    <article class="message is-danger">
        <div class="message-header">
            <p>Error</p>
            {{--<button class="delete" aria-label="delete"></button>--}}
        </div>
        <div class="message-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                @endforeach
            </ul>
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
            <label class="label">Title</label>
            <div class="control">
                <input class="input" name="title" id="title" type="text" placeholder="Title" value="{{ isset($product) ? $product->title : old('title') }}">
            </div>
        </div>


        <div class="field">
            <label class="label">HTML Body</label>
            <div class="control">
                <textarea class="textarea" name="body_html" id="body_html" placeholder="HTML Body">{{ isset($product) ? $product->body_html : old('body_html') }}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Vendor</label>
            <div class="control">
                <input class="input" name="vendor" id="vendor" type="text" placeholder="Vendor" value="{{ isset($product) ? $product->vendor : old('vendor') }}">
            </div>
        </div>






    </div>


            <div class="card">
                <div class="card-content">

                    <p class="title is-4">Product Images</p>





            <div class="field">
                <label class="label">Image</label>
                <div class="control">
                    <div class="file has-name is-fullwidth">
                        <label class="file-label">
                            <input class="file-input" name="image" id="image" type="file">
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
                file.onchange = function(){
                    if(file.files.length > 0)
                    {
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
                        <label class="label">Partner</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select name="partner" id="partner">
                                    @if(isset($partner))
                                        <option selected disabled>{{$partner->name}}</option>
                                    @else
                                        <option selected disabled>Select Partner</option>
                                        @if(isset($partners))
                                            @foreach ($partners as $partner)
                                                <option>{{$partner->name}}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Product Type</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select name="product_type" id="product_type">
                                    @if(isset($product))
                                        <option selected>{{$product->product_type}}</option>
                                    @else
                                        <option selected disabled>Select dropdown</option>
                                    @endif
                                    <option>CAPSULES	mg</option>
                                    <option>CHEWING GUM	mg</option>
                                    <option>EAR DROPS	ml</option>
                                    <option>EYE DROPS	ml</option>
                                    <option>EYE OINT	g</option>
                                    <option>GEL(TOPICAL)	g</option>
                                    <option>GRANULES	mg</option>
                                    <option>INHALER	md</option>
                                    <option>INJECTION	ml</option>
                                    <option>LOTION	ml</option>
                                    <option>LOZENGES	mg</option>
                                    <option>NASAL SPRAY	ml</option>
                                    <option>OINTMENT	g</option>
                                    <option>POWDER	g</option>
                                    <option>SOLUTION	ml</option>
                                    <option>SYRUP	ml</option>
                                    <option>TABLET	mg</option>
                                    <option>VAPOCAPS	mp</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="field">
                        <label class="label">Pack Size</label>
                        <div class="control">
                            <input class="input" name="packsize" id="packsize" type="text" placeholder="Pack Size" value="{{ isset($product) ? $product->packsize : old('packsize') }}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Price</label>
                        <div class="control">
                            <input class="input" name="price" id="price" type="number" step="0.01" placeholder="Price" value="{{ isset($product) ? $product->price : old('price') }}">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="published" id="published" {{ isset($product) && $product->published == true ? 'checked' : old('published') }}>
                                published
                            </label>
                        </div>
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
                            <button onclick="window.history.go(-1); return false;" class="button is-text">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>