<?php

namespace App;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

class Laravel
{
    public static function start(): void
    {
        define('LARAVEL_START', microtime(true));

        require base_path().'/vendor/autoload.php';

        if (file_exists($maintenance = base_path().'/runtime/framework/maintenance.php')) {
            require $maintenance;
        }

        $app = require_once base_path().'/bootstrap/app.php';

        $kernel = $app->make(Kernel::class);
        $kernel->bootstrap();
//        $response = $kernel->handle(
//            $request = Request::capture()
//        )->send();
//
//        $kernel->terminate($request, $response);
    }
}