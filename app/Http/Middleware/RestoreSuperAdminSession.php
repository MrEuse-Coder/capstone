<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestoreSuperAdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('impersonator_id') && auth()->check() && !auth()->user()->isSuperAdmin()) {
            // Restore original super admin
            auth()->loginUsingId(session('impersonator_id'));
            session()->forget('impersonator_id');
        }

        $response = $next($request);

        // Prevent browser caching
        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
