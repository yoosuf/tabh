@extends('layouts.admin')

@section('content')


    <div class="columns">
        <div class="column">
            <p class="title">Files</p>
        </div>
    </div>

    @include('flash::message')

    <div class="card">
        <div class="card-content">
            <table class="table is-fullwidth is-hoverable is-striped">
              <thead>
                <tr>
                    <th><abbr title="Played">Name</abbr></th>
                    <th width="200"><abbr title="Won">Image</abbr></th>
                    <th width="200"><abbr title="Won">Type</abbr></th>
                    <th width="200"><abbr title="Won">Actions</abbr></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th><abbr title="Played">Name</abbr></th>
                  <th width="200"><abbr title="Won">Image</abbr></th>
                  <th width="200"><abbr title="Won">Type</abbr></th>
                  <th width="200"><abbr title="Won">Actions</abbr></th>
                </tr>
              </tfoot>
              <tbody>
                @if(count($data) > 0)
                    @foreach($data as $item)
                        <tr>
                          <td>{{ $item->file_name }}</td>
                          <td>

                            <figure class="image is-48x48">
                              <img src="{{ url($item->path) }}" alt="{{ $item->file_name }}" />
                            </figure>
                            </td>
                          <td>{{ $item->attachable_category }}</td>
                          <td>
                              @include('admin.attachments._menu')
                          </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5">No Files found</th>
                    </tr>
                @endif
              </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>

@endsection
