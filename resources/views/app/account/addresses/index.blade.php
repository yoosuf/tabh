@extends('layouts.app')

@section('content')



    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8 is-offset-2">

                    @include('app.account._nav')

                    <div class="card">
                        <div class="card-content">

                            <h1 class="title is-4 is-spaced">{{ trans('quicksilver.account.address.txt_heading')}}</h1>
                            <p class="subtitle is-5">{{ trans('quicksilver.account.address.txt_sub_title')}}</p>

                            @foreach($data as $item)
                                @include('app.account.addresses._item', ['item' => $item])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
