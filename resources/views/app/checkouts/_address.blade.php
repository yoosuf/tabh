@if (auth()->check())
<div class="card checkouts-address-card">
    <div class="card-content">

        <h1 class="title is-4 is-spaced">Delivery address</h1>
        {{--<p class="subtitle is-5">select or add an address</p>--}}

        @if($addresses->count() != 0)

        @foreach($addresses as $key => $address)

        <div class="address-item">

            <div class="field">
                {{--<label>{{ trans('quicksilver.account.address.input_full_name')}}</label>--}}
                <div class="control is-expanded">
                    <label class="radio">
                        @if($address->default == "TRUE")
                        <input type="radio" value="{{$address->id}}" checked="checked" name="address">
                        @else
                        <input type="radio" value="{{$address->id}}" name="address">
                        @endif
                        {{$address->name}}
                        <span class="help is-3 display-inline-block">
                            ({{$address->phone}})
                        </span>
                    </label>

                </div>
            </div>

            <!-- <div class="field">
                <div class="control is-expanded">
                    <label>{{ trans('quicksilver.account.address.input_phone')}}</label>
                    <span class="help is-3">
                        {{$address->phone}}
                    </span>
                </div>
            </div> -->

            <div class="field">
                <div class="control is-expanded">
                    <!-- <label>{{ trans('quicksilver.account.address.input_line_1')}}</label> -->
                    <span class="help is-3">
                        {{$address->address1}}, {{$address->address2}}, {{$address->city}}, {{$address->province}} {{$address->postcode}}, {{$address->country}}
                    </span>
                </div>
            </div>

            <!-- <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <label>{{ trans('quicksilver.account.address.input_city')}}</label>
                        <div class="control is-expanded">
                            <span class="help is-3">
                                {{$address->city}}
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label for="address_postcode">{{ trans('quicksilver.account.address.input_post_code')}}</label>
                        <div class="control is-expanded">
                            <span class="help is-3">
                                {{$address->postcode}}
                            </span>
                        </div>
                    </div>
                </div>
            </div> -->


            <!-- <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">

                        <label for="address_country">{{ trans('quicksilver.account.address.input_country')}}</label>
                        <div class="control is-expanded">
                            <span class="help is-3">
                                {{$address->country}}
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label for="address_province">{{ trans('quicksilver.account.address.input_state')}}</label>

                        <div class="control is-expanded">
                            <span class="help is-3">
                                {{$address->province}}
                            </span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        @endforeach

        @else

        <input type="hidden" name="address" id="address" value="-1">

        <div class="field">
            <label for="address_name">{{ trans('quicksilver.account.address.input_full_name')}}</label>
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
                <label for="address_phone">{{ trans('quicksilver.account.address.input_phone')}}</label>
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
                <label for="address_line_1">{{ trans('quicksilver.account.address.input_line_1')}}</label>
                <input
                id="address_line_1"
                type="text"
                name="address_line_1"
                class="input {{ $errors->has('address_line_1') ? ' is-danger' : '' }}"
                value="{{ isset($item->address1)? $item->address1 : old('address_line_1') }}"/>
            </div>
            @if ($errors->has('address_line_1'))
            <span class="help is-danger">
                {{ $errors->first('address_line_1') }}
            </span>
            @endif
        </div>


        <div class="field">
            <div class="control is-expanded">
                <label for="address_line_2">{{ trans('quicksilver.account.address.input_line_2')}}</label>
                <input
                id="address_line_2"
                type="text"
                name="address_line_2"
                class="input {{ $errors->has('address_line_2') ? ' is-danger' : '' }}"
                value="{{ !empty($item->address2)? $item->address2 : old('address_line_2') }}"/>
            </div>
            @if ($errors->has('address_line_2'))
            <span class="help is-danger">
                {{ $errors->first('address_line_2') }}
            </span>
            @endif
        </div>


        <div class="field is-horizontal">
            <div class="field-body">
                <div class="field">
                    <label for="address_city">{{ trans('quicksilver.account.address.input_city')}}</label>

                    <div class="control is-expanded">
                        <input
                        id="address_city"
                        type="text"
                        name="address_city"
                        class="input {{ $errors->has('address_city') ? ' is-danger' : '' }}"
                        value="{{ isset($item->city)? $item->city : old('address_city') }}"/>
                    </div>
                    @if ($errors->has('address_city'))
                    <span class="help is-danger">
                        {{ $errors->first('address_city') }}
                    </span>
                    @endif
                </div>
                <div class="field">
                    <label for="address_postcode">{{ trans('quicksilver.account.address.input_post_code')}}</label>

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


        <div class="field is-horizontal">
            <div class="field-body">
                <div class="field">

                    <label for="address_country">{{ trans('quicksilver.account.address.input_country')}}</label>
                    <div class="control is-expanded">


                        <div class="select is-fullwidth {{ $errors->has('address_country') ? ' is-danger' : '' }}">

                            {!! render_countries(isset($item->country) ? $item->country : old('address_country'), 'address_country') !!}

                        </div>

                    </div>
                    @if ($errors->has('address_country'))
                    <span class="help is-danger">
                        {{ $errors->first('address_country') }}
                    </span>
                    @endif
                </div>
                <div class="field">
                    <label for="address_province">{{ trans('quicksilver.account.address.input_state')}}</label>

                    <div class="control is-expanded">
                        <input
                        id="address_province"
                        type="text"
                        name="address_province"
                        class="input {{ $errors->has('address_province') ? ' is-danger' : '' }}"
                        value="{{ isset($item->province)? $item->province : old('address_province') }}"/>

                    </div>

                    @if ($errors->has('address_province'))
                    <span class="help is-danger">
                        {{ $errors->first('address_province') }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        @endif

    </div>
</div>

@endif
