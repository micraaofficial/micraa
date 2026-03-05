```html
<h1>Create Taskbit</h1>

<form method="POST" action="/taskbits">
    @csrf

    <p>Title</p>
    <input type="text" name="title">

    <p>Description</p>
    <textarea name="description"></textarea>

    <p>Price</p>
    <input type="number" name="price">

    <p>Delivery Time (days)</p>
    <input type="number" name="delivery_time">

    <br><br>

    <button type="submit">Create Taskbit</button>
</form>
```
