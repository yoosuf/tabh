@if (!auth()->check())

    <div class="card">
        <div class="card-content">

            <h1 class="title is-4 is-spaced">Log in</h1>
            <p class="subtitle is-5"></p>
<form class="" method="POST" action="{{ route('login') }}" autocomplete="off">
                            {{ csrf_field() }}

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

    <div class="field{{ $errors->has('password') ? '  is-danger' : '' }}">
        <label for="password" class="label">{{ trans('quicksilver.password') }}</label>

        <div class="control is-expanded">
        <input id="password" type="password" name="password" required
                class="input {{ $errors->has('email') ? ' is-danger' : '' }}" />

        </div>
        @if ($errors->has('password'))
            <span class="help is-danger">
            {{ $errors->first('password') }}
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


    <a class="button is-block" href="{{ route('provider.redirect', ['provider' => 'facebook', 'action' => 'signin'])}}">
<span class="icon">
<i class="fa fa-github"></i>
</span>
        <span>Sign in with Facebook</span>
    </a>


</form>

        </div>
    </div>
    @endif