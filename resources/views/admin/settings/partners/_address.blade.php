
<div class="field is-horizontal">

    <div class="field-body">
        <div class="field">
            <label for="address_first_name">First name</label>
            <div class="control is-expanded">
                <input
                        id="address_first_name"
                        type="text"
                        name="address_first_name"
                        class="input {{ $errors->has('address_first_name') ? ' is-danger' : '' }}"
                        value="{{ isset($item->address->first_name)? $item->address->first_name : old('address_first_name') }}" />
            </div>
            @if ($errors->has('address_first_name'))
                <span class="help is-danger">
                    {{ $errors->first('address_first_name') }}
                </span>
            @endif
        </div>
        <div class="field">
            <label for="address_last_name">Last name</label>
            <div class="control is-expanded">
                <input
                        id="address_last_name"
                        type="text"
                        name="address_last_name"
                        class="input {{ $errors->has('address_last_name') ? ' is-danger' : '' }}"
                        value="{{ isset($item->address->last_name)? $item->address->last_name : old('address_last_name') }}"  />
            </div>
            @if ($errors->has('address_last_name'))
                <span class="help is-danger">
                    {{ $errors->first('address_last_name') }}
                </span>
            @endif
        </div>
    </div>
</div>


<div class="field">
    <div class="control is-expanded">
        <label for="address_customer_phone">Phone</label>
        <input
                id="address_customer_phone"
               name="address_customer_phone"
               class="input {{ $errors->has('address_phone') ? ' is-danger' : '' }}"
               value="{{ isset($item->address->phone)? $item->address->phone : old('address_customer_phone') }}"  />
    </div>
    @if ($errors->has('address_customer_phone'))
        <span class="help is-danger">
                    {{ $errors->first('address_customer_phone') }}
                </span>
    @endif
</div>



        <div class="field">
            <div class="control is-expanded">
                <label for="address_address_1">Address line 1</label>
                <input
                        id="address_address_1"
                        type="text"
                        name="address_address_1"
                        class="input {{ $errors->has('address_address_1') ? ' is-danger' : '' }}"
                        value="{{ isset($item->address->address1)? $item->address->address1 : old('address_address_1') }}"  />
            </div>
            @if ($errors->has('address_address_1'))
                <span class="help is-danger">
                    {{ $errors->first('address_address_1') }}
                </span>
            @endif
        </div>


<div class="field">
    <div class="control is-expanded">
        <label for="address_address_2">Address line 2</label>
        <input
                id="address_address_2"
                type="text"
                name="address_address_2"
                class="input {{ $errors->has('address_address_2') ? ' is-danger' : '' }}"
                value="{{ !empty($item->address->address2)? $item->address->address2 : old('address_address_2') }}"  />
    </div>
    @if ($errors->has('address_address_2'))
        <span class="help is-danger">
                    {{ $errors->first('address_address_2') }}
                </span>
    @endif
</div>





<div class="field is-horizontal">
    <div class="field-body">
        <div class="field">
            <label for="address_city">City</label>

            <div class="control is-expanded">
                <input
                        id="address_city"
                        type="text"
                        name="address_city"
                        class="input {{ $errors->has('address_city') ? ' is-danger' : '' }}"
                        value="{{ isset($item->address->city)? $item->address->city : old('address_city') }}"  />
            </div>
            @if ($errors->has('address_city'))
                <span class="help is-danger">
                    {{ $errors->first('address_city') }}
                </span>
            @endif
        </div>
        <div class="field">
            <label for="address_postcode">Zip/postal code</label>

            <div class="control is-expanded">
                <input
                        id="address_postcode"
                        type="text"
                        name="address_postcode"
                        class="input {{ $errors->has('address_postcode') ? ' is-danger' : '' }}"
                        value="{{ isset($item->address->postcode)? $item->address->postcode : old('address_postcode') }}"  />
            </div>

            @if ($errors->has('address_postcode'))
                <span class="help is-danger">
                    {{ $errors->first('address_postcode') }}
                </span>
            @endif
        </div>
    </div>
</div>



<div class="field is-horizontal">
    <div class="field-body">
        <div class="field">

            <label for="address_country">Country</label>
            <div class="control">

                <div class="select {{ $errors->has('address_country') ? ' is-danger' : '' }}" >


                <select name="address_country" id="address_country">
                    <option value="">Select your country</option>
                    {{--@foreach ($countries as $item)--}}
                        {{--<option value="{{ $item->nice_name }}"--}}

                        {{-->{{ $item->nice_name }}</option>--}}
                    {{--@endforeach--}}
                </select>
                </div>

            </div>
            @if ($errors->has('address_country'))
                <span class="help is-danger">
                    {{ $errors->first('address_country') }}
                </span>
            @endif
        </div>
        <div class="field">
            <label for="address_province">State</label>

            <div class="control is-expanded">
                <input
                        id="address_province"
                        type="text"
                        name="address_province"
                        class="input {{ $errors->has('address_province') ? ' is-danger' : '' }}"
                        value="{{ isset($item->address->province)? $item->address->province : old('address_province') }}"  />

            </div>

            @if ($errors->has('address_province'))
                <span class="help is-danger">
                    {{ $errors->first('address_province') }}
                </span>
            @endif
        </div>
    </div>
</div>



