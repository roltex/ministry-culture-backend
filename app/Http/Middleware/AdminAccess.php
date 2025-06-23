<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip admin check for login and auth pages
        if ($request->is('admin/login') || 
            $request->is('admin/forgot-password') || 
            $request->is('admin/reset-password') ||
            $request->is('admin/register') ||
            $request->is('admin/logout')) {
            return $next($request);
        }

        // For all other admin routes, just check if user is authenticated
        // Filament will handle the admin check internally
        if (!auth()->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        return $next($request);
    }
} 