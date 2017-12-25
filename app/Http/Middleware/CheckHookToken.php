<?php

namespace webhook\Http\Middleware;

use Closure;

class CheckHookToken
{
    protected $token = 'githook135'; 
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->json('password', '');
        if ($this->token != $token) {
            return '非法请求';
        }
        return $next($request);
    }
}
