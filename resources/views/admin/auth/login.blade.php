@extends('layouts.auth')

@section('content')
    <div class="container">

        <div class="columns">
            <div class="column is-4 is-offset-4">

                <div class="auth card">
                    <div class="card-content">
                        <h4 class="card-title">{{ trans('quicksilver.login.heading')}}</h4>


                        <form class="" method="POST" action="{{ url('admin/login') }}">
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

                                </div>


                                <div class="clear-fix"></div>


                            </div>

                            <div class="field is-grouped">
                                <button type="submit" class="button is-link is-block">
                                    Log in
                                </button>


                            </div>


                        </form>

                    </div>


                </div>

            </div>


        </div>

    </div>
@endsection
