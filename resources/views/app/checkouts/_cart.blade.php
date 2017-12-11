@foreach(Cart::content() as $row)

    <input type="hidden" name="id" id="id" value="{{$row->id}}">
    <div class="media">
        <figure class="media-left">
            <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong>{{$row->name}}</strong>
                    <br>
                    <small>by {{App\Entities\Product::find($row->id)->first()->partner()->first()->name}}</small>
                    <br>
                    <medium>&#2547; {{number_format(((float)$row->price), 2, '.', '')}}</medium>
                </p>
            </div>
        </div>
        <table>
            <tr>
                <div class="media-right">
                    <td>
                        <form role="form" method="POST" action="{{ route('cart.remove') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{$row->rowId}}">
                            <button type="submit" class="button is-success">-</button>
                        </form>
                    </td>
                    <td>
                            <span class="tag is-info">
                            <strong class="is-success">{{$row->qty}}</strong>
                            </span>
                    </td>
                    <td>
                        <form role="form" method="POST" action="{{ route('cart.add') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{$row->id}}">
                            <button type="submit" class="button is-success">+</button>
                        </form>
                    </td>
                </div>
            </tr>
        </table>
    </div>

@endforeach