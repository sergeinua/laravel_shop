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


}
