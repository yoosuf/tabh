
<div class="card">
    <div class="card-content">
        @if(isset($products) && count($products) > 0)

            <div class="content">
                <strong>Search Results {{ count($products) }}</strong>
            </div>


            @foreach ($products as $product)
                @include('app._item')
            @endforeach
        @else

            <div class="content">
                <strong>Search Results 0 </strong>
            </div>

            <div class="media">
                No results found for {{$search_query}}
            </div>
        @endif

    </div>

</div>
