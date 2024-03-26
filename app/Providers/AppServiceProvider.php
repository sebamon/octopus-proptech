<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Interfaces\IServiceService;
use App\Services\ServiceService;

use App\Services\Interfaces\IInvoiceService;
use App\Services\InvoiceService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IServiceService::class, ServiceService::class);
        $this->app->bind(IInvoiceService::class, InvoiceService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
