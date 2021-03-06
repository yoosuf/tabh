@extends('layouts.admin')

@section('content')




    <div class="columns">
        <div class="column">
            <p class="title">Partners</p>
        </div>
        <div class="column">
            <div class="buttons has-addons is-right">
                <a href="{{ route('admin.partners.create') }}" class="button is-link">Add New Partner</a>
            </div>

        </div>
    </div>




    <div class="card">
        <div class="card-content">

            <table class="table is-striped is-narrow is-fullwidth is-hoverable">
                <thead>
                <tr>
                    <th><abbr title="Played">Name</abbr></th>
                    <th><abbr title="Won">Email</abbr></th>
                    <th><abbr title="Drawn">Phone</abbr></th>
                    <th><abbr title="Lost">Status</abbr></th>
                    <th width="160"><abbr title="Goals for">Actions</abbr></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><abbr title="Played">Name</abbr></th>
                    <th><abbr title="Won">Email</abbr></th>
                    <th><abbr title="Drawn">Phone</abbr></th>
                    <th><abbr title="Lost">Status</abbr></th>
                    <th><abbr title="Goals for">Actions</abbr></th>
                </tr>
                </tfoot>
                <tbody>

                @if(count($data) > 0)
                    @foreach($data as $item)
                        <tr>
                            <td><a href="{{ route('admin.partners.edit', [$item->id]) }}">{{ $item->name  }}</a></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                @if($item->is_active)
                                    <span class="tag is-link">Activated</span>
                                @else
                                    <span class="tag is-warning">De-activated</span>

                                @endif

                            </td>
                            <td>@include('admin.settings.partners._menu')</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5">No partners found</th>
                    </tr>
                @endif
                </tbody>
            </table>

            {{$data->links()}}


        </div>
    </div>
@endsection
