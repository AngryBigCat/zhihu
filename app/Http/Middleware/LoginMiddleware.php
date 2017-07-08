<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        // 检测session信息
        $id = Session('uid');
        if (empty($id)) {
            return redirect('/admin/login');
        } else {
            return $next($request);
        }
    }
}
