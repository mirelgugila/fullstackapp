<?php

namespace App\Providers;

use App\Services\PersonService;
use App\Services\PersonServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
    }
}
