<?php

<<<<<<< HEAD
ini_set('display_errors', 1);
error_reporting(E_ALL);

=======
>>>>>>> 6e3a3981dcc15f808a02c844ca5b1f2bd81b51d3
require __DIR__.'/micraa/vendor/autoload.php';

$app = require_once __DIR__.'/micraa/bootstrap/app.php';

$app->bind('path.public', function() {
    return __DIR__;
});

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);
