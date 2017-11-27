@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-4 is-offset-4">

                <div class="auth card">
                    <div class="card-content">
                        <h4 class="card-title">{{ trans('quicksilver.register.heading')}}</h4>

                        <form class="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="label">{{ trans('quicksilver.full_name')}}</label>

                                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}"
                                       required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="label">{{ trans('quicksilver.email')}}</label>

                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}"
                                       required>

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

                            <div class="field">
                                <label for="password-confirm"
                                       class="label">{{ trans('quicksilver.password_confirm')}}</label>

                                <input id="password-confirm" type="password" class="input" name="password_confirmation"
                                       required>
                            </div>


                            <div class="field is-grouped">

                                <button type="submit" class="button is-link is-block">
                                    {{ trans('quicksilver.register.button')}}
                                </button>
                            </div>


                            <div class="is-divider" data-content="OR"></div>


                            <a class="button is-block">
                    <span class="icon">
                      <i class="fa fa-github"></i>
                    </span>
                                <span>Sign up with Facebook</span>
                            </a>


                        </form>
                    </div>

                </div>


            </div>

        </div>
        <div class="content has-text-centered">
            <p>
                {{ trans('quicksilver.register.have_login_txt')}} <a
                        href="{{ route('login')}}"> {{ trans('quicksilver.register.login_txt')}}</a>
            </p>
        </div>
    </div>
@endsection
