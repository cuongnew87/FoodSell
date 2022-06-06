<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('id_user') && $request->session()->get('role_id') == 0) { 
            return $next($request);
        }
        else{
            // return redirect('dang-nhap-dang-ki');
            return $request->session()->get('id_user');
        }
    }
}
