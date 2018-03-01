@if (auth()->check())
    <div class="card checkouts-order-details-card ">
        <div class="card-content">

            <h1 class="title is-4 is-spaced">Your Order Details</h1>


            <?php $grand_total = 0 ?>
            <?php $grand_total_without_delivery = 0 ?>
            <?php $total_delivery_charge = 0 ?>
            <?php $grand_discount = 0 ?>
            <?php $delivery_charges_for_partners = collect([]) ?>

            <table class="table is-bordered is-striped is-narrow is-fullwidth is-hoverable">

                <thead>
                <tr>
                    <th class="has-text-centered">Qty</th>
                    <th class="has-text-centered">Description</th>
                    <th class="has-text-centered">Price</th>
                    <th class="has-text-centered">Amount</th>
                </tr>

                </thead>
                <tbody>

            @foreach($grouped as $key => $partner)



                <tr>
                    <th colspan="4" class="is-selected">
                        <strong>Items from {{$key}}</strong>
                    </th>
                </tr>


                <?php $partner_total = 0 ?>
                <?php $discount_percentage = \App\Entities\Partner::where('name', $key)->first()['preferences']['discount_percentage'] ?>
                <?php $min_discount_amount = \App\Entities\Partner::where('name', $key)->first()['preferences']['min_discount_amount'] ?>
                <?php $delivery_charge = \App\Entities\Partner::where('name', $key)->first()['preferences']['delivery_charge'] ?>






                    @foreach($partner as $item)
                        <?php $partner_total = $partner_total + ($item['item']->qty * number_format(((float)$item['item']->price), 2, '.', '')) ?>
                        <tr>
                            <td class="has-text-right">
                                <span>{{ $item['item']->qty}}</span>
                            </td>
                            <td>{!!  $item['item']->name !!}</td>
                            <td class="has-text-right">
                                <span>&#2547; {{number_format(((float)$item['item']->price), 2, '.', '')}}</span>
                            </td>

                            <td class="has-text-right">
                                <span>&#2547; {{number_format(((float)$item['item']->qty * (float)$item['item']->price), 2, '.', '')}}</span>
                            </td>
                        </tr>
                    @endforeach




                    {{-- Partner total --}}
                    <tr>
                        <td colspan="3" class="has-text-right">
                            Amount
                        </td>
                        <td class="has-text-right">
                            &#2547; {{number_format(((float)$partner_total), 2, '.', '')}}
                        </td>
                    </tr>

                    <?php $grand_total_without_delivery = $grand_total_without_delivery; ?>


                    {{-- Partner Discount --}}

                    <?php $discount_amount = 0 ?>

                    @if (!session()->has('discount'))

                        @if($min_discount_amount <= $partner_total)
                            <?php $discount_amount = ($partner_total / 100) * $discount_percentage ?>
                            <?php $partner_total_discounted = $partner_total - $discount_amount ?>
                            <tr>
                                <td colspan="3" class="has-text-right">
                                    Discount ({{$discount_percentage}} %)
                                </td>
                                <td class="has-text-right">
                                    <span>-&#2547; {{number_format(((float)$discount_amount), 2, '.', '')}}</span>
                                </td>
                            </tr>

                        @endif
                    @endif




                    {{-- Delivery charges --}}

                    <?php $delivery_charges_for_partners->put(\App\Entities\Partner::where('name', $key)->first()->id, $delivery_charge); ?>
                    @if($delivery_charge != 0)
                        <?php $partner_total_with_delivery_charge = $partner_total + $delivery_charge ?>

                        <?php  $total_delivery_charge = $total_delivery_charge + $delivery_charge ?>
                        <tr>
                            <td colspan="3" class="has-text-right">
                                Delivery Charge
                            </td>
                            <td class="has-text-right">
                                <span>&#2547; {{number_format(((float)$delivery_charge), 2, '.', '')}}</span>
                            </td>
                        </tr>
                    @endif


                    <tr>
                        <td colspan="3" class="has-text-right"></td>
                        <td class="has-text-right">
                            <span>&#2547; {{number_format(((float)$partner_total_with_delivery_charge), 2, '.', '')}}</span>
                        </td>
                    </tr>



                {{-- Discount Calc--}}
                @if (!session()->has('discount'))
                    <?php $grand_discount = $grand_discount + $discount_amount ?>

                @endif
                {{-- end of discount calc --}}




                <?php $grand_total = $partner_total_with_delivery_charge + $partner_total_with_delivery_charge ?>

                <?php $grand_total_without_delivery = $grand_total_without_delivery + $partner_total ?>


            @endforeach



            {{-- couon code --}}
            @if (session()->has('discount'))
                @if (session()->get('discount.type') == "fixed")
                    <?php $grand_total = $grand_total_without_delivery - session()->get('discount.amount') ?>

                @elseif (session()->get('discount.type') == "percent")
                    <?php $grand_discount = ($grand_total_without_delivery / 100) * session()->get('discount.amount') ?>
                    <?php $grand_total = ($grand_total_without_delivery - $grand_discount) ?>
                    <?php $grand_total = $grand_total + $total_delivery_charge ?>
                @endif
            @endif

            {{-- coupon code --}}
                </tbody>
            <tfoot>

                @if($grand_discount > 0 )
                <tr>
                    <th colspan="3" class="has-text-right">
                        <span>Total Discount
                            @if (session()->has('discount'))
                                {!!   session()->get('discount.formatted')  !!}
                            @endif</span>
                    </th>
                    <th class="has-text-right">
                        <span>-&#2547; {{number_format(((float)$grand_discount), 2, '.', '')}}</span>
                    </th>
                </tr>
                @endif

                <tr>
                    <th colspan="3" class="has-text-right">
                        <span>Total Amount</span>
                    </th>
                    <th class="has-text-right">
                        <span>&#2547; {{number_format(((float)$grand_total), 2, '.', '')}}</span>
                    </th>
                </tr>

                </tfoot>


            </table>


            <input type="hidden" name="total_amount" id="total_amount" value="{{ $grand_total }}">
            <input type="hidden" name="total_discount" id="total_discount"
                   value="{{$grand_discount}}">
            <input type="hidden" name="tax" id="tax" value="0">

            @foreach($delivery_charges_for_partners as $key => $value)
                <input type="hidden" name="delivery[]" value="{{$key}}-{{$value}}">
            @endforeach






        </div>

    </div>
@endif