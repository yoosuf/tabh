@extends('layouts.admin')

@section('content')
    <p class="title">Partners</p>

    <div class="columns">

        <div class="column is-8">


            <div class="card">
                <div class="card-content">

                    <div class="field">
                        <label class="label">Partner name</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Partner name" />
                        </div>
                    </div>


                    <div class="control">
                        <label class="label">Phone</label>
                        <input class="input" type="text" placeholder="Phone number" />
                    </div>


                    <div class="control">
                        <label class="label">Email</label>
                        <input class="input" type="text" placeholder="Email address" />
                    </div>


                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <span class="file-cta">
                                  <span class="file-icon">
                                    <i class="fa fa-upload"></i>
                                  </span>
                                  <span class="file-label">
                                    Choose a file…
                                  </span>
                                </span>
                        </label>
                    </div>





                    @include('admin.settings.partners._address')

                </div>
            </div>


        </div>


        <div class="column">


            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="title is-6">Contact</p>

                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="title is-6">Tags</p>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
