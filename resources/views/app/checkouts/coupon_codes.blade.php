

<div class="field has-addons">
  <div class="control">
    <input
            placeholder="Discount code"
            id="order_discunt_code"
            type="text"
            name="order_discunt_code"
            class="input {{ $errors->has('order_discunt_code') ? ' is-danger' : '' }}"
            value="{{ isset($item->order_discunt_code)? $item->order_discunt_code : old('order_discunt_code') }}" />
  </div>
  <div class="control">
    <button class="button is-info" type="button">
      Apply
    </button>
  </div>
</div>