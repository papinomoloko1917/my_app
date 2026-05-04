<?php

declare(strict_types=1);

namespace App\Dispatcher;

use App\Routing\Route;
use Closure;

class Dispatcher {
    public function dispatch(Route $route): string {
        if ($route->handler() instanceof Closure) {
            return $route->handler()();
        } else {
            [$handler, $method] = $route->handler();
            $controller = new $handler();
            return $controller->$method();
        }
    }
}
