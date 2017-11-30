@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-content">
            <p class="title">Users</p>











                <table class="table">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th><abbr title="Played">Pld</abbr></th>
                        <th><abbr title="Won">W</abbr></th>
                        <th><abbr title="Drawn">D</abbr></th>
                        <th><abbr title="Lost">L</abbr></th>
                        <th><abbr title="Goals for">GF</abbr></th>
                        <th><abbr title="Goals against">GA</abbr></th>
                        <th><abbr title="Goal difference">GD</abbr></th>
                        <th><abbr title="Points">Pts</abbr></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Team</th>
                        <th><abbr title="Played">Pld</abbr></th>
                        <th><abbr title="Won">W</abbr></th>
                        <th><abbr title="Drawn">D</abbr></th>
                        <th><abbr title="Lost">L</abbr></th>
                        <th><abbr title="Goals for">GF</abbr></th>
                        <th><abbr title="Goals against">GA</abbr></th>
                        <th><abbr title="Goal difference">GD</abbr></th>
                        <th><abbr title="Points">Pts</abbr></th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @if(count($data) > 0)
                        @foreach($data as $item)
                            <tr>
                                <th><a href="{{ route('admin.users.edit', [$item->id]) }}">{{ $item->name  }}</a></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5">No users found</th>
                        </tr>
                    @endif
                    </tbody>
                </table>




        </div>
    </div>
@endsection
