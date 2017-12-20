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
    <label for="current-password">{{ trans('quicksilver.account.password.input_current_password')}}</label>


    <input id="current-password"
           type="password"
           class="input {{ $errors->has('current_password') ? ' is-danger' : '' }}"
           name="current_password" required/>

    @if ($errors->has('current_password'))
        <span class="help-block">
                <strong>{{ $errors->first('current_password') }}</strong>
            </span>
    @endif

</div>


<div class="field">
    <label for="password">{{ trans('quicksilver.account.password.input_new_password') }}</label>


    <input id="password"
           type="password"
           class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
           name="password" required/>

    @if ($errors->has('password'))
        <span class="help is-danger">
                {{ $errors->first('password') }}
            </span>
    @endif

</div>

<div class="field">
    <label for="password-confirm">{{ trans('quicksilver.account.password.input_confirm_password') }}</label>

    <input id="password-confirm" type="password"
           class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}"
           name="password_confirmation" required/>

    @if ($errors->has('password_confirmation'))
        <span class="help is-danger">
                {{ $errors->first('password_confirmation') }}
            </span>
    @endif

</div>

