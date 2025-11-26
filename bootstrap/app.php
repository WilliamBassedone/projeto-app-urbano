<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'api/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'error' => 'Method Not Allowed (Debug)',
                'message' => $e->getMessage(),
                'requested_method' => $request->method(),
                'requested_url' => $request->fullUrl(),
                'allowed_methods' => $e->getHeaders()['Allow'] ?? 'unknown',
                'route_matched' => $request->route() ? $request->route()->getName() : 'no_route',
            ], 405);
        });
    })->create();
