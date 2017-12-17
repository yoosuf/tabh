@if (auth()->check())
<div class="card">
    <div class="card-content">

        <h1 class="title is-4 is-spaced">Your order details</h1>
        <p class="subtitle is-5"></p>

        <h2 class="is-success">Order Summary</h2>
        <br>
        <br>
        <?php $grand_total=0 ?>
        <?php $grand_discount=0 ?>
        @foreach($grouped as $key => $partner)

            <h3 class="is-success">by {{$key}}</h3>
            <?php $partner_total=0 ?>
            <?php $discount_percentage = \App\Entities\Partner::where('name', $key)->first()['preferences']['discount_percentage'] ?>
            <?php $min_discount_amount = \App\Entities\Partner::where('name', $key)->first()['preferences']['min_discount_amount'] ?>


            @foreach($partner as $item)

                <?php $partner_total=$partner_total + ($item['item']->qty * number_format(((float)$item['item']->price), 2, '.', '')) ?>

            <div class="media" style="padding-left: 100px;">
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{$item['item']->name}} (&#2547; {{number_format(((float)$item['item']->price), 2, '.', '')}}) ({{$item['item']->qty}} units)</strong>
                        </p>
                    </div>
                </div>
                <table>
                    <tr>
                        <div class="media-right">
                            <td>
                                <span class="">
                                    <strong class="is-success">&#2547; {{$item['item']->qty * number_format(((float)$item['item']->price), 2, '.', '')}}</strong>
                                </span>
                            </td>
                        </div>
                    </tr>
                </table>
            </div>
            @endforeach
            <?php $discount_amount=0 ?>
            @if($min_discount_amount <= $partner_total)
                <?php $discount_amount= ($partner_total/100) * $discount_percentage ?>
                <?php $partner_total= $partner_total - $discount_amount ?>
                <div class="media" style="padding-left: 100px;">
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>Discount ({{$discount_percentage}} %)</strong>
                        </p>
                    </div>
                </div>
                <table>
                    <tr>
                        <div class="media-right">
                            <td>
                                <span class="">
                                    <strong class="is-success">-&#2547; {{number_format(((float)$discount_amount), 2, '.', '')}}</strong>
                                </span>
                            </td>
                        </div>
                    </tr>
                </table>
            </div>
            @endif
            <div class="media" style="padding-left: 100px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: right">
                                        <span class="">
                                            <strong class="is-success">&#2547; {{$partner_total}}</strong>
                                        </span>
                        </td>
                    </tr>
                </table>
            </div>
            <?php $grand_total=$grand_total + $partner_total ?>
            <?php $grand_discount=$grand_discount + $discount_amount ?>

        @endforeach

        <div class="card">
            <div class="card-content">
                <table style="width: 100%;">
                    @if($grand_discount > 0)
                        <tr>
                            <td style="text-align: left">
                                <p class="subtitle is-6">Total Discount</p>
                            </td>
                            <td style="text-align: right">
                                <p class="subtitle is-6">-&#2547; {{$grand_discount}}</p>
                            </td>
                        </tr>
                    @endif
                        <tr>
                            <td style="text-align: left">
                                <h1 class="title is-4 is-spaced">Order Total</h1>
                            </td>
                            <td style="text-align: right">
                                <h1 class="title is-4 is-spaced">&#2547; {{$grand_total}}</h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left">
                                {{--<form role="form" method="POST" action="{{ route('order.discard') }}">--}}
                                    {{ csrf_field() }}
                                    <br>
                                    {{--<input type="hidden" name="id" id="id" value="">--}}
                                    {{--<a href="{{ route('order.discard') }}" class="button is-danger">- Discard Order -</a>--}}
                                {{--</form>--}}
                            </td>
                            <td style="text-align: right">
                                {{--<form role="form" method="POST" action="{{ route('order.add') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    <br>
                                    <input type="hidden" name="total_amount" id="total_amount" value="{{$grand_total}}">
                                    <input type="hidden" name="total_discount" id="total_discount" value="{{$grand_discount}}">
                                    <input type="hidden" name="tax" id="tax" value="0">

                                    <button type="submit" class="button is-success">- Place Order -</button>
                                {{--</form>--}}
                            </td>
                        </tr>
                </table>
            </div>
        </div>

    </div>

</div>
@endif