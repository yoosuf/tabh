<div class="card" id="cart">
    <div class="card-content">


        <div class="content">
            <strong>My cart</strong>
        </div>

        @if(count($cart) > 0)
            @foreach($cart as $row)




                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            @if($row->model->attachment()->first() != null)
                                <img src="{{asset('attachments/' . get_attachment($row->model->attachment()->first() )) }}">
                            @else
                                <img src="{{ asset('/img/DefaultImage.png') }}">
                            @endif
                        </p>
                    </figure>
                    <div class="media-content">
                        {{--<input type="hidden" name="id" value="{{$row->id}}">--}}
                        <p>
                            <strong>{{$row->name}}</strong>
                            <small>{{ $row->model->generic_name }}</small>
                            <br>
                            by {{ $row->model->partner->name }}
                            <br>

                        </p>


                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <medium>&#2547; {{number_format(((float)$row->price), 2, '.', '')}}</medium>
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="level-item  field has-addons is-right">

                                    <form role="form" class="control cart-minus-item-form"
                                          id="cart-minus-item-{{$row->id}}" method="POST"
                                          action="{{ route('cart.remove') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" class="item-id" name="id" value="{{$row->rowId}}">
                                        <button class="button is-info is-outlined item-button">
                                            -
                                        </button>
                                    </form>
                                    <span class="control">
                                        <span class="button is-info ">{{$row->qty}}</span>
                                        </span>
                                    <form role="form" class="control cart-plus-item-form"
                                          id="cart-plus-item-{{$row->id}}" method="POST"
                                          action="{{ route('cart.add') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" class="item-id" name="id" value="{{$row->id}}">
                                        <button class="button is-info is-outlined item-button">
                                            +
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </nav>


                    </div>
                </div>

            @endforeach

        @else

            <p>Cart is empty</p>

        @endif
    </div>

</div>
