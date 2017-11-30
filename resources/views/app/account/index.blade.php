@extends('layouts.app')

@section('content')

    <section class="hero is-info is-medium">



        <div class="columns">
            <div class="column">


                <ul class="steps my-step-style has-content-centered">

                    <li class="steps-segment">
                        <span class="steps-marker"></span>
                        <div class="steps-content">
                            <p class="is-size-5">Step 1</p>
                        </div>
                    </li>
                    <li class="steps-segment">
                        <span class="steps-marker"></span>
                        <div class="steps-content">
                            <p class="is-size-5">Step 2</p>
                        </div>
                    </li>
                    <li class="steps-segment is-active">
                        <span class="steps-marker"></span>
                        <div class="steps-content">
                            <p class="is-size-5">Step 3</p>
                        </div>
                    </li>
                    <li class="steps-segment">
                        <span class="steps-marker"></span>
                        <div class="steps-content">
                            <p class="is-size-5">Step 4</p>
                        </div>
                    </li>
                    <li class="steps-segment">
                        <span class="steps-marker"></span>
                        <div class="steps-content">
                            <p class="is-size-5">Step 5</p>
                        </div>
                    </li>
                </ul>


            </div>
        </div>

    </section>

@endsection