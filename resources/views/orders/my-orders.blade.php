html
<h1>My Orders</h1>

<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>Service</th>
<th>Price</th>
<th>Status</th>
<th>Date</th>
</tr>

@foreach($orders as $order)

<tr>
<td>{{ $order->id }}</td>
<td>{{ $order->service->title }}</td>
<td>${{ $order->price }}</td>
<td>{{ $order->status }}</td>
<td>{{ $order->created_at }}</td>
</tr>

@endforeach

</table>

<br>

<a href="/services">Back to Services</a>
