@extends('layouts.app')

@section('content')



    <div class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-8">
                





    <div class="columns">
        <div class="column">
            <p class="title">Addresses</p>
        </div>
        <div class="column">
            <div class="buttons has-addons is-right">
                <a href ="{{ route('admin.customers.create') }}" class="button is-link">Add New Address</a>
            </div>

        </div>
    </div>


      
                    @include('app.account._nav')





    <table class="table">
  <thead>
    <tr>
      <th><abbr title="Position">Contact Name</abbr></th>
      <th>Phone</th>
      <th width="200"><abbr title="Played">Address</abbr></th>
      <th><abbr title="Won">City</abbr></th>
      <th><abbr title="Drawn">Province</abbr></th>
      <th><abbr title="Lost">Postcode</abbr></th>
      <th><abbr title="Goals for">Postcode</abbr></th>
      <th><abbr title="Goals against">Country</abbr></th>
      <th>Actions</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th><abbr title="Position">Contact Name</abbr></th>
      <th>Phone</th>
      <th><abbr title="Played">Address</abbr></th>
      <th><abbr title="Won">City</abbr></th>
      <th><abbr title="Drawn">Province</abbr></th>
      <th><abbr title="Lost">Postcode</abbr></th>
      <th><abbr title="Goals for">Postcode</abbr></th>
      <th><abbr title="Goals against">Country</abbr></th>
      <th>Actions</th>
    </tr>
  </tfoot>
  <tbody>
@foreach(auth()->user()->addresses as $item)




    <tr>
      <th>{{ $item->name }}</th>
      <td>{{ $item->phone }}</td>
      <td>
            {{ $item->address1 }} <br />
            {{ $item->address2 }}
        </td>
      <td>{{ $item->city }}</td>
      <td>{{ $item->province }}</td>
      <td>{{ $item->postcode }}</td>
      <td>{{ $item->country }}</td>
      <td>Qualification</td>
    </tr>


@endforeach
    </tbody>

    </table>


                    
<a class="open-modal" data-modal-id="#my-modal">Open My Modal</a>



<div class="modal"  id="my-modal" aria-hidden="" >
  <div class="modal-background"></div>
  <div class="modal-content">


    <section class="modal-card-body">
  <!-- <div class="modal-background close-modal" data-modal-id="#my-modal"></div> -->
  <!-- <div class="modal-content"> -->
 <form class="form" method="POST" action="{{ route('password.request') }}" autocomplete="off">

        @include('app.account.addresses._address')


        <div class="field is-grouped">
        <button type="submit" class="button is-link">
            {{ trans('quicksilver.reset.button')}}
        </button>
</div>
        </form> 


        </section>
    
   </div>
   <button aria-label="close" class="delete close-modal" data-modal-id="#my-modal"></button>
</div>







                </div>
            </div>
        </div>
    </div>
@endsection
