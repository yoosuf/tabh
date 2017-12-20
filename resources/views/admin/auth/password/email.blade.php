@extends('layouts.auth')

@section('content')
    <div class="container">

        <div class="columns">
            <div class="column is-4 is-offset-4">

                <div class="auth card">
                    <div class="card-content">
                        <h4 class="card-title">{{ trans('quicksilver.forgot.heading')}}</h4>

                        <p>{{ trans('quicksilver.forgot.sub_title')}}</p>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

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

                            <div class="field is-grouped">
                                <button type="submit" class="button is-link is-block">
                                    {{ trans('quicksilver.forgot.button')}}

                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
@endsection
