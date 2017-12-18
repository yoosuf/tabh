@extends('layouts.auth')

@section('content')
<div class="container">

  <div class="columns">
  <div class="column is-4 is-offset-4">

    <div class="auth card">
        <div class="card-content">
          <h4 class="card-title has-text-centered">{{ trans('quicksilver.forgot.heading')}}</h4>

          <p>{{ trans('quicksilver.forgot.sub_title')}}</p>

                    @if (session('status'))
                           <article class="message is-danger">
        <div class="message-body">
                            {{ session('status') }}
                        </div>
                        </div>
                    @endif

                    <form class="form" method="POST" action="{{ route('password.email') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('quicksilver.email')}}</label>

                            <div class="control is-expanded">

                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   class="input {{ $errors->has('email') ? ' is-danger' : '' }}" required />
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
@endsection
