<div class="media">

    <div class="media-content">
        <div class="content">
            <p>
                <strong>{{ $item->name }}</strong>
                <br>
                <strong>{{ $item->phone }}</strong>

            <address>
                {{ $item->address1 }} <br />
                {{ $item->address2 }} <br />

                {{ $item->city }}, {{ $item->district }}, {{ $item->postcode }}, {{ $item->country }}
            </address>

            </p>
        </div>
    </div>
    <div class="media-right">


        <div class="dropdown is-right is-hoverable">
            <div class="dropdown-trigger">
                <button class="button" aria-haspopup="true" aria-controls="dropdown-menu6">
                    <span>Options</span>
                </button>
            </div>
            <div class="dropdown-menu" id="dropdown-menu6" role="menu">
                <div class="dropdown-content">

                    <a  href="{{ route('account.address.edit', [$item->id]) }}" class="dropdown-item">
                        Edit address

                    </a>




                    @if(count($data) != 1)
                        <hr class="dropdown-divider">
                        <form id="mark-default" action="{{route('account.address.destroy', $item->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}


                            <a href="#" class="dropdown-item droppable" data-confirm="Are you sure to delete this item?">Delete</a>


                        </form>
                    @endif
                </div>
            </div>
        </div>






    </div>
</div>