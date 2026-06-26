<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * Restricts access to users who have the "admin" role, using the
     * roles relationship defined on the User model (see database/seeders
     * for how the default admin account is created).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. إذا كان الزائر غير مسجل دخول أصلاً، يتم توجيهه لصفحة الـ Login مباشرة بدلاً من الـ Home لمنع الدوران
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // 2. إذا كان مسجل دخول، لكن لا يملك صلاحية "admin" في جدول الأدوار
        if (!Auth::user()->hasRole('admin')) {
            // يتم إعادته لصفحة المتجر مع رسالة حظر واضحة
            return redirect()->route('home')->with('error', 'Access Denied! You are not the administrator.');
        }

        // 3. إذا كان يملك صلاحية الأدمن، يسمح له بالمرور بأمان
        return $next($request);
    }
}