<h1>Create Service</h1>

<form method="POST" action="/create-service" enctype="multipart/form-data">

@csrf

<label>Title</label><br> <input type="text" name="title" required>

<br><br>

<label>Description</label><br>

<textarea name="description" required></textarea>

<br><br>

<label>Price</label><br> <input type="number" name="price" required>

<br><br>

<label>Service Image</label><br> <input type="file" name="image">

<br><br>

<label>Delivery Time (days)</label><br> <input type="number" name="delivery_time" value="1">

<br><br>

<button type="submit">Create Service</button>

</form>

<br>

<a href="/seller/dashboard">Back to Dashboard</a>
