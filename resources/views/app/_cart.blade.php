<div class="card" id="cart">
    <div class="card-content">


                  <div class="content">
                      <strong>My cart</strong>
                  </div>

        @if(Cart::count() > 0)
            @foreach(Cart::content() as $row)

                <div class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            @if(\App\Entities\Product::find($row->id)->attachment()->first() != null)
                                <img src="{{url('attachments/' . get_attachment(\App\Entities\Product::find($row->id)->attachment()->first()))}}">
                            @else
                                <img src="/img/DefaultImage.png">
                        @endif
                        </p>
                    </figure>
                    <div class="media-content">
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <p>
                                <strong>{{$row->name}}</strong>
                                <small>{{ App\Entities\Product::find($row->id)->first()->generic_name }}</small>
                                <br>
                                by {{ App\Entities\Product::find($row->id)->first()->partner()->first()->name }}
                                <br>

                            </p>




                        <nav class="level">

                          <div class="level-left">
                            <div class="level-item">
                              <medium>&#2547; {{number_format(((float)$row->price) * (float)$row->qty, 2, '.', '')}}</medium>
                            </div>
                          </div>
                          <div class="level-right">
                            <div class="level-item">
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
