<p>Hello {{ $user->name }},</p>
<p>Thank you for choosing  {{config('app.name', 'Laravel') }}</p>
<p>Please note that your order number is  {{ $order->id }} </p>
<p>Your order details are as follows: </p>
<p>Order Remarks:</p>

<table width="100%">
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
    @foreach($order->line_items as $item)
        <tr>
            <td>{{ $item->product->title }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->quantity * $item->product->price }}</td>
        </tr>
    @endforeach

        <tr>
            <td colspan="2">Discount</td>    
            <td>{{ $order->total_discount }}</td>
        </tr>
        <tr>
            <td colspan="2">Total</td>    
            <td>{{ $order->total_amount }}</td>
        </tr>
    </tbody>
</table>


<p>We hope you've enjoyed your {{ config('app.name', 'Laravel') }} experience </p>
<p>Regards</p>
<p>The   {{ config('app.name', 'Laravel')  }}.</p>
<p>This is a system-generated email. Please do not reply.</p>

