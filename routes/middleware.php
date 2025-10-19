<?php

use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckRole;

return Middleware::configure()
    ->with([
        // Глобальные middleware
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Http\Middleware\ValidatePostSize::class,
        // и т.д.
    ])
    ->withRoute([
        // Роутовые middleware
        'role' => CheckRole::class,
        'auth' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    ]);
