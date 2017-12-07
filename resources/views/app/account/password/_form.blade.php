{{ csrf_field() }}


<div class="field{{ $errors->has('current_password') ? ' has-error' : '' }}">
    <label for="current-password">{{ trans('quicksilver.password')}}</label>


        <input id="current-password" type="password" class="input" name="current_password" required>

        @if ($errors->has('current_password'))
            <span class="help-block">
                <strong>{{ $errors->first('current_password') }}</strong>
            </span>
        @endif

</div>


<div class="field{{ $errors->has('new_password') ? ' has-error' : '' }}">
    <label for="new-password">{{ trans('quicksilver.password')}}</label>


        <input id="new-password" type="password" class="input" name="new_password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('new_password') }}</strong>
            </span>
        @endif

</div>

<div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label for="password-confirm">{{ trans('quicksilver.password_confirm')}}</label>

        <input id="password-confirm" type="password" class="input" name="password_confirmation" required>

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    
</div>

