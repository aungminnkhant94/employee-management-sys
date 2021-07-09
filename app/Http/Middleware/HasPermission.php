<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\PermissionTrait;
use App\Http\Middleware\HasPermission;
use Illuminate\Http\Request;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    use PermissionTrait;
    public function handle(Request $request, Closure $next)
    {
        $this->hasPermission();
        return $next($request);
    }
}
