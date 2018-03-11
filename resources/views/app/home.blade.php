@extends('layouts.app')

@section('content')

    <section class="hero is-transparent nav-container position-fixed">
        @include('layouts.app._nav')
    </section>

    <section class="hero section is-fullheight home-body">

        <div class="columns">
            <h2 class="main-desc main-desc1">Easy order. Quick delivery. Great offers</h2>
            <h2 class="main-desc main-desc2">Digital health hub for you and your family.</h2>
            <div class="column home-tab-item pharmaceutical">
                <div>
                    <h2>Pharmacy</h2>
                    <a href="{{ route('search', ['type' => 'pharmaceutical']) }}">Shop Now</a>
                </div>
            </div>
            <div class="column home-tab-item groceries">
                <div>
                    <h2>Grocery</h2>
                    <a href="{{ route('search', ['type' => 'groceries']) }}" id="shop_groceries">Shop Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('js-content')
<script>
$(function () {
    if ($("#shop_groceries").length) {
        $('#shop_groceries').on('click', function (e) {
            e.preventDefault();
            $(this).replaceWith("<p style=\"padding-top: 24px; line-height: 2\">Coming soon.</p>");
        });
    }
});
</script>
@endsection
