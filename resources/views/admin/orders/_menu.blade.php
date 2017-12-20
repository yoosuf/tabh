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
        @elseif($order->is_approved_by_admin == true && $order->status == 'Approved')
        <div class="control">
            <a class="button" href="{{ route('admin.orders.change_status', ['id' => $order->id, 'status' => 'Packed']) }}">
                Packed
            </a>
        </div>
    @elseif($order->is_approved_by_admin == true && $order->status == 'Packed')
        <div class="control">
            <a class="button" href="{{ route('admin.orders.change_status', ['id' => $order->id, 'status' => 'Shipped']) }}">
                Shipped
            </a>
        </div>
    @elseif($order->is_approved_by_admin == true && $order->status == 'Shipped')
        <div class="control">
            <a class="button" href="{{ route('admin.orders.change_status', ['id' => $order->id, 'status' => 'Completed']) }}">
                Completed
            </a>
        </div>
    @endif
</div>