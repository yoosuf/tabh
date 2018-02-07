@if (auth()->check())
    <div class="card checkouts-order-details-card">
        <div class="card-content">

            <h1 class="title is-4 is-spaced">Have a discount code?</h1>
            <p class="subtitle is-5"></p>

            

<div class="field has-addons">
  <div class="control is-expanded">
    <input
            placeholder="Discount code"
            id="order_discunt_code"
            type="text"
            name="order_discunt_code"
            class="input {{ $errors->has('order_discunt_code') ? ' is-danger' : '' }}"
            value="{{ isset($item->order_discunt_code)? $item->order_discunt_code : old('order_discunt_code') }}" />
  </div>
  
  <div class="control">
    <button class="button is-info" type="button" id="applyDiscuntCode">
      Apply
    </button>
  </div>


</div>
</div>
@endif