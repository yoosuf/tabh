

@if ($errors->any())
    <article class="message is-danger">
        <div class="message-body">
            <p>There is {{ $errors->count()  }} error (s) performing this action.</p>
        </div>
    </article>
    <br>
@endif
{{ csrf_field() }}


@include('flash::message')







<div class="field has-addons">
    <div class="control">
        <input class="input" type="email" name="email" id="email"value="{{ old('email') }}" class="input {{ $errors->has('email') ? ' is-danger' : '' }}"  placeholder="email address">
        @if ($errors->has('customer_email'))
            <span class="help is-danger">
            {{ $errors->first('customer_email') }}
            </span>
        @endif
    </div>
    <div class="control">
        <a class="button is-info">
            Invite
        </a>
    </div>

</div>








