<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Displays home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home');
    }

    /**
     * Displays category page
     *
     * @param $slug
     * @return $this
     */
    public function category($slug)
    {
        $model = Category::where('status', '1')
            ->where('slug', $slug)
            ->first();

        return view('site.category')
            ->with(['model' => $model]);
    }

    public function page($slug)
    {
        return view('');
    }
}
