<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
->withRouting(
    commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
    health: '/up',
    using: function () {
        Route::middleware('web')
            ->group(__DIR__.'/../routes/web.php');
    },
)
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest'    => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $exception, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }


            return redirect()->guest(route('login'));
        });
    })->create();
