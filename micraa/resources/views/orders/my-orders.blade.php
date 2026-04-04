<h1>Seller Orders</h1>

<table border="1" cellpadding="10" style="border-collapse:collapse;width:100%;max-width:900px;">

<tr style="background:#f5f5f5;">
<th>ID</th>
<th>Buyer</th>
<th>Service</th>
<th>Price</th>
<th>Status</th>
<th>Date</th>
<th>View</th>
</tr>

@foreach($orders as $order)

<tr>

<td>{{ $order->id }}</td>

<td>
{{ $order->buyer->name ?? 'Buyer' }}
</td>

<td>
<a href="/service/{{ $order->service->slug }}">
{{ $order->service->title }}
</a>
</td>

<td>
$ {{ $order->price }}
</td>

<td>
{{ ucfirst($order->status) }}
</td>

<td>
{{ $order->created_at->format('d M Y') }}
</td>

<td>
<a href="/orders/{{ $order->id }}" style="color:white;background:#28a745;padding:5px 10px;text-decoration:none;border-radius:4px;">
View
</a>
</td>

</tr>

@endforeach

</table>

<br><br>

<a href="/seller/dashboard">Back to Dashboard</a>
