@if ($errors->any())
    <article class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) performing this action.</p>
        </div>
    </article>
    <br>
@endif
{{ csrf_field() }}


@include('flash::message')

<div class="field">
    <label for="full-name">Full name</label>

    <div class="control is-expanded">
        <input
                id="full-name"
                type="text"
                name="full_name"
                class="input {{ $errors->has('full_name') ? ' is-danger' : '' }}"
                value="{{ isset($item->name)? $item->name : old('full_name') }}"/>
    </div>
    @if ($errors->has('full_name'))
        <span class="help is-danger">
                                    {{ $errors->first('full_name') }}
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
                type="text"
                name="customer_phone"
                class="input {{ $errors->has('customer_phone') ? ' is-danger' : '' }}"
                value="{{ isset($item->phone)? $item->phone : old('customer_phone') }}"/>
    </div>
    @if ($errors->has('customer_phone'))
        <span class="help is-danger">
                            {{ $errors->first('customer_phone') }}
                        </span>
    @endif
</div>




