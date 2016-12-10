<?php

namespace App\Providers;

use App\Category;
use App\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.front', function($view)
        {
            /* we're gonna display all the active categories */
            $categories = Category::where('status', '1')
                ->get();
            $pages = Page::where('status', '1')
                ->orderBy('order')
                ->get();

            $view->with([
                'categories' => $categories,
                'pages' => $pages
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
