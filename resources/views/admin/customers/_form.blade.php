

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
                <p class="title is-4">Customer overview</p>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <label for="customer_first_name">First name</label>

                            <div class="control is-expanded">
                                <input
                                        id="customer_first_name"
                                        type="text"
                                        name="customer_first_name"
                                        class="input {{ $errors->has('customer_first_name') ? ' is-danger' : '' }}"
                                        value="{{ isset($item->first_name)? $item->first_name : old('customer_first_name') }}"  />
                            </div>
                            @if ($errors->has('customer_first_name'))
                                <span class="help is-danger">
                                    {{ $errors->first('customer_first_name') }}
                                </span>
                            @endif
                        </div>
                        <div class="field">
                            <label for="customer_last_name">Last name</label>
                            <div class="control is-expanded">
                                <input
                                        id="customer_last_name"
                                        type="text"
                                        name="customer_last_name"
                                        class="input {{ $errors->has('customer_last_name') ? ' is-danger' : '' }}"
                                        value="{{ isset($item->last_name)? $item->last_name : old('customer_last_name') }}"  />
                            </div>
                            @if ($errors->has('customer_last_name'))
                                <span class="help is-danger">
                                    {{ $errors->first('customer_last_name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="customer_email">Email</label>
                    <div class="control is-expanded">
                        <input
                                id="customer_email"
                                type="email"
                                name="customer_email"
                                class="input {{ $errors->has('customer_email') ? ' is-danger' : '' }}"
                                value="{{ isset($item->email)? $item->email : old('customer_email') }}"  />

                    </div>
                    @if ($errors->has('customer_email'))
                        <span class="help is-danger">
                        {{ $errors->first('customer_email') }}
                    </span>
                    @endif
                </div>

                <div class="field">
                    <label for="customer_phone">Phone</label>
                    <div class="control is-expanded">
                        <input
                                id="customer_phone"
                                type="text"
                                name="customer_phone"
                                class="input {{ $errors->has('customer_phone') ? ' is-danger' : '' }}" />
                    </div>
                    @if ($errors->has('customer_phone'))
                        <span class="help is-danger">
                            {{ $errors->first('customer_phone') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <p class="title is-4">Address</p>
                    @include('admin.customers._address')
                </div>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <p class="title is-6">Contact</p>
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
                            <a class="button is-text" href="{{ route('admin.customers') }}">
                                Discard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

