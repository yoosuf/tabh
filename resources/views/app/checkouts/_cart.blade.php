@if (auth()->check())
    <div class="card checkouts-order-details-card">
        <div class="card-content">

            <h1 class="title is-4 is-spaced">Your Order Details</h1>
            

            <?php $grand_total = 0 ?>
            <?php $grand_total_without_delivery = 0 ?>
            <?php $grand_discount = 0 ?>
            <?php $delivery_charges_for_partners = collect([]) ?>
            @foreach($grouped as $key => $partner)

                <h3 class="is-success"><strong>By {{$key}}</strong></h3>
                <?php $partner_total = 0 ?>
                <?php $discount_percentage = \App\Entities\Partner::where('name', $key)->first()['preferences']['discount_percentage'] ?>
                <?php $min_discount_amount = \App\Entities\Partner::where('name', $key)->first()['preferences']['min_discount_amount'] ?>
                <?php $delivery_charge = \App\Entities\Partner::where('name', $key)->first()['preferences']['delivery_charge'] ?>

                @foreach($partner as $item)

                    <?php $partner_total = $partner_total + ($item['item']->qty * number_format(((float)$item['item']->price), 2, '.', '')) ?>

                    <div class="media item-description">
                        <div class="media-content">
                            <div class="content">
                                <p>{{$item['item']->name}} |
                                    &#2547; {{number_format(((float)$item['item']->price), 2, '.', '')}}
                                    | {{ $item['item']->qty}} unit(s)</p>
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





                {{-- Partner total --}}
                <div class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong class="is-dark">Total Amount</strong>
                            </p>
                        </div>
                    </div>

                    <div class="media-right">
                        <strong class="is-dark">&#2547; {{number_format(((float)$partner_total), 2, '.', '')}}</strong>
                        <?php $grand_total_without_delivery = $grand_total_without_delivery; ?>

                    </div>

                </div>






                {{-- Partner Discount --}}
                <?php $discount_amount = 0 ?>

                @if (!session()->has('discount'))
                    @if($min_discount_amount <= $partner_total)
                        <?php $discount_amount = ($partner_total / 100) * $discount_percentage ?>
                        <?php $partner_total_discounted = $partner_total - $discount_amount ?>
                        <div class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong>Discount ({{$discount_percentage}} %)</strong>
                                    </p>
                                </div>
                            </div>

                            <div class="media-right">
                                <span class="">
                                    <strong class="is-success"
                                            style="color: #1dca59;">-&#2547; {{number_format(((float)$discount_amount), 2, '.', '')}}</strong>
                                </span>
                            </div>

                        </div>
                    @endif
                @endif




                {{-- Partner total after discount --}}

                <div class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong class="is-dark">Payable Amount</strong>
                            </p>
                        </div>
                    </div>

                    <div class="media-right">
                        <strong class="is-dark">&#2547; {{number_format(((float)$partner_total), 2, '.', '')}}</strong>
                    </div>

                </div>



                {{-- Delivery charges --}}
                <?php $delivery_charges_for_partners->put(\App\Entities\Partner::where('name', $key)->first()->id, $delivery_charge); ?>
                @if($delivery_charge != 0)
                    <?php $partner_total_with_delivery_charge = $partner_total + $delivery_charge ?>
                    <?php # $partner_total = $partner_total + $delivery_charge ?>
                    <div class="media">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong style="color: #ca8c27;">Delivery Charge</strong>
                                </p>
                            </div>
                        </div>

                        <div class="media-right">

                                        <span class="">
                                            <strong class="is-dark"
                                                    style="color: #ca8c27;">&#2547; {{number_format(((float)$delivery_charge), 2, '.', '')}}</strong>
                                        </span>

                        </div>

                    </div>
                @endif



                {{-- Total product + delivery (afrer discount)--}}

                <div class="media">
                    <div class="media-content">
                        <div class="content">

                        </div>
                    </div>

                    <div class="media-right">
                        <strong class="is-dark">&#2547; {{number_format(((float)$partner_total_with_delivery_charge), 2, '.', '')}}</strong>
                    </div>

                </div>




                {{-- Discount Calc--}}
                @if (!session()->has('discount'))
                    <?php $grand_discount = $grand_discount + $discount_amount ?>

                @endif
                {{-- end of discount calc --}}


                <?php $grand_total_without_delivery = $grand_total_without_delivery + $partner_total ?>


            @endforeach

            {{-- couon code --}}

            @if (session()->has('discount'))
                <?php if (session()->get('discount.type') == "fixed"): ?>
                <?php $grand_total = $grand_total_without_delivery - session()->get('discount.amount') ?>
                <?php elseif (session()->get('discount.type') == "percent"): ?>
                <?php $grand_discount = ($grand_total_without_delivery / 100) * session()->get('discount.amount') ?>
                <?php $grand_total = ($grand_total_without_delivery - $grand_discount) ?>
                <?php endif; ?>
            @endif

            {{-- coupon code --}}

            <div class="card order-total">
                <div class="card-content">
                    <table style="width: 100%;">


                        @if($grand_discount > 0 )
                            <tr>
                                <td style="text-align: left">
                                    <p class="subtitle is-6">Total Discount
                                        @if (session()->has('discount'))
                                            {!!   session()->get('discount.formatted')  !!}
                                        @endif
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
                                <h1 class="title is-4 is-spaced">
                                    &#2547; {{number_format(((float)$grand_total), 2, '.', '')}}</h1>
                            </td>
                        </tr>
                        <tr class="action-buttons">
                            <td style="text-align: left">

                                <br>

                            </td>
                            <td style="text-align: right">

                                <br>
                                <input type="hidden" name="total_amount" id="total_amount" value="{{ $grand_total }}">
                                <input type="hidden" name="total_discount" id="total_discount"
                                       value="{{$grand_discount}}">
                                <input type="hidden" name="tax" id="tax" value="0">

                                @foreach($delivery_charges_for_partners as $key => $value)
                                    <input type="hidden" name="delivery[]" value="{{$key}}-{{$value}}">
                                @endforeach

                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endif