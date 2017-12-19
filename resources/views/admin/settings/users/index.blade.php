@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column">
            <p class="title">Users</p>
        </div>
        <div class="column">
            <div class="buttons has-addons is-right">
                <a href ="{{ route('admin.users.create') }}" class="button is-link">Add New User</a>
            </div>

        </div>
    </div>




    <div class="card">
        <div class="card-content">





                    <table class="table is-fullwidth is-striped">
                        <thead>
                        <tr>
                            <th><abbr title="Played">Name</abbr></th>
                            <th><abbr title="Won">Email</abbr></th>
                            <th width="160"><abbr title="Goals for">Actions</abbr></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><abbr title="Played">Name</abbr></th>
                            <th><abbr title="Won">Email</abbr></th>
                            <th width="160"><abbr title="Goals for">Actions</abbr></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @if(count($data) > 0)
                            @foreach($data as $item)
                                <tr>
                                    <td><a href="{{ route('admin.users.edit', [$item->id]) }}">{{ $item->name  }}</a></td>
                                    <td>{{ $item->email }}</td>

                                    <td>@include('admin.settings.users._menu')</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="5">No users found</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>

            {{$data->links()}}









        </div>
    </div>
@endsection
