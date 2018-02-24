@extends('layouts.auth')

@section('content')
    <div class="container">

        <div class="columns">
            <div class="column is-4 is-offset-4">

                <div class="auth card">
                    <div class="card-content">
                        <h4 class="card-title">{{ trans('quicksilver.login.heading')}}</h4>


                        <form class="" method="POST" action="{{ route('login') }}" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="label">{{ trans('quicksilver.email') }}</label>

                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}"
                                       required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="label">{{ trans('quicksilver.password') }}</label>

                                <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">

                                <div class="columns is-gapless">
                                    <div class="column">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('quicksilver.login.remember_txt')}}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="column">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">

                                            {{ trans('quicksilver.login.forgot_txt')}}
                                        </a>
                                    </div>
                                </div>


                                <div class="clear-fix"></div>


                            </div>

                            <div class="field is-grouped">
                                <button type="submit" class="button is-link is-block">
                                    {{ trans('quicksilver.login.button')}}
                                </button>


                            </div>


                            <div class="is-divider" data-content="OR"></div>


                            <a class="button is-block"
                               href="{{ route('provider.redirect', ['provider' => 'facebook', 'action' => 'signin'])}}">
                    <span class="icon">
                      <i class="fa fa-github"></i>
                    </span>
                                <span>Sign in with Facebook</span>
                            </a>


                        </form>

                    </div>


                </div>

            </div>


        </div>
        <div class="content has-text-centered">
            <p>
                {{ trans('quicksilver.login.new_user_txt')}} <a
                        href="{{ route('register')}}"> {{ trans('quicksilver.login.register_txt')}}</a>
            </p>

        </div>
    </div>
@endsection
