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
            /* pages for the top-menu */
            $pages = Page::where('status', '1')
                ->orderBy('order')
                ->get();
            /* social links */
            $content = Page::where('name', 'Home')
                ->first()
                ->content;
            $content = json_decode($content);

            $view->with([
                'categories' => $categories,
                'pages' => $pages,
                'content' => $content
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
