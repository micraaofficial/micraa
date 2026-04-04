<!DOCTYPE html>
<html>
<head>
    <title>{{ $service->title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
        }

        .service-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        .title {
            font-size: 26px;
            font-weight: 700;
            margin: 15px 0;
        }

        .price-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            position: sticky;
            top: 20px;
        }

        .price {
            font-size: 28px;
            font-weight: 700;
            color: #1DBF73;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #1DBF73;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
        }

        .reviews {
            margin-top: 30px;
        }

        .review {
            border-top: 1px solid #eee;
            padding: 15px 0;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        select {
            padding: 6px;
            margin-top: 10px;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="grid">

        <!-- LEFT -->
        <div>

            <div class="card">

                @if($service->image1)
    <img src="{{ asset('storage/'.$service->image1) }}" class="service-image">
@endif

@if($service->image2)
    <img src="{{ asset('storage/'.$service->image2) }}" class="service-image">
@endif

@if($service->image3)
    <img src="{{ asset('storage/'.$service->image3) }}" class="service-image">
@endif

@if(!$service->image1 && !$service->image2 && !$service->image3)
    <img src="{{ asset('images/default.png') }}" class="service-image">
@endif

                <div class="title">
                    {{ $service->title }}
                </div>

                <p>{{ $service->description }}</p>

            </div>

            <!-- REVIEWS -->
            <div class="card reviews">

                <h3>Reviews ({{ $service->reviews->count() }})</h3>

                @foreach($service->reviews as $review)
                    <div class="review">
                        <strong>{{ $review->user->name }}</strong><br>
                        ⭐ {{ $review->rating }}<br>
                        {{ $review->comment }}
                    </div>
                @endforeach

                @auth
                <div style="margin-top:20px;">
                    <h4>Leave a Review</h4>

                    <form method="POST" action="/review">
                        @csrf

                        <input type="hidden" name="service_id" value="{{ $service->id }}">

                        <select name="rating">
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>

                        <textarea name="comment" placeholder="Write your review..."></textarea>

                        <button class="btn">Submit Review</button>
                    </form>
                </div>
                @endauth

            </div>

        </div>

        <!-- RIGHT -->
        <div>

            <div class="price-box">
                <div class="price">
                    ${{ $service->price }}
                </div>

                <button class="btn">Continue</button>
            </div>

        </div>

    </div>

</div>

</body>
</html>
