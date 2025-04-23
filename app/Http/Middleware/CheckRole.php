<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
//        dd($role, Auth::user()->role->title);
        if (!Auth::check() || $request->user()->role->title !== $role) {
            abort(403, 'Доступ запрещен');
        }

        return $next($request);
    }
}
