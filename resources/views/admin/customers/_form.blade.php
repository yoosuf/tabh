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

                <div class="field">
                    <label for="customer_name">Full name</label>

                    <div class="control is-expanded">
                        <input
                                id="customer_name"
                                type="text"
                                name="customer_name"
                                class="input {{ $errors->has('customer_name') ? ' is-danger' : '' }}"
                                value="{{ isset($item->name)? $item->name : old('customer_name') }}"/>
                    </div>
                    @if ($errors->has('customer_name'))
                        <span class="help is-danger">
                                    {{ $errors->first('customer_name') }}
                                </span>
                    @endif
                </div>

                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <label for="customer_email">Email</label>
                            <div class="control is-expanded">
                                <input
                                        id="customer_email"
                                        type="email"
                                        name="customer_email"
                                        class="input {{ $errors->has('customer_email') ? ' is-danger' : '' }}"
                                        value="{{ isset($item->email)? $item->email : old('customer_email') }}"/>

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
                                        type="tel"
                                        name="customer_phone"
                                        class="input {{ $errors->has('customer_phone') ? ' is-danger' : '' }}"/>
                            </div>
                            @if ($errors->has('customer_phone'))
                                <span class="help is-danger">
                                    {{ $errors->first('customer_phone') }}
                                </span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <p class="title is-4">Address</p>







                    @if( isset($addresses) && count($addresses) > 0)

                        <div class="tile">
                            <div class="tile is-ancestor">
                        @foreach($addresses as $address)
                            <article class="tile is-child notification {{ isset($address->default) ? 'box' : null }}">




                                    {{ $address->name }}<br />
                                    {{ $address->phone }}<br />
                                    {{ $address->address1 }}<br />
                                    {{ $address->address2 }}<br />
                                    {{ $address->city }}, {{ $address->province }}, {{ $address->postcode }}<br />

                                    {{ $address->country }}


                    </article>
                        @endforeach
                            </div>
                        </div>

                    @else
                        @include('admin.partials._address', ['item' => isset($address) ? $address->first() : null])
                    @endif


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

