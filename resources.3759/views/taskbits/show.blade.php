<!DOCTYPE html>
<html>
<head>
    <title>{{ $taskbit->title }}</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            display: flex;
            gap: 30px;
        }

        .left {
            width: 65%;
        }

        .right {
            width: 35%;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        .price-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            position: sticky;
            top: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        .seller {
            color: gray;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .desc {
            margin-top: 20px;
            line-height: 1.6;
        }

        .price {
            font-size: 28px;
            font-weight: bold;
            color: #1dbf73;
            margin-bottom: 10px;
        }

        .meta {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .btn {
            background: black;
            color: white;
            padding: 14px;
            text-align: center;
            display: block;
            border-radius: 6px;
            margin-top: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn:hover {
            background: #222;
        }

        .btn-outline {
            border: 1px solid #ccc;
            padding: 14px;
            text-align: center;
            display: block;
            border-radius: 6px;
            margin-top: 10px;
            text-decoration: none;
            color: black;
            background: #fff;
        }

        .btn-outline:hover {
            background: #f1f1f1;
        }

        img {
            width: 100%;
            border-radius: 10px;
            margin-top: 15px;
        }

        .gig-main-image {
    width: 100%;
    object-fit: cover;
    height: 350px;
    border-radius: 10px;
    background: #f5f5f5;
}

    </style>
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="card">
            <h2>{{ $taskbit->title }}</h2>

            <p class="seller">
                Seller: {{ $taskbit->user->name ?? 'User' }}
            </p>

            <img src="/storage/{{ $taskbit->image1 }}" class="gig-main-image">

            <p class="desc">
                {{ $taskbit->description }}
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="price-box">

            <div class="price">
                ${{ $taskbit->price }}
            </div>

            <div class="meta">
                ⏱ Delivery: {{ $taskbit->delivery_time ?? 3 }} Days
            </div>

            <!-- ORDER BUTTON -->
            <a href="{{ route('order.create', $taskbit->id) }}" class="btn">
                Order Now →
            </a>

            <!-- CHAT BUTTON -->
            <a href="{{ route('chat.start', $taskbit->user_id) }}" class="btn-outline">
                Chat Me
            </a>

        </div>
    </div>

</div>

</body>
</html>
