<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        if ($request->user() && $request->user()->role === 'member') {
            return redirect()->route('member.dashboard');
        }

        return response()->json(['message' => 'Access denied'], 403);
    }
}
