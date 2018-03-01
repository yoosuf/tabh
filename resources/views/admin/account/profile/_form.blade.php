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
    <label for="email">Email</label>
    <div class="control is-expanded">
        <input
                id="email"
                type="email"
                name="email"
                class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                value="{{ isset($item->email)? $item->email : old('email') }}"/>

    </div>
    @if ($errors->has('email'))
        <span class="help is-danger">
                        {{ $errors->first('email') }}
                    </span>
    @endif
</div>

                

