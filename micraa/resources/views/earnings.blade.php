<!DOCTYPE html>
<html>
<head>
<title>Earnings - Micraa</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
font-family:'Inter',sans-serif;
background:#f6f7fb;
margin:0;
}

.container{
max-width:1100px;
margin:40px auto;
}

.title{
font-size:28px;
font-weight:600;
margin-bottom:25px;
}

/* CARDS */
.cards{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.card-title{
font-size:14px;
color:#777;
}

.card-value{
font-size:26px;
font-weight:600;
margin-top:8px;
color:#16a34a;
}

/* GRAPH */
.chart-box{
background:white;
padding:25px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

/* TABLE */
.table{
margin-top:30px;
background:white;
border-radius:12px;
padding:20px;
}

.table table{
width:100%;
border-collapse:collapse;
}

.table th, .table td{
padding:12px;
border-bottom:1px solid #eee;
text-align:left;
font-size:14px;
}

</style>

</head>

<body>

<div class="container">

<div class="title">Earnings Overview 💰</div>

<!-- CARDS -->
<div class="cards">

<div class="card">
<div class="card-title">Total Earnings</div>
<div class="card-value">$ {{ $total }}</div>
</div>

<div class="card">
<div class="card-title">This Month</div>
<div class="card-value">$ {{ $monthly ?? 0 }}</div>
</div>

<div class="card">
<div class="card-title">Orders</div>
<div class="card-value">{{ $orders ?? 0 }}</div>
</div>

</div>

<!-- GRAPH -->
<div class="chart-box">
<canvas id="earningsChart"></canvas>
</div>

<!-- TABLE -->
<div class="table">

<h3>Recent Earnings</h3>

<table>
<tr>
<th>Service</th>
<th>Price</th>
</tr>

@foreach($services as $service)
<tr>
<td>{{ $service->title }}</td>
<td>$ {{ $service->price }}</td>
</tr>
@endforeach

</table>

</div>

</div>

<script>

const ctx = document.getElementById('earningsChart');

new Chart(ctx, {
type: 'line',
data: {
labels: ['Jan','Feb','Mar','Apr','May','Jun'],
datasets: [{
label: 'Earnings',
data: [10,20,15,30,25,40], // temporary
borderWidth: 2,
tension: 0.3
}]
}
});

</script>

</body>
</html>
