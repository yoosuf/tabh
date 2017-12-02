

@if ($errors->any())
    <article class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) with this customer creation</p>
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
                                value="{{ isset($item->name)? $item->name : old('partner_name') }}"  />
                    </div>
                    @if ($errors->has('partner_name'))
                        <span class="help is-danger">
                            {{ $errors->first('partner_name') }}
                        </span>
                    @endif
                </div>



                <div class="field">
                    <label for="partner_email">Email</label>

                    <div class="control is-expanded">
                        <input
                                id="partner_email"
                                type="text"
                                name="partner_email"
                                class="input {{ $errors->has('partner_email') ? ' is-danger' : '' }}"
                                value="{{ isset($item->email)? $item->email : old('partner_email') }}"  />
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
                                value="{{ isset($item->phone)? $item->phone : old('partner_phone') }}"  />
                    </div>
                    @if ($errors->has('partner_phone'))
                        <span class="help is-danger">
                            {{ $errors->first('partner_phone') }}
                        </span>
                    @endif
                </div>


                <div class="field">
                    <label for="partner_website">Website</label>

                    <div class="control is-expanded">
                        <input
                                id="partner_website"
                                type="text"
                                name="partner_website"
                                class="input {{ $errors->has('partner_website') ? ' is-danger' : '' }}"
                                value="{{ isset($item->website)? $item->website : old('partner_website') }}"  />
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
                    @include('admin.settings.partners._address')

                </div>
            </div>
        </div>


    </div>


    <div class="column">


        <div class="card">
            <div class="card-content">
                <div class="content">
                    <p class="title is-6">Logo</p>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="content">
                    <p class="title is-6">Tags</p>

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
