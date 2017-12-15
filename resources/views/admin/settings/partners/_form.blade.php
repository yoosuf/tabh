@if ($errors->any())
    <article class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) with this action</p>
        </div>
    </article>
    <br>
@endif
{{ csrf_field() }}


<div class="columns">
    <div class="column is-8">
        <div class="card">
            <div class="card-content">
                <p class="title is-4">Partner overview</p>


                <div class="field">
                    <label for="partner_name">Partner name</label>

                    <div class="control is-expanded">
                        <input
                                id="partner_name"
                                type="text"
                                name="partner_name"
                                class="input {{ $errors->has('partner_name') ? ' is-danger' : '' }}"
                                value="{{ isset($item->name)? $item->name : old('partner_name') }}"/>
                    </div>
                    @if ($errors->has('partner_name'))
                        <span class="help is-danger">
                            {{ $errors->first('partner_name') }}
                        </span>
                    @endif
                </div>


                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <label for="partner_email">Email</label>

                            <div class="control is-expanded">
                                <input
                                        id="partner_email"
                                        type="text"
                                        name="partner_email"
                                        class="input {{ $errors->has('partner_email') ? ' is-danger' : '' }}"
                                        value="{{ isset($item->email)? $item->email : old('partner_email') }}"/>
                            </div>
                            @if ($errors->has('partner_email'))
                                <span class="help is-danger">
                                    {{ $errors->first('partner_email') }}
                                </span>
                            @endif
                        </div>

                        <div class="field">
                            <label for="partner_phone">Phone</label>

                            <div class="control is-expanded">
                                <input
                                        id="partner_phone"
                                        type="text"
                                        name="partner_phone"
                                        class="input {{ $errors->has('partner_phone') ? ' is-danger' : '' }}"
                                        value="{{ isset($item->phone)? $item->phone : old('partner_phone') }}"/>
                            </div>
                            @if ($errors->has('partner_phone'))
                                <span class="help is-danger">
                                    {{ $errors->first('partner_phone') }}
                                </span>
                            @endif
                        </div>

                    </div>
                </div>


                <div class="field">
                    <label for="partner_website">Website</label>

                    <div class="control is-expanded">
                        <input
                                id="partner_website"
                                type="text"
                                name="partner_website"
                                class="input {{ $errors->has('partner_website') ? ' is-danger' : '' }}"
                                value="{{ isset($item->website)? $item->website : old('partner_website') }}"/>
                    </div>
                    @if ($errors->has('partner_website'))
                        <span class="help is-danger">
                            {{ $errors->first('partner_website') }}
                        </span>
                    @endif
                </div>

            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="content">
                    <p class="title is-4">Address</p>


                    @include('admin.partials._address', ['item' => isset($address) ? $address : []])

                </div>
            </div>
        </div>

    </div>


    <div class="column">


        <div class="card">
            <div class="card-content">
                <div class="content">


                    <div class="field">

                        <label for="partner_api">API Endpoint</label>
                        <div class="control is-expanded">
                            <input
                                    id="partner_api"
                                    type="text"
                                    name="partner_api"
                                    class="input {{ $errors->has('partner_api') ? ' is-danger' : '' }}"
                                    value="{{ isset($item->preferences)? $item->preferences['api'] : old('partner_api') }}"/>
                        </div>
                        @if ($errors->has('partner_api'))
                            <span class="help is-danger">{{ $errors->first('partner_api') }}</span>
                        @endif

                    </div>


                    <div class="field">

                        <label for="partner_api_key">API Key</label>
                        <div class="control is-expanded">
                            <input
                                    type="text"
                                    id="partner_api_key"
                                    name="partner_api_key"
                                    class="input {{ $errors->has('partner_api_key') ? ' is-danger' : '' }}"
                                    value="{{ isset($item->preferences)? $item->preferences['api_key'] : old('partner_api_key') }}"/>
                        </div>
                        @if ($errors->has('partner_api_key'))
                            <span class="help is-danger">{{ $errors->first('partner_api_key') }}</span>
                        @endif
                    </div>






                    <div class="field">
                        <label for="partner_max_discount_amount">Max Discount rate</label>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input" type="number"
                                       id="partner_max_discount_amount"
                                       name="partner_max_discount_amount"
                                       value="{{ isset($item->preferences)?  $item->preferences['max_discount_amount'] : old('partner_max_discount_amount') }}"/>
                            </div>
                            <div class="control">
                                <a class="button is-static">
                                    ৳
                                </a>
                            </div>
                        </div>
                        @if ($errors->has('partner_max_discount_amount'))
                            <span class="help is-danger">{{ $errors->first('partner_max_discount_amount') }}</span>
                        @endif
                    </div>




                    <div class="field">
                        <label for="partner_discount_percentage">Discount percentage</label>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input" type="number"
                                       id="partner_discount_percentage"
                                       name="partner_discount_percentage"
                                       value="{{ isset($item->preferences)?  $item->preferences['discount_percentage'] : old('partner_discount_percentage') }}"/>
                            </div>
                            <div class="control">
                                <a class="button is-static">
                                    %
                                </a>
                            </div>
                        </div>
                        @if ($errors->has('partner_discount_percentage'))
                            <span class="help is-danger">{{ $errors->first('partner_discount_percentage') }}</span>
                        @endif
                    </div>


                        {{--<div class="control is-expanded">--}}
                            {{--<input--}}
                                    {{--id="partner_website"--}}
                                    {{--type="text"--}}
                                    {{--name="partner_website"--}}
                                    {{--class="input {{ $errors->has('partner_website') ? ' is-danger' : '' }}"--}}
                                    {{--value="{{ isset($item->preferences)?  $item->preferences['max_discount_amount'] : old('partner_website') }}"/>--}}
                        {{--</div>--}}
                        {{--@if ($errors->has('partner_status'))--}}
                            {{--<span class="help is-danger">{{ $errors->first('partner_status') }}</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}


                    {{--<div class="field">--}}

                        {{--<label for="partner_status">Discount percentage</label>--}}
                        {{--<div class="control is-expanded">--}}
                            {{--<input--}}
                                    {{--id="partner_website"--}}
                                    {{--type="text"--}}
                                    {{--name="partner_website"--}}
                                    {{--class="input {{ $errors->has('partner_website') ? ' is-danger' : '' }}"--}}
                                    {{--value="{{ isset($item->preferences)? $item->preferences['discount_percentage'] : old('partner_website') }}"/>--}}
                        {{--</div>--}}
                        {{--@if ($errors->has('partner_status'))--}}
                            {{--<span class="help is-danger">{{ $errors->first('partner_status') }}</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}


                    <div class="field">

                        <label for="partner_status">Status</label>
                        <div class="control is-expanded">

                            <div class="select is-fullwidth {{ $errors->has('partner_status') ? ' is-danger' : '' }}">

                                <select name="partner_status" id="partner_status">
                                    <option value="">Publish status</option>
                                    <option value="1" {{ isset($item->is_active) &&  $item->is_active == 1 ? 'selected':  null }}>
                                        Active
                                    </option>
                                    <option value="0" {{ isset($item->is_active) &&  $item->is_active == 0 ? 'selected':  null }}>
                                        De-active
                                    </option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('partner_status'))
                            <span class="help is-danger">{{ $errors->first('partner_status') }}</span>
                        @endif
                    </div>


                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="content">
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit">
                                Save changes
                            </button>
                        </div>
                        <div class="control">
                            <a class="button is-text" href="{{ route('admin.partners') }}">
                                Discard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
