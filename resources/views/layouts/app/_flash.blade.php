@if (session('status'))
    <article class="message is-success">
        <div class="message-body">
            {{ session('status') }}
        </div>
    </article>
@elseif(session('danger'))
    <article class="message is-danger">
        <div class="message-body">
            {{ session('danger') }}
        </div>
    </article>
@else
    @if ($errors->any())
        <article class="message is-danger">
            <div class="message-header">
                <p>There is {{ $errors->count()  }} error (s) performing this action.</p>
            </div>
            @foreach($errors->all() as $error)
                <div class="message-body">
                    <p>{{ $error }}.</p>
                </div>
            @endforeach
        </article>
    @endif
@endif

