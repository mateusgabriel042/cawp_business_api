<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Util\TenantConnector;
use Closure;
use Illuminate\Http\Request;

class TenantHandler
{

    public function handle(Request $request, Closure $next)
    {
        TenantConnector::connect();

        return $next($request);
    }
}
