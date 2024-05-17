<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           
           if (env('MAIN_TAIN', false)) {
            
            return response()->json(['message' => 'Hệ thống đang bảo trì. Vui lòng quay lại sau.'], 503);
        }

        return $next($request);
    }
    
}
