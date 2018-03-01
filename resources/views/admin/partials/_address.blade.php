<div class="field">
    <label for="address_name">Contact name</label>
    <div class="control is-expanded">
        <input
                id="address_name"
                type="text"
                name="address_name"
                class="input {{ $errors->has('address_name') ? ' is-danger' : '' }}"
                value="{{ isset($item->name)? $item->name : old('address_name') }}"/>
    </div>
    @if ($errors->has('address_name'))
        <span class="help is-danger">
                    {{ $errors->first('address_name') }}
                </span>
    @endif
</div>


<div class="field">
    <div class="control is-expanded">
        <label for="address_phone">Contact phone</label>
        <input
                id="address_phone"
                name="address_phone"
                class="input {{ $errors->has('address_phone') ? ' is-danger' : '' }}"
                value="{{ isset($item->phone)? $item->phone : old('address_phone') }}"/>
    </div>
    @if ($errors->has('address_phone'))
        <span class="help is-danger">
                    {{ $errors->first('address_phone') }}
                </span>
    @endif
</div>


<div class="field">
    <div class="control is-expanded">
        <label for="address_line1">Address line 1</label>
        <input
                id="address_line1"
                type="text"
                name="address_line1"
                class="input {{ $errors->has('address_line1') ? ' is-danger' : '' }}"
                value="{{ isset($item->address1)? $item->address1 : old('address_line1') }}"/>
    </div>
    @if ($errors->has('address_line1'))
        <span class="help is-danger">
                    {{ $errors->first('address_line1') }}
                </span>
    @endif
</div>


<div class="field">
    <div class="control is-expanded">
        <label for="address_line2">Address line 2</label>
        <input
                id="address_line2"
                type="text"
                name="address_line2"
                class="input {{ $errors->has('address_line2') ? ' is-danger' : '' }}"
                value="{{ !empty($item->address2)? $item->address2 : old('address_line2') }}"/>
    </div>
    @if ($errors->has('address_line2'))
        <span class="help is-danger">
                    {{ $errors->first('address_line2') }}
                </span>
    @endif
</div>




<div class="field is-horizontal">
    <div class="field-body">

        <div class="field">
            <label for="address_province">State</label>
            <div class="control is-expanded">
                <div class="select is-fullwidth {{ $errors->has('address_province') ? ' is-danger' : '' }}">

                    {!! render_districts(isset($item->district_id)? $item->district_id : old('address_province'), 'address_province') !!}
                </div>
            </div>

            @if ($errors->has('address_province'))
                <span class="help is-danger">
                    {{ $errors->first('address_province') }}
                </span>
            @endif
        </div>


        <div class="field">
            <label for="address_city">City</label>

            <div class="control is-expanded">
                <div class="select is-fullwidth {{ $errors->has('address_city') ? ' is-danger' : '' }}">


                    {!! render_areas(isset($item->city_id)? $item->city_id : old('address_city'), isset($item->district_id)? $item->district_id : old('address_province'), 'address_city') !!}


                </div>
            </div>
            @if ($errors->has('address_city'))
                <span class="help is-danger">
                    {{ $errors->first('address_city') }}
                </span>
            @endif
        </div>
    </div>
</div>



<div class="field">
    <div class="field-body">

        <div class="field">
            <label for="address_postcode">Zip/postal code</label>

            <div class="control is-expanded">
                <input
                        id="address_postcode"
                        type="text"
                        name="address_postcode"
                        class="input {{ $errors->has('address_postcode') ? ' is-danger' : '' }}"
                        value="{{ isset($item->postcode)? $item->postcode : old('address_postcode') }}"/>
            </div>

            @if ($errors->has('address_postcode'))
                <span class="help is-danger">
                    {{ $errors->first('address_postcode') }}
                </span>
            @endif
        </div>
    </div>
</div>




