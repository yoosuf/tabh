@extends('layouts.auth')

@section('content')
<div class="container">

    <div class="columns">
    <div class="column is-4 is-offset-4">

      <div class="auth card">
          <div class="card-content">
          <h4 class="card-title">{{ trans('quicksilver.reset.heading')}}</h4>

                    <form class="form" method="POST" action="{{ route('password.request') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="label">{{ trans('quicksilver.email')}}</label>

                                <input id="email" type="email" class="input" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label">{{ trans('quicksilver.password')}}</label>


                                <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="label">{{ trans('quicksilver.password_confirm')}}</label>

                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="field is-grouped">
                                <button type="submit" class="button is-link is-block">
                                    {{ trans('quicksilver.reset.button')}}
                                </button>
                        </div>
                    </form>

        </div>
    </div>
</div>
@endsection
