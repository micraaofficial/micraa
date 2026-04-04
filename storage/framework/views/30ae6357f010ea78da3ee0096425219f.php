<?php $subcategories = \App\Models\Subcategory::with('microcategories')->get(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Micraa</title>
    
    <meta name="yandex-verification" content="eb213e6bbb18112d" />
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-THNYHHXWTC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-THNYHHXWTC');
</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        /* SERVICES */
        .services-container {
            max-width: 1650px;
            margin: auto;
            padding: 30px 20px;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 24px;
            align-items: start;
        }

        /* CARD */
        .gig-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e4e5e7;
            transition: 0.2s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .gig-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* IMAGE */
        .gig-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            background: #eee;
        }

        /* BODY */
        .gig-body {
            padding: 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
        }

        /* TITLE */
        .gig-title {
            font-size: 16px;
            color: #62646a;
            line-height: 1.4;
            height: 44px;
            overflow: hidden;
        }

        /* SELLER ROW */
        .seller-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .seller-dp {
            width: 29px;
            height: 29px;
            border-radius: 50%;
            border: 2px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
        }

        .seller-name {
            font-size: 15px;
            font-weight: 600;
        }

        /* RATING ROW */
        .gig-rating {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 4px;
        }

        .stars {
            font-size: 19px;
            color: #000;
        }

        .review-count {
            color: #62646a;
            margin-left: 4px;
        }

        /* PRICE */
        .gig-price {
            display: flex;
            align-items: flex-end;
            gap: 1px;
        }

        .usd {
            font-size: 15px;
            color: #222325;
            font-weight: 600;
            margin-right: 2px;
        }

        .amount {
            font-size: 22px;
            font-weight: 700;
            color: #222325;
            line-height: 1;
            letter-spacing: -0.5px;
        }

        .decimal {
            font-size: 15px;
            color: #222325;
            font-weight: 600;
            margin-left: -1px;
        }

        /* DELIVERED */
        .delivered {
            font-size: 13px;
            color: #62646a;
            margin-top: 2px;
        }

        /* HEADER */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 40px;
            background: #0b4d23;
            color: white;
        }

        .logo img {
            height: 42px;
        }

        /* SEARCH BAR */
        .search-bar {
            display: flex;
            align-items: center;
            width: 750px;
            height: 44px;
            background: white;
            border-radius: 32px;
            border: 2px solid white;
            position: relative;
        }

        .search-dropdown {
            background: #dcdcdc;
            padding: 0 16px;
            display: flex;
            align-items: center;
            font-size: 15px;
            font-weight: 600;
            color: #000;
            cursor: pointer;
            border-right: 1px solid #cfcfcf;
            border-radius: 30px 0 0 30px;
            min-width: 140px;
            justify-content: center;
            height: 100%;
            position: relative;
        }

        .micro-btn {
            display: flex;
            align-items: center;
            height: 100%;
        }

        /* MEGA MENU */
        .micro-dropdown {
            position: absolute;
            top: calc(100% + 1px);
            left: 390px;
            right: 50px;
            transform: translateX(-50%);
            width: 1400px;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 20px 30px;
            border-radius: 8px;
            z-index: 999;
            display: none;
            grid-template-columns: repeat(5, 1fr);
            gap: 30px;
        }

        .search-dropdown:hover .micro-dropdown {
            display: grid;
        }

        .micro-title {
            font-weight: 700;
            font-size: 17px;
            margin-bottom: 8px;
            margin-top: 5px;
            color: #111;
        }

        .micro-dropdown a {
            display: block;
            text-decoration: none;
            color: #555;
            font-size: 15px;
            padding: 5px 10px;
            border-radius: 6px;
            line-height: 1.6;
        }

        .micro-dropdown a:hover {
            background: #f2f2f2;
            color: #1DBF73;
        }

        .search-bar input {
            flex: 1;
            border: none;
            outline: none;
            padding: 0 16px;
            font-size: 17px;
        }

        .search-bar button {
            width: 60px;
            border: none;
            background: #1DBF73;
            cursor: pointer;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0 30px 30px 0;
        }

        .search-icon {
            width: 30px;
            height: 30px;
        }

        /* HEADER RIGHT */
        .header-right {
            display: flex;
            align-items: center;
            gap: 18px;
            font-weight: 600;
        }

        .header-right a {
            color: white;
            text-decoration: none;
        }

        .become-seller {
            background: #1DBF73;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
        }

        /* HERO */
        .banner {
            height: 260px;
            background: url('<?php echo e(asset('images/banner.svg')); ?>');
            background-size: cover;
            background-position: center;
        }

        .gig-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 6px;
        }

        .left-rating {
            display: flex;
            align-items: center;
            gap: 0px;
            font-size: 15px;
        }

        .right-price {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .delivered {
            font-size: 13px;
            color: #62646a;
            margin-top: 2px;
        }
    </style>
    </style>
</head>

<body>
    <div class="header">
        <div class="logo"> <a href="/"><img src="<?php echo e(asset('images/logo.svg')); ?>"></a> </div>
        <form class="search-bar" method="GET" action="<?php echo e(route('services.search')); ?>">
    <div class="search-dropdown">
        <div class="micro-btn">Micro Services ▾</div>
        <div class="micro-dropdown">
            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <div class="micro-title"><?php echo e($subcategory->name); ?></div>
                    <?php $__currentLoopData = $subcategory->microcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('/services/' . $service->slug)); ?>">
                            <?php echo e($service->name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <input type="text" name="query"
        placeholder="Search Micro Services..."
        value="<?php echo e(request('query')); ?>">

    <button type="submit">
        <img src="<?php echo e(asset('icons/search.png')); ?>" class="search-icon">
    </button>
</form>
        <div class="header-right"> <?php if(auth()->guard()->check()): ?> <a href="<?php echo e(route('dashboard')); ?>"
                    style="display:flex;align-items:center;gap:8px;color:white;text-decoration:none;"> <img
                        src="<?php echo e(asset('images/default-avatar.png')); ?>"
                        style="width:34px;height:34px;border-radius:50%;object-fit:cover;"> <span>Dashboard</span> </a>
                <?php endif; ?> <?php if(auth()->guard()->guest()): ?> <a class="become-seller" href="/seller/register">Become Seller</a> <a href="/login">Sign
                In</a> <?php endif; ?> </div>
    </div>
    <div class="banner"></div> <?php
if (!isset($services)) {
    $services = \App\Models\Service::latest()->take(12)->get();
}
?> <div class="services-container">
        <div class="services-container">
            <div class="service-grid">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<a href="<?php echo e(route('taskbit.show', $service->id)); ?>"
   style="text-decoration: none; color: inherit; display:block;">

    <div class="gig-card">

        <img src="<?php echo e(asset('storage/' . $service->image1)); ?>" class="gig-image">

        <div class="gig-body">

            <div class="gig-title">
                <?php echo e($service->title); ?>

            </div>

            <div class="seller-left">
                <img src="<?php echo e($service->user && $service->user->profile_photo
                    ? asset('storage/' . $service->user->profile_photo)
                    : asset('images/default-avatar.png')); ?>"
                     class="seller-dp">

                <span class="seller-name">
                    <?php echo e($service->user->name ?? 'Seller'); ?>

                </span>
            </div>

            <div class="gig-bottom">

                <div class="left-rating">
                    <span class="stars">★★★★★</span>
                    <span class="review-count">(20)</span>
                </div>

                <div class="right-price">
                    <div class="gig-price">
                        <span class="usd">USD</span>
                        <span class="amount">$<?php echo e(intval($service->price)); ?></span>
                        <span class="decimal">.00</span>
                    </div>

                    <div class="delivered">
                        102 Delivered
                    </div>
                </div>

            </div>

        </div>

    </div>

</a>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH /home/u178846379/domains/micraa.com/public_html/resources/views/home.blade.php ENDPATH**/ ?>