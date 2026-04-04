<?php

echo "Clearing cache...<br>";

system('php artisan cache:clear');
system('php artisan config:clear');
system('php artisan view:clear');
system('php artisan route:clear');

echo "Done!";