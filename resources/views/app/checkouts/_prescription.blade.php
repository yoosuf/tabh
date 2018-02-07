@if (auth()->check())


        {{--<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('order.prescription.upload') }}">--}}
<div class="card checkouts-prescription-card">
    <div class="card-content">





        <div class="field" id="media">
            <h1 class="title is-4 is-spaced">Add Prescription</h1>
            <div class="control">
                <div class="file has-name is-fullwidth">
                    {{--<label class="file-label">--}}
                        {{--<input class="file-input" name="prescription" id="prescription" type="file" multiple accept='image/*'>--}}
                        {{--<span class="file-cta">--}}
                            {{--<span class="file-icon">--}}
                                {{--<i class="fa fa-upload"></i>--}}
                            {{--</span>--}}
                            {{--<span class="file-label">--}}
                                {{--Choose a file…--}}
                            {{--</span>--}}
                        {{--</span>--}}
                        {{--<span id="imagename" class="file-name">--}}
                        {{--</span>--}}
                    {{--</label>--}}



                    <form action="/order/upload" id="upload-widget" class="dropzone" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="prescription" id="prescription" accept='image/*'  />
                    </form>


                </div>
                <p class="help">The prescription must be upload to make an order.</p>

            </div>
        </div>

    </div>
</div>

    {{--</form>--}}
{{--<script type="text/javascript">--}}
    {{--var file = document.getElementById("prescription");--}}
    {{--file.onchange = function(){--}}
        {{--if(file.files.length > 0)--}}
        {{--{--}}
            {{--document.getElementById('imagename').innerHTML = file.files[0].name;--}}
        {{--}--}}
    {{--};--}}
{{--</script>--}}

@endif