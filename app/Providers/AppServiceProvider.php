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
            /* social links & tel nums */
            $content = Page::where('name', 'Home')
                ->first()
                ->content;
            $content = json_decode($content);
            $socials = $content->socials;
            $tel_nums = $content->tel;
            $skype_id = $content->skype;

            $view->with([
                'categories' => $categories,
                'pages' => $pages,
                'socials' => $socials,
                'tel_nums' => $tel_nums,
                'skype_id' => $skype_id
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
