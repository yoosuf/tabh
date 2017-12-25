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

<div style="visibility: hidden;"
<div itemscope itemtype="http://schema.org/Invoice">
  <span itemprop="accountId">123-456-789</span>
  <div itemprop="minimumPaymentDue" itemscope itemtype="http://schema.org/PriceSpecification">
    <span itemprop="price">{{ $order->total_amount }}</span>
  </div>
  <span itemprop="paymentDue">2015-11-22T08:00:00+00:00</span>
  <span itemprop="paymentStatus">PaymentAutomaticallyApplied</span>
  <div itemprop="provider" itemscope itemtype="http://schema.org/Organization">
    <span itemprop="name">Mountain View Utilities</span>
  </div>
  <div itemprop="totalPaymentDue" itemscope itemtype="http://schema.org/PriceSpecification">
    <span itemprop="price">{{ $order->total_amount }}</span>
  </div>
</div>
</div>