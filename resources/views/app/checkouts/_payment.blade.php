@if (auth()->check())
    <div class="card checkouts-order-details-card">
        <div class="card-content">

            <h1 class="title is-4 is-spaced">Pay By</h1>
            <p class="subtitle is-5"></p>

            <div class="address-item">

                <div class="field">
                    {{--<label>{{ trans('quicksilver.account.address.input_full_name')}}</label>--}}
                    <div class="control is-expanded">
                        <label class="radio">
                                <input type="radio" value="cash" checked="checked" name="payment_type">
                                Cash On Delivery
                        </label>

                    </div>
                </div>
            </div>

            <div class="address-item">

                <div class="field">
                    {{--<label>{{ trans('quicksilver.account.address.input_full_name')}}</label>--}}
                    <div class="control is-expanded">
                        <label class="radio">
                            <input type="radio" value="card" name="payment_type" disabled>
                            Credit Card
                            <span class="help is-3 display-inline-block">
                            (coming soon)
                            </span>
                        </label>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endif