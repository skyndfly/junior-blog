<?php

namespace App\Providers;

use App\Contracts\Admin\Article\ArticleStoreContract;
use App\Contracts\Admin\Article\UpdateServiceContract;
use App\Contracts\Admin\CategoryServiceContract;
use App\Contracts\Admin\CategoryShowServiceContract;
use App\Contracts\Comments\CommentsStoreGuestServiceContract;
use App\Service\Admin\Article\Store\StoreService as ArticleStoreService;
use App\Service\Admin\Article\Update\UpdateService as ArticleUpdateService;
use App\Service\Admin\Category\ShowForSelect\ShowService as CategoryShowService;
use App\Service\Admin\Category\Store\StoreService as CategoryStoreService;
use App\View\Components\admin\alerts\DangerAlert;
use App\View\Components\admin\alerts\InfoAlert;
use App\View\Components\admin\alerts\SuccessAlert;
use App\View\Components\admin\alerts\WarningAlert;
use App\View\Components\admin\form\CategorySelect;
use App\View\Components\admin\messages\AccessDenied;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Index\ShowContract as IndexShowContract;
use App\Service\Article\MainNews\Handler as MainNewsService;
use App\Service\Comment\StoreGuest\Handler as CommentStoreGuestService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceContract::class, CategoryStoreService::class);
        $this->app->bind(CategoryShowServiceContract::class, CategoryShowService::class);
        $this->app->bind(ArticleStoreContract::class, ArticleStoreService::class);
        $this->app->bind(IndexShowContract::class, MainNewsService::class);
        $this->app->bind(UpdateServiceContract::class, ArticleUpdateService::class);
        $this->app->bind(CommentsStoreGuestServiceContract::class, CommentStoreGuestService::class);

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
        Blade::component(AccessDenied::class, 'admin-access-denied');
        Blade::component(CategorySelect::class, 'admin-form-category-select');
    }
}
