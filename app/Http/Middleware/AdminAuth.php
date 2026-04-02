<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('admin_logged_in')) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => 'Unauthenticated.'], 401);
            }
            return redirect('/login');
        }

        return $next($request);
    }
}
