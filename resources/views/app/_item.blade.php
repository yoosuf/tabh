<form role="form" class="media" method="POST" action="{{ route('cart.add') }}">
    {{ csrf_field() }}

        <figure class="media-left">
            <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong>{{$product->title}}</strong>
                    <small>{{$product->generic_name}}</small>
                    <br>
                    {{$product->product_type}}
                    @if($product->product_type != "")
                        |
                    @endif
                    {{$product->packsize}}
                    <br>
                    <small>by {{$product->partner()->first()->name}}</small>
                    <br>
                    <medium>&#2547; {{number_format(((float)$product->price), 2, '.', '')}}</medium>
                </p>
                <input type="hidden" name="id" id="id" value="{{$product->id}}">
            </div>
        </div>
        <div class="media-right">
            <button type="submit" class="button is-info is-outlined">Add to Cart</button>
        </div>

</form>
