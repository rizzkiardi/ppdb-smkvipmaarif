<?php

namespace App\Http;

use App\Http\Middleware\User;
use App\Http\Middleware\Admin;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'auth' => Admin::class,
        'user' => User::class,
    ];
}
