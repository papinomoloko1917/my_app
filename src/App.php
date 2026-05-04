<?php

declare(strict_types=1);

namespace App;

use App\Container\Container;
use Throwable;

class App {
    private readonly Container $container;
    public function __construct() {
        $this->container = new Container();
    }
    public function run() {
        try {
            $targetRoute = $this->container
                ->router
                ->resolve();
            $controller = $this->container
                ->dispatcher
                ->dispatch(
                    $targetRoute,
                    $this->container->view,
                );
            echo $controller;
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
