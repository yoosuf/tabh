@extends('layouts.admin')
@section('content')
    <div class="columns">
        <div class="column">
            <p class="title">Coupons</p>
        </div>
    </div>



    <div class="columns">
        <div class="column is-8">
            <div class="card">
                <div class="card-content">
                    <table class="table is-striped is-narrow is-fullwidth is-hoverable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Reward type</th>
                                <th>Expires at</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                        @if(count($data) > 0)
                            @foreach($data as $item)
                            <tr>
                                <td><a href="{{ route('admin.coupons.edit', [$item->id]) }}">{{ $item->code  }}</a></td>
                                <td>{{ $item->reward_type }} {{ $item->reward }}</td>
                                <td>{{ $item->expires_at->format('Y-m-d') }}</td>
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
                @include('admin.settings.coupons._form', ['item' => null])
            </form>

        </div>

    </div>
@endsection
