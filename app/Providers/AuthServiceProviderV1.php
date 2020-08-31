<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Register
use App\Repositories\Repository\Register\RegisterInterface;
use App\Repositories\Repository\Register\RegisterRepository;

// Login
use App\Repositories\Repository\Login\LoginInterface;
use App\Repositories\Repository\Login\LoginRepository;

class AuthServiceProviderV1 extends ServiceProvider
{
     /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RegisterInterface::class, RegisterRepository::class);
        $this->app->bind(LoginInterface::class, LoginRepository::class);
    }
}
