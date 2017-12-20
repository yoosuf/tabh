@extends('layouts.admin')

@section('content')


    <div class="columns">
        <div class="column">
            <p class="title">Customers</p>
        </div>
        <div class="column">
            <div class="buttons has-addons is-right">
                <a href="{{ route('admin.customers.create') }}" class="button is-link">Add New Customer</a>
            </div>

        </div>
    </div>



    @include('flash::message')


    <div class="card">
        <div class="card-content">

            @include('admin.customers._filter')

            <table class="table is-fullwidth is-hoverable is-striped">
                <thead>
                <tr>
                    <th><abbr title="Played">Name</abbr></th>
                    <th width="200"><abbr title="Won">Location</abbr></th>
                    <th width="160"><abbr title="Drawn">Orders</abbr></th>
                    <th width="160"><abbr title="Lost">Last order</abbr></th>
                    <th width="160"><abbr title="Goals for">Total spent</abbr></th>
                    <th width="160"><abbr title="Goals for">Actions</abbr></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><abbr title="Played">Name</abbr></th>
                    <th><abbr title="Won">Location</abbr></th>
                    <th><abbr title="Drawn">Orders</abbr></th>
                    <th><abbr title="Lost">Last order</abbr></th>
                    <th><abbr title="Goals for">Total spent</abbr></th>
                    <th><abbr title="Goals for">Actions</abbr></th>
                </tr>
                </tfoot>
                <tbody>

                @if(count($data) > 0)
                    @foreach($data as $item)
                        <tr>
                            <td><a href="{{ route('admin.customers.edit', [$item->id]) }}">{{ $item->fullName()  }}</a>
                            </td>
                            <td>{{ isset($item->primaryAddress->city) ? $item->primaryAddress->city : null }}</td>
                            <td>{{ $item->orders->count() }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                @include('admin.customers._menu')
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5">No customers found</th>
                    </tr>
                @endif
                </tbody>
            </table>

            {{$data->links()}}
        </div>

    </div>

@endsection
