<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Routing\Route;

return [
    Route::get('/', fn() => 'Hello'),
    Route::get('/about', fn() => 'About page'),
    Route::get('/home', [HomeController::class, 'index']),
];
