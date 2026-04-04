<!DOCTYPE html>
<html>
<head>
    <title>Order</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            display: flex;
            gap: 30px;
        }

        .left { width: 65%; }
        .right { width: 35%; }

        .card, .price-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .price {
            font-size: 26px;
            font-weight: bold;
            color: #1dbf73;
        }

        img {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="card">
            <h2><?php echo e($taskbit->title); ?></h2>
            <p>Seller: <?php echo e($taskbit->user->name ?? 'Seller'); ?></p>

            <img src="/storage/<?php echo e($taskbit->image1); ?>">

            <p style="margin-top:15px;">
                <?php echo e($taskbit->description); ?>

            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="price-box">

            <div class="price">
                $<?php echo e($taskbit->price); ?>

            </div>

            <p>Delivery: <?php echo e($taskbit->delivery_time ?? 1); ?> Days</p>

            <!-- PAYPAL BUTTON -->
            <div id="paypal-button-container" style="margin-top:15px;"></div>

        </div>
    </div>

</div>

<!-- ✅ CORRECT CLIENT ID (NO EXTRA CHARACTER) -->
<script src="https://www.paypal.com/sdk/js?client-id=AWuZyCerTLnrGmuBeO8gkVpVqpgQIn4gs8CVQNOFUwMCP9FQygOPhfPf9MPE-RtGkmL3-4GcPoA2G0A4&currency=USD"></script>

<script>
paypal.Buttons({

    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?php echo e($taskbit->price); ?>'
                }
            }]
        });
    },

    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {

            // ✅ SAVE ORDER
            fetch('/save-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    taskbit_id: <?php echo e($taskbit->id); ?>,
                    amount: '<?php echo e($taskbit->price); ?>'
                })
            })
            .then(res => res.json())
            .then(data => {
                window.location.href = "/dashboard";
            });

        });
    }

}).render('#paypal-button-container');
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\micraa\micraa\resources\views/order.blade.php ENDPATH**/ ?>