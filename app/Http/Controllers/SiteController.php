<?php

namespace App\Http\Controllers;

use App\Category;
use App\Option;
use App\Product;
use App\ProductCategory;
use App\ProductOption;
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
        $product_option_ids = ProductOption::where('product_id', $model->id)
            ->get();
        $option_ids = [];
        foreach ($product_option_ids as $item) {
            $option_ids[] = $item->option_id;
        }
        $product_options = [];
        foreach ($product_option_ids as $item) {
            $product_options[] = Option::find($item->option_id);
        }

        return view('site.product')
            ->with([
                'model' => $model,
                'product_options' => $product_options
            ]);
    }

    public function shoppingCart(Request $request)
    {
        $cart = $request->session()->get('cart');

        return view('site.shopping-cart')
            ->with(['cart' => $cart]);
    }
}
