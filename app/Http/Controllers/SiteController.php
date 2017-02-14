<?php

namespace App\Http\Controllers;

use App\Category;
use App\Option;
use App\Order;
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

    /**
     * Displays shopping cart page
     *
     * @param Request $request
     * @return $this
     */
    public function shoppingCart(Request $request)
    {
        $cart = $request->session()->get('cart');

        return view('site.shopping-cart')
            ->with(['cart' => $cart]);
    }

    /**
     * Creates order and renders order page with notification
     *
     * @param Request $request
     * @return $this
     */
    public function createOrder(Request $request)
    {
        $saved = false;
        $cart = $request->session()->get('cart');
        //available items
        if ($items_cur = $cart->items) {
            foreach ($items_cur as $key => $item) {
                unset($items_cur[$key]['price']);
                unset($items_cur[$key]['item']);
            }
            $order_current = new Order();
            $order_current->status = 'pending';
            $order_current->cus_name = $request->input('name');
            $order_current->cus_tel = $request->input('tel_num');
            $order_current->cus_email = $request->input('email');
            $order_current->items = json_encode($items_cur);
            $order_current->read = 0;
            $order_current->amount = $cart->total_price;
            $saved = $order_current->save();
        }
        //pre ordered items
        if ($items_pre = $cart->items_out) {
            foreach ($items_pre as $key => $item) {
                unset($items_pre[$key]['price']);
                unset($items_pre[$key]['item']);
            }
            $order_pre = new Order();
            $order_pre->status = 'preorder';
            $order_pre->cus_name = $request->input('name');
            $order_pre->cus_tel = $request->input('tel_num');
            $order_pre->cus_email = $request->input('email');
            $order_pre->items = json_encode($items_pre);
            $order_pre->read = 0;
            $order_pre->amount = $cart->total_price_out;
            $saved = $order_pre->save();
        }
        //clearing cart
        if ($saved)
            $request->session()->clear();

        return view('site.order')
            ->with('status', $saved);
    }
}
