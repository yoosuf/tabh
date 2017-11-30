@extends('layouts.admin')

@section('content')


    <div class="columns">

        <div class="column is-8">

            <div class="card">
                <div class="card-content">

                    <div class="field is-horizontal">

                        <div class="field-body">
                            <div class="field">
                                <label class="label">Full name</label>

                                <div class="control">
                                    <input class="input" type="text" placeholder="Full name" />
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="field is-horizontal">

                        <div class="field-body">
                            <div class="field">
                                <label class="label">Email</label>

                                <div class="control">
                                    <input class="input" type="text" placeholder="Full name" />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Phone number</label>

                                <div class="control">
                                    <input class="input is-success" type="email" placeholder="Email"
                                           value="alex@smith.com" />

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="field is-horizontal">





                        <div class="field-body">
                            Notifications
                        </div>
                        <div class="field-body">

                            <div class="field">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        Allow important notifications to be sent by email

                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>









                    <button class="button is-link">
                                        Send message
                                    </button>


            </div>

        </div>
    </div>


@endsection
