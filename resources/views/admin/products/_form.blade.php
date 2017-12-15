@if ($errors->any())
    <article class="message is-danger">
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
            <label for="title">Title</label>
            <div class="control">
                <input class="input" name="title" id="title" type="text" placeholder="Title" value="{{ isset($product) ? $product->title : old('title') }}">
            </div>
        </div>


        <div class="field">
            <label for="body_html">HTML Body</label>
            <div class="control">
                <textarea class="textarea" name="body_html" id="body_html" placeholder="Body">{{ isset($product) ? $product->body_html : old('body_html') }}</textarea>
            </div>
        </div>








                <div class="field is-horizontal">
                    <div class="field-body">

        <div class="field">
            <label for="vendor">Vendor</label>
            <div class="control">
                <input class="input" name="vendor" id="vendor" type="text" placeholder="Vendor" value="{{ isset($product) ? $product->vendor : old('vendor') }}">
            </div>
        </div>



                        <div class="field">
                            <label for="generic_name">Generic name</label>
                            <div class="control">
                                <input class="input" name="generic_name" id="generic_name" type="text" placeholder="Generic name" value="{{ isset($product) ? $product->generic_name : old('generic_name') }}">
                            </div>
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
                            <input class="file-input" name="image" id="image" type="file" multiple accept='image/*'>
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

                        <label for="published">Status</label>
                        <div class="control is-expanded">

                            <div class="select is-fullwidth {{ $errors->has('published') ? ' is-danger' : '' }}" >

                                <select name="published" id="published">
                                    <option value="">Publish status</option>
                                    <option value="1" {{ isset($product->published) &&  $product->published == 1 ? 'selected':  null }}>Active</option>
                                    <option value="0" {{ isset($product->published) &&  $product->published == 0 ? 'selected':  null }}>De-active</option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('partner_status'))
                            <span class="help is-danger">
                    {{ $errors->first('partner_status') }}
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
                            <button onclick="window.history.go(-1); return false;" class="button is-text">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>