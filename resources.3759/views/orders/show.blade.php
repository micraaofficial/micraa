<h1>Order Details</h1>

<h2>{{ $order->service->title }}</h2>

<p><strong>Order ID:</strong> {{ $order->id }}</p>

<p><strong>Price:</strong> ${{ $order->price }}</p>

<p><strong>Status:</strong> {{ $order->status }}</p>

<p><strong>Date:</strong> {{ $order->created_at }}</p>

<br>

<a href="/my-orders">Back to My Orders</a>

