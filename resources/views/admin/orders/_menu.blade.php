<div class="field is-grouped">
    @if($order->is_approved_by_admin != true && $order->status == 'initiated')
        <div class="control">
            <a class="button" href="{{ route('admin.orders.approve', [$order->id]) }}">
                Approve
            </a>
        </div>

        <div class="control">
            <a class="button is-danger deletable" href="{{ route('admin.orders.reject', [$order->id]) }}" data-confirm="Are you sure to reject this order?">
                Reject
            </a>
        </div>
    @endif
</div>