
<div class="card">
    <div class="card-content">

        <h1 class="title is-4 is-spaced">Your order details</h1>
        <p class="subtitle is-5"></p>

        <h2 class="is-success">Order Summary</h2>
        <br>
        <br>
        @foreach($grouped as $key => $partner)

            <h3 class="is-success">by {{$key}}</h3>
            <?php $partner_total=0 ?>
            <?php $discount_percentage = \App\Entities\Partner::where('name', $key)->first()['preferences']['discount_percentage'] ?>
            <?php $max_discount_amount = \App\Entities\Partner::where('name', $key)->first()['preferences']['max_discount_amount'] ?>


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

        @endforeach

    </div>

</div>
