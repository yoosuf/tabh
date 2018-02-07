@extends('layouts.admin')
@section('content')
    <div class="columns">
        <div class="column">
            <p class="title">Coupons</p>
        </div>
        <div class="column">

        </div>
    </div>



    <div class="columns">

        <div class="column is-8">

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
                                <td><a href="{{ route('admin.coupons.edit', [$item->id]) }}">{{ $item->name  }}</a></td>
                                <td>{{ $item->email }}</td>

                                <td>@include('admin.settings.coupons._menu')</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="5">No coupons found</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>

        <div class="column is-4">
   
    @include('flash::message')
    <form action="{{ route('admin.coupons.store')  }}" method="POST" accept-charset="UTF-8">
        @include('admin.settings.coupons._form')
    </form>

        </div>

    </div>
@endsection
