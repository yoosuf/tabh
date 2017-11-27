@extends('layouts.app')

@section('content')


    <section class="hero is-info is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-mobile is-centered">
                    <div class="column is-half is-narrow">

                        <h1 class="title has-text-centered">{{ trans('quicksilver.home.heading')}}</h1>
                        <h2 class="subtitle has-text-centered">{{ trans('quicksilver.home.sub_title')}}</h2>
                        <form action="{{ route('search') }}">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-large" type="text"
                                           placeholder="{{ trans('quicksilver.home.search_placeholder')}}">
                                </div>
                                <div class="control">
                                    <button class="button is-link is-large" type="submit">
                                        {{ trans('quicksilver.home.button')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="box cta">
        <p class="has-text-centered">When you purchase medicines on Practo, you can be assured that you will get the medicines you order.</p>
    </div>




    <div class="container">

        <div class="columns">
            <div class="column">
                <h1 class="title has-text-centered">Get every medicine</h1>
                <p>When you purchase medicines on Practo, you can be assured that you will get the medicines you order.
                    Practo has the widest range of medicines online, sourced from our trusted network of pharmacies and
                    medical stores.</p>
            </div>
            <div class="column">
                <h1 class="title has-text-centered">
                    Get every medicine on time
                </h1>
                <p>Practo realizes how important your medicines are. So, when you buy medicines online on Practo, our
                    trained pharmacists, partner pharmacies and medical stores, ensure that your medicines are delivered
                    to you on time, anywhere in India*.</p>
            </div>
            <div class="column">
                <h1 class="title has-text-centered">
                    Get every medicine, everytime
                </h1>
                <p>Unlike a regular medical store, Practo is powered by intelligent systems that remembers all the
                    medicines you ordered online and makes sure they're always available whenever you need them. So,
                    you'll always find your medicines on Practo's online pharmacy, anywhere in India*.</p>
            </div>

        </div>
    </div>
@endsection
