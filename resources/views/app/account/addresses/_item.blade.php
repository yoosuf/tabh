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

                {{ $item->city }}, {{ $item->province }}, {{ $item->postcode }}, {{ $item->country }}
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


                    {{--@if(!$item->default)--}}

                        {{--<a class="dropdown-item" href="{{ route('account.address.default', $item->id) }}"--}}
                           {{--onclick="event.preventDefault();--}}
                                       {{--document.getElementById('mark-default').submit();">--}}
                            {{--Set as Default--}}
                        {{--</a>--}}
                        {{--<form id="mark-default" action="{{ route('account.address.default', $item->id) }}" method="POST"--}}
                              {{--style="display: none;">--}}
                            {{--{{ csrf_field() }}--}}
                        {{--</form>--}}


                    {{--@endif--}}
                    @if(count($data) != 1)
                        <hr class="dropdown-divider">
                        <form id="mark-default" action="{{route('account.address.destroy', $item->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="dropdown-item">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>






    </div>
</div>