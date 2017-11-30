@extends('layouts.admin')

@section('content')
    <p class="title">Partners</p>


    <a href="{{ route('admin.partners.create') }}" class="button is-primary">Add New Partner</a>



    <table class="table is-fullwidth is-striped">
        <thead>
        <tr>
            <th><abbr title="Played">Name</abbr></th>
            <th><abbr title="Won">Location</abbr></th>
            <th><abbr title="Drawn">Orders</abbr></th>
            <th><abbr title="Lost">Last order</abbr></th>
            <th><abbr title="Goals for">Total spent</abbr></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th><abbr title="Played">Name</abbr></th>
            <th><abbr title="Won">Location</abbr></th>
            <th><abbr title="Drawn">Orders</abbr></th>
            <th><abbr title="Lost">Last order</abbr></th>
            <th><abbr title="Goals for">Total spent</abbr></th>
        </tr>
        </tfoot>
        <tbody>

        @if(count($data) > 0)
            @foreach($data as $item)
                <tr>
                    <th><a href="{{ route('admin.customers.edit', [$item->id]) }}">{{ $item->name  }}</a></th>
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
@endsection
