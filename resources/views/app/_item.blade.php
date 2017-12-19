<form role="form" class="media" id="item-{{$product->id}}" method="POST" action="{{ route('cart.add') }}">
    {{ csrf_field() }}

    <input type="hidden" name="id" id="id" value="{{$product->id}}">

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

            </p>
        


        <nav class="level">
          <div class="level-left">
            <div class="level-item">
              <medium>&#2547; {{number_format(((float)$product->price), 2, '.', '')}}</medium>
            </div>
          </div>
          <div class="level-right">
            <div class="level-item">
              <button type="submit" class="button is-info is-outlined">Add to Cart</button>

            </div>
          </div>
        </nav>

    </div>





</form>
