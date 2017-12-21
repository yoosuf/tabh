@extends('layouts.auth')

@section('content')
    <div class="container forgot-password-page">

        <div class="columns">
            <div class="column is-4 is-offset-4">
                <div class="logo text-center">
                    <h1>TAB-H</h1>
                </div>
                <div class="auth card email-box">
                    <div class="card-content">
                        <h4 class="card-title has-text-centered">{{ trans('quicksilver.forgot.heading')}}</h4>

                        <p class="email-description">{{ trans('quicksilver.forgot.sub_title')}}</p>







                        @if (session('status'))
    <article class="message is-success">
        <div class="message-body">
                                        {{ session('status') }}
        </div>
    </article>
                        @endif

                        <form class="form" method="POST" action="{{ route('password.email') }}" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">{{ trans('quicksilver.email')}}</label>

                                <div class="control is-expanded">

                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                           class="input {{ $errors->has('email') ? ' is-danger' : '' }}" required/>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help is-danger">
                        {{ $errors->first('email') }}
                    </span>
                                @endif


                            </div>

                            <div class="field is-grouped">
                                <button type="submit" class="button is-link is-block">
                                    {{ trans('quicksilver.forgot.button')}}

                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
