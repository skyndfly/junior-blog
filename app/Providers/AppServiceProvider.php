<?php

namespace App\Providers;

use App\Contracts\Admin\CategoryServiceContract;
use App\Service\Admin\Category\Store\StoreService;
use App\View\Components\admin\alerts\DangerAlert;
use App\View\Components\admin\alerts\InfoAlert;
use App\View\Components\admin\alerts\SuccessAlert;
use App\View\Components\admin\alerts\WarningAlert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceContract::class, StoreService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component(SuccessAlert::class, 'admin-alerts-success-alert');
        Blade::component(DangerAlert::class, 'admin-alerts-danger-alert');
        Blade::component(InfoAlert::class, 'admin-alerts-info-alert');
        Blade::component(WarningAlert::class, 'admin-alerts-warning-alert');
    }
}
