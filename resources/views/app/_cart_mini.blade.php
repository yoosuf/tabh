<form role="form" method="GET" action="{{ route('cart.show') }}">

    <div class="field">
        <label class="label is-pulled-left">{{Cart::count()}} Items</label>
        <label class="label is-pulled-right">Total : &#2547; {{ Cart::total() }}</label>

        <div class="control">
            <button type="submit" class="button is-success is-fullwidth">Proceed to Checkout</button>
        </div>

    </div>
</form>