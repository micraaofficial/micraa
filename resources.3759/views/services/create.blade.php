<!DOCTYPE html>

<html>
<head>

<title>Create Taskbit</title>

<style>

body{
font-family:Arial;
background:#f3f4f6;
margin:0;
}

.container{
max-width:900px;
margin:50px auto;
background:white;
padding:40px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

h2{
margin-bottom:25px;
}

label{
display:block;
margin-bottom:6px;
font-weight:600;
color:#444;
}

input,textarea,select{
width:100%;
padding:12px;
border:1px solid #ddd;
border-radius:6px;
margin-bottom:18px;
font-size:15px;
}

textarea{
height:120px;
resize:vertical;
}

button{
background:#16a34a;
color:white;
border:none;
padding:12px 20px;
border-radius:6px;
font-size:16px;
font-weight:600;
cursor:pointer;
}

button:hover{
background:#15803d;
}

</style>

</head>

<body>

<div class="container">

<h2>Create Taskbit</h2>

<form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">

@csrf

<label>Title</label> <input type="text" name="title" required>

<label>Description</label>

<textarea name="description" required></textarea>

<label>Service Image</label>

<input type="file" name="image">

<label>Service Image</label> <input type="file" name="image">

<label>Price ($)</label> <input type="number" name="price" value="1" required>

<label>Delivery Time (days)</label> <input type="number" name="delivery_time" value="1" required>

<label>Category</label> <select name="category">

<option>AI Services</option>
<option>Graphics & Design</option>
<option>Video & Animation</option>
<option>Programming & Tech</option>
<option>Writing & Translation</option>
<option>Music & Audio</option>
</select>

<button type="submit">Create Taskbit</button>

</form>

</div>

</body>
</html>
