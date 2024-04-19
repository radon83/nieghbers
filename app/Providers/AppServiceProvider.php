<?php

namespace App\Providers;

use App\Models\AdminSoftwareSettings;
use App\Models\SoftwareSettings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Item;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        view()->composer(
            'layouts.base',
            function ($view) {
                $view->with([
                    'fewcategories' => category::limit(5)->get(),
                    'fewitems' => item::limit(5)->get(),
                ]); 
            }
        );
    }
}
