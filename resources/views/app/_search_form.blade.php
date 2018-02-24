<form role="form" method="GET" id="cart-search-form" action="{{ route('search') }}" autocomplete="off">
    <input type="hidden" name="type" value="{{$type}}">

    <label for="" class="label">{{ trans('quicksilver.search.heading')}}</label>
    <div class="field has-addons">
        <div class="control is-expanded" id="remote">
            <input class="input is-medium typeahead" type="text" name="q" id="q"
                   value="{{$search_query}}"
                   placeholder="{{ trans('quicksilver.search.search_placeholder')}}"
                   autocomplete="off"/>
        </div>
        <div class="control">
            <button class="button is-link is-medium" type="submit">
                {{ trans('quicksilver.search.button')}}
            </button>
        </div>
    </div>
</form>