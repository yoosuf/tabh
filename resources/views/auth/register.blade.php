@extends('layouts.auth')

@section('content')
<div class="container register-page">
    <div class="columns">
        <div class="column is-4 is-offset-4">
            <div class="logo text-center">
                <h1>TAB-H</h1>
            </div>
            <div class="auth card register-box">
                <div class="card-content">
                    <h4 class="card-title has-text-centered">{{ trans('quicksilver.register.heading')}}</h4>

                    <form class="form" method="POST" action="{{ route('register') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">{{ trans('quicksilver.full_name')}}</label>

                            <div class="control is-expanded">

                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                class="input {{ $errors->has('name') ? ' is-danger' : '' }}"
                                required autofocus />
                            </div>

                            @if ($errors->has('name'))
                            <span class="help is-danger">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('quicksilver.email')}}</label>

                            <div class="control is-expanded">


                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                                required />

                            </div>
                            @if ($errors->has('email'))
                            <span class="help is-danger">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">{{ trans('quicksilver.password')}}</label>

                            <input id="password" type="password"  name="password" required
                            class="input {{ $errors->has('password') ? ' is-danger' : '' }}" />

                            @if ($errors->has('password'))
                            <span class="help is-danger">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>

                        <div class="field">
                            <label for="password-confirm">{{ trans('quicksilver.password_confirm')}}</label>

                            <input id="password-confirm" type="password"  name="password_confirmation"
                            class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" required />

                        </div>


                        <div class="field is-grouped">

                            <button type="submit" class="button is-link is-block">
                                {{ trans('quicksilver.register.button')}}
                            </button>
                        </div>

                        <div class="is-divider" data-content="OR"></div>
                        <a class="button is-block is-facebook" href="{{ route('provider.redirect', ['provider' => 'facebook', 'action' => 'signup'])}}">
                            <span style="background-image:url(/img/fb_icon_white.png); background-size: contain; width: 20px; height: 20px;     display: inline-block; margin-bottom: -4px;"></span>&nbsp;<span> Sign up with Facebook</span>
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
