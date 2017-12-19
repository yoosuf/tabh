<form role="form" class="media item-form" id="item-{{$product->id}}" method="POST" action="{{ route('cart.add') }}">
    {{ csrf_field() }}

    <figure class="media-left">
        <p class="image is-64x64">
            @if($product->attachment()->first() != null)
            <img src="{{url('attachments/' . get_attachment($product->attachment()->first()))}}">
            @else
            <img src="/img/DefaultImage.png">
            @endif
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
            <input type="hidden" class="item-id" name="id" id="id" value="{{$product->id}}">
        </div>
    </div>
    <div class="media-right">
        <button type="submit" class="button is-info is-outlined item-button">Add to Cart</button>
    </div>

</form>
