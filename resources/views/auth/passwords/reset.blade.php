@extends('layouts.auth')

@section('content')
    <div class="container forgot-password-page">

        <div class="columns">
            <div class="column is-4 is-offset-4">
                <div class="logo text-center">
                    <h1>TAB-H</h1>
                </div>
                <div class="card email-box">
                    <div class="card-content">


                        <h4 class="card-title has-text-centered">{{ trans('quicksilver.reset.heading')}}</h4>

                        <form class="form" method="POST" action="{{ route('password.request') }}" autocomplete="off">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">



                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('quicksilver.email') }}</label>
                            <div class="control is-expanded">
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                                required autofocus />
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
                                    {{ trans('quicksilver.reset.button')}}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
