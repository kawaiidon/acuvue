<?php

namespace APPLICATION_HOME\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

    protected $namespace = '\APPLICATION_HOME\Http\Controllers';

    public function boot(Router $router) {

        parent::boot($router);
    }

    public function map(Router $router) {

        $router->group(['namespace' => $this->namespace], function ($router) {
            require __DIR__ . '/../Http/routes.php';
        });
    }
}
