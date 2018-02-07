@if (auth()->check())
    <div class="card checkouts-order-details-card">
        <div class="card-content">

            <h1 class="title is-4 is-spaced">Your Order Details</h1>
            <p class="subtitle is-5"></p>

            <!-- <h2 class="is-success">Order Summary</h2> -->
            <!-- <br> -->
            <!-- <br> -->
            <?php $grand_total = 0 ?>
            <?php $grand_discount = 0 ?>
            <?php $delivery_charges_for_partners = collect([]) ?>
            @foreach($grouped as $key => $partner)

                <h3 class="is-success"><strong>By {{$key}}</strong></h3>
                <?php $partner_total = 0 ?>
                <?php $discount_percentage  = \App\Entities\Partner::where('name', $key)->first()['preferences']['discount_percentage'] ?>
                <?php $min_discount_amount  = \App\Entities\Partner::where('name', $key)->first()['preferences']['min_discount_amount'] ?>

                <?php $delivery_charge      = \App\Entities\Partner::where('name', $key)->first()['preferences']['delivery_charge'] ?>

                @foreach($partner as $item)

                    <?php $partner_total = $partner_total + ($item['item']->qty * number_format(((float)$item['item']->price), 2, '.', '')) ?>

                    <div class="media item-description" style="">
                        <div class="media-content">
                            <div class="content">
                                <p>{{$item['item']->name}} |
                                    &#2547; {{number_format(((float)$item['item']->price), 2, '.', '')}}
                                    | {{$item['item']->qty}} unit(s)</p>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <div class="media-right">
                                    <td>
                            <span class="">
                                <strong class="is-success">&#2547; {{number_format(((float)$item['item']->qty * (float)$item['item']->price), 2, '.', '')}}</strong>
                            </span>
                                    </td>
                                </div>
                            </tr>
                        </table>
                    </div>
                @endforeach
                <?php $discount_amount = 0 ?>


                <?php if (!isset($data)): ?>
                @if($min_discount_amount <= $partner_total)
                    <?php $discount_amount = ($partner_total / 100) * $discount_percentage ?>
                    <?php $partner_total = $partner_total - $discount_amount ?>
                    <div class="media item-discount" style="">
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
                                <strong class="is-success"
                                        style="color: #1dca59;">-&#2547; {{number_format(((float)$discount_amount), 2, '.', '')}}</strong>
                            </span>
                                    </td>
                                </div>
                            </tr>
                        </table>
                    </div>
                @endif
                <?php endif; ?>

                <?php $delivery_charges_for_partners->put(\App\Entities\Partner::where('name', $key)->first()->id, $delivery_charge); ?>
                @if($delivery_charge != 0)
                    <?php $partner_total = $partner_total + $delivery_charge ?>
                    <div class="media item-discount" style="">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong style="color: #ca8c27;">Delivery Charge</strong>
                                </p>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <div class="media-right">
                                    <td>
                                        <span class="">
                                            <strong class="is-dark"
                                                    style="color: #ca8c27;">&#2547; {{number_format(((float)$delivery_charge), 2, '.', '')}}</strong>
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
                            <strong class="is-success">&#2547; {{number_format(((float)$partner_total), 2, '.', '')}}</strong>
                        </span>
                            </td>
                        </tr>
                    </table>
                </div>

                <?php if (!isset($data)): ?>
                    <?php $grand_total = $grand_total + $partner_total ?>
                    <?php $grand_discount = $grand_discount + $discount_amount ?>
                <?php else: ?>

                    <?php if ($data['reward_type'] == "fixed"):  ?> 
                        <?php $grand_total = ($grand_total + $partner_total) - ($data['reward']) ?>
                        <?php $grand_discount = $grand_discount + $data['reward'] ?>
                    <?php elseif($data['reward_type'] == "percent"): ?>


                        <?php $grand_discount = ($partner_total / 100) * ($data['reward']) ?>

                        <?php $grand_total = ($partner_total -  $grand_discount) ?>

                    <?php endif; ?>

                <?php endif; ?>

            @endforeach


{{-- isset($data) ?  dd($data) : null --}}






            <div class="card order-total">
                <div class="card-content">
                    <table style="width: 100%;">

                        
                            @if($grand_discount > 0 )
                                <tr>
                                    <td style="text-align: left">
                                        <p class="subtitle is-6">Total Discount
                                        
                                        <?php if (isset($data)):  ?>
                                            <?php if ($data['reward_type'] == "percent"):  ?> 

                                                ({{ $data['reward'] }} %)
                                                    

                                            <?php endif;  ?>

                                        <?php else: ?>

                                        <?php endif;  ?>
                                        </p>
                                    </td>
                                    <td style="text-align: right">
                                        <p class="subtitle is-6">
                          

                                            -&#2547; {{number_format(((float)$grand_discount), 2, '.', '')}}</p>

                                        
                                        
                                    </td>
                                </tr>
                            @endif
                  

                        <tr>
                            <td style="text-align: left">
                                <h1 class="title is-4 is-spaced">Total Payable Amount</h1>
                            </td>
                            <td style="text-align: right">
                                <h1 class="title is-4 is-spaced">&#2547; {{number_format(((float)$grand_total), 2, '.', '')}}</h1>
                            </td>
                        </tr>
                        <tr class="action-buttons">
                            <td style="text-align: left">
                                {{--<form role="form" method="POST" action="{{ route('order.discard') }}">--}}
                                {{--  {{ csrf_field() }} --}}
                                <br>
                                {{--<input type="hidden" name="id" id="id" value="">--}}
                                {{--<a href="{{ route('order.discard') }}" class="button is-danger">- Discard Order -</a>--}}
                                {{--</form>--}}
                            </td>
                            <td style="text-align: right">
                                {{--<form role="form" method="POST" action="{{ route('order.add') }}">--}}
                                {{--{{ csrf_field() }}--}}
                                <br>
                                <input type="hidden" name="total_amount" id="total_amount" value="{{ $grand_total }}">
                                <input type="hidden" name="total_discount" id="total_discount"
                                       value="{{$grand_discount}}">
                                <input type="hidden" name="tax" id="tax" value="0">
{{--{{dd($delivery_charges_for_partners->toArray())}}--}}


                                @foreach($delivery_charges_for_partners as $key => $value)
                                          <input type="hidden" name="delivery[]" value="{{$key}}-{{$value}}">
                                @endforeach
                                {{--<input type="hidden" name="delivery" id="delivery" value="{{$delivery_charges_for_partners}}">--}}
                                {{--</form>--}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endif