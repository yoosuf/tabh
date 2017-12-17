<form role="form" method="GET" action="{{ route('cart.show') }}">

    <div class="field">
        <label class="label is-pulled-left">{{Cart::count()}} Items</label>
        <label class="label is-pulled-right">Total : &#2547; {{ Cart::subtotal() }}</label>

        @if(Cart::count() > 0)
            <div class="control">
                <button type="submit" class="button is-success is-medium is-fullwidth">Proceed to checkout</button>
            </div>
		@else
			<div class="control">
            	<a href="#" class="button is-medium is-fullwidth">Your cart is empty</a>
			</div>
        @endif

    </div>
</form>        
