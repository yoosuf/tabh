@if (!auth()->check())
    <div class="card login-box">
        <div class="card-content">
            <h4 class="card-title has-text-centered">{{ trans('quicksilver.login.heading')}}</h4>


            <form class="" method="POST" action="{{ route('login') }}" autocomplete="off">
                {{ csrf_field() }}

                <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">{{ trans('quicksilver.email') }}</label>
                    <div class="control is-expanded">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                               required autofocus/>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help is-danger">
                                {{ $errors->first('email') }}
                            </span>
                    @endif
                </div>

                <div class="field{{ $errors->has('password') ? '  is-danger' : '' }}">
                    <label for="password">{{ trans('quicksilver.password') }}</label>

                    <div class="control is-expanded">
                        <input id="password" type="password" name="password" required
                               class="input {{ $errors->has('email') ? ' is-danger' : '' }}"/>

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
            </form>

            <div class="is-divider" data-content="OR"></div>


            <form class="" method="GET"
                  action="{{ route('provider.redirect', ['provider' => 'facebook', 'action' => 'signin'])}}"
                  autocomplete="off">

                {{ csrf_field() }}

                <button class="button is-block is-facebook" type="submit">
                    <span style="background-image:url(/img/fb_icon_white.png); background-size: contain; width: 20px; height: 20px;     display: inline-block; margin-bottom: -4px;"></span>&nbsp;<span> Sign in with Facebook</span>
                </button>
            </form>


        </div>


    </div>


    <div class="content has-text-centered">
        <p>
            {{ trans('quicksilver.login.new_user_txt')}} <a
                    href="{{ route('register')}}"> {{ trans('quicksilver.login.register_txt')}}</a>
        </p>

    </div>
@endif