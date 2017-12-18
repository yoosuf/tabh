<div class="card">
    <div class="card-content">

        @if(Cart::count() > 0)
            @foreach(Cart::content() as $row)

                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            @if(\App\Entities\Product::find($row->id)->attachment()->first() != null)
                                <img src="{{url('attachments/' . get_attachment(\App\Entities\Product::find($row->id)->attachment()->first()))}}">
                            @else
                                <img src="/img/DefaultImage.png">
                            @endif                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <p>
                                <strong>{{$row->name}}</strong>
                                <br>
                                <small>
                                    by {{ App\Entities\Product::find($row->id)->first()->partner()->first()->name }}</small>
                                <br>
                                <medium>
                                    &#2547; {{number_format(((float)$row->price) * (float)$row->qty, 2, '.', '')}}</medium>
                            </p>
                        </div>
                    </div>


                    <div class="media-right">

                        <div class="buttons has-addons is-right">
                            <form role="form" method="POST" action="{{ route('cart.remove') }}">
                                {{ csrf_field() }}
                                <button class="button is-info is-outlined">
                                    -
                                </button>
                                <input type="hidden" name="id" id="id" value="{{$row->rowId}}">
                            </form>
                            <span class="button is-info ">{{$row->qty}}</span>
                            <form role="form" method="POST" action="{{ route('cart.add') }}">
                                {{ csrf_field() }}
                                <button class="button is-info is-outlined">
                                    +
                                </button>
                                <input type="hidden" name="id" id="id" value="{{$row->id}}">
                            </form>
                        </div>

                        </form>

                    </div>

                </div>

            @endforeach

        @else

            <p>Cart is empty</p>

        @endif
    </div>

</div>