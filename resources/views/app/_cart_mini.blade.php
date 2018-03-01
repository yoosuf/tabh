<form role="form" id="cart_mini" method="POST" action="{{ route('checkouts') }}">

    {{ csrf_field() }}

    <div class="field">
        <label class="label is-pulled-left">{{ count($cart) }} Items</label>
        <label class="label is-pulled-right">Total : &#2547; {{ Cart::subtotal() }}</label>

        @if(count($cart) > 0)
            <div class="control">
                <button type="submit" class="button is-success is-medium is-fullwidth">Proceed to checkout</button>
            </div>
		@else
			<div class="control">
               <a href="#" class="button is-medium is-fullwidth btn-cart-empty">Your cart is empty</a>
			</div>
        @endif

    </div>
</form>        
