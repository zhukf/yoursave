<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'shop_auth' => \App\Http\Middleware\ShopAuth::class,
        'shop_user_operate_auth' => \App\Http\Middleware\ShopUserOperateAuth::class,
        'shop_admin_auth' => \App\Http\Middleware\ShopAdminAuth::class,
        'produce_company_auth' => \App\Http\Middleware\ProduceCompanyAuth::class,
        'produce_company_user_operate_auth' => \App\Http\Middleware\ProduceCompanyUserOperateAuth::class,
        'produce_company_admin_auth' => \App\Http\Middleware\ProduceCompanyAdminAuth::class
    ];
}
