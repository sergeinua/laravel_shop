<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Page;

class SiteController extends Controller
{
    /**
     * Displays home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Page::where('slug', 'home')->first();
        $content = json_decode($model->content);

        return view('site.home')
            ->with([
                'content' => $content->content,
                'title' => $content->title
            ]);
    }

    /**
     * Displays category page
     *
     * @param $slug
     * @return $this
     */
    public function category($slug)
    {
        $category = Category::where('status', '1')
            ->where('slug', $slug)
            ->first();
        $pc = ProductCategory::where('category_id', $category->id)
            ->get();
        $products = [];
        foreach ($pc as $item) {
            array_push($products, Product::find($item->product_id));
        }

        return view('site.category')
            ->with([
                'category' => $category,
                'products' => $products
            ]);
    }

    public function page($slug)
    {
        return view('');
    }

    /**
     * Displays product page
     *
     * @param $category
     * @param $slug
     * @return $this
     */
    public function product($category, $slug)
    {
        $model = Product::where('slug', $slug)
            ->first();

        return view('site.product')
            ->with(['model' => $model]);
    }
}
