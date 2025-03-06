<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__)) // Fix: Use __DIR__ instead of DIR
    ->withRouting(
        web: __DIR__.'/../routes/web.php',  // Fix: Use __DIR__
        commands: __DIR__.'/../routes/console.php',  // Fix: Use __DIR__
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'role' => RoleMiddleware::class, // Register 'role' middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    });
require_once __DIR__.'/../vendor/autoload.php';

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

return $app;

