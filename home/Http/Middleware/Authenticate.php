<?php

namespace APPLICATION_HOME\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {

    public $alias = 'user.authenticate';

    public function handle($request, Closure $next, $guard = null) {

        return $next($request);
    }
}