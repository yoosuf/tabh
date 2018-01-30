@if ($errors->any())
    <div class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) with this customer creation</p>
        </div>
    </div>
    <br>
@endif
{{ csrf_field() }}



        <div class="card">
            <div class="card-content">

                <div class="field">
                    <label for="customer_name">Full name</label>

                    <div class="control is-expanded">
                        <input
                                id="customer_name"
                                type="text"
                                name="customer_name"
                                class="input {{ $errors->has('customer_name') ? ' is-danger' : '' }}"
                                value="{{ isset($item->name)? $item->name : old('customer_name') }}"  />
                    </div>
                    @if ($errors->has('customer_name'))
                        <span class="help is-danger">
                                    {{ $errors->first('customer_name') }}
                                </span>
                    @endif
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


                <div class="content">
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit">
                                Save changes
                            </button>
                        </div>
                        <div class="control">
                            <a class="button is-text" href="{{ route('admin.users') }}">
                                Discard
                            </a>
                        </div>
                    </div>

        </div>
