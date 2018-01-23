@if ($errors->any())
    <article class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) performing this action.</p>
        </div>
    </article>
    <br>
@endif
{{ csrf_field() }}


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

            <label for="address_district">{{ trans('quicksilver.account.address.input_district')}}</label>
            <div class="control is-expanded">


                <div class="select is-fullwidth {{ $errors->has('address_district') ? ' is-danger' : '' }}" >

                    {!! render_districts(isset($item->district_id) ? $item->district_id : old('address_district'), 'address_district') !!}

                </div>

            </div>
            @if ($errors->has('address_district'))
                <span class="help is-danger">
                    {{ $errors->first('address_district') }}
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
        {{--<div class="field">--}}

            {{--<label for="address_country">{{ trans('quicksilver.account.address.input_country')}}</label>--}}
            {{--<div class="control is-expanded">--}}


                {{--<div class="select is-fullwidth {{ $errors->has('address_country') ? ' is-danger' : '' }}">--}}

                    {{--{!! render_countries(isset($item->country)? $item->country : old('address_country'), 'address_country') !!}--}}

                {{--</div>--}}

            {{--</div>--}}
            {{--@if ($errors->has('address_country'))--}}
                {{--<span class="help is-danger">--}}
                    {{--{{ $errors->first('address_country') }}--}}
                {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
        <div class="field">

            <label for="address_area">{{ trans('quicksilver.account.address.input_area')}}</label>
            <div class="control is-expanded">


                <div class="select is-fullwidth {{ $errors->has('address_area') ? ' is-danger' : '' }}" >

                    {!! render_areas(isset($item->area_id) ? $item->area_id : old('address_area'), 'address_area') !!}

                </div>

            </div>
            @if ($errors->has('address_area'))
                <span class="help is-danger">
                    {{ $errors->first('address_area') }}
                </span>
            @endif
        </div>

        {{--<input type="hidden" name="address_country" id="address_country" value="BD">--}}
        <div class="field">

            <label for="address_country">{{ trans('quicksilver.account.address.input_country')}}</label>
            <div class="control is-expanded">


                <div class="select is-fullwidth {{ $errors->has('address_country') ? ' is-danger' : '' }}" >

                    {!! render_countries(isset($item->country) ? $item->country : old('address_country'), 'address_country') !!}

                </div>

            </div>
            @if ($errors->has('address_country'))
                <span class="help is-danger">
                    {{ $errors->first('address_country') }}
                </span>
            @endif
        </div>
    </div>
</div>



