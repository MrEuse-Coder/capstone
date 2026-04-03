<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\isAdminisSuperAdmin;
use App\Http\Middleware\isSuperAdmin;
use App\Http\Middleware\RestoreSuperAdminSession;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'restore.superadmin' => RestoreSuperAdminSession::class,
            'admin' => IsAdmin::class,
            'super_admin' => IsSuperAdmin::class,
            'isAdminIsSuperAdmin' => isAdminisSuperAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
