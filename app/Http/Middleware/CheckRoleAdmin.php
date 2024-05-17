<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('account_admins')->check()) {
            return redirect('/loginadmin');
        }

        // Kiểm tra xem người dùng có role là admin không
        if (Auth::guard('account_admins')->user()->role === 1) {

            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng người dùng về trang chính
        return abort(404);
    }
    
}
