<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Option;
use App\Product;
use App\ProductCategory;
use App\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Displays list of the products
     *
     * @return $this
     */
    public function index()
    {
        $model = Product::all();

        return view('product.index')
            ->with(['model' => $model]);
    }

    /**
     * Creates new product
     *
     * @param Request $request
     * @return $this|Redirect
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'slug' => 'required|unique'
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'Ошибка валидации');
                return back();
            } else {
                if (! empty($request->file('img'))) {
                    $image = $request->file('img')->store('products');
                    $request->file('img')->move(public_path('img/catalog/products'), $image);
                }
                $model = new Product();
                $model->name = $request->input('name');
                $model->slug = $request->input('slug');
                $model->description = $request->input('description');
                $model->price = $request->input('price');
                if (isset($image)) {
                    $model->img = $image;
                }
                $model->save();
                /* product to category */
                if (! empty($request->input('category_id'))) {
                    $pc = new ProductCategory();
                    $pc->product_id = $model->id;
                    $pc->category_id = $request->input('category_id');
                    $pc->save();
                }
                Session::flash('success', 'Товар сохранен');

                return redirect(route('product_list'));
            }
        }

        $form_action = route('product_add');
        $category_list = Category::getCategoryList();
        $product_options = Option::getOptions();

        return view('product.form')
            ->with([
                'form_action' => $form_action,
                'category_list' => $category_list,
                'product_options' => $product_options
            ]);
    }

    /**
     * Updates existing product
     *
     * @param Request $request
     * @param $id
     * @return $this|Redirect
     */
    public function update(Request $request, $id)
    {
        $model = Product::find($id);
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'slug' => 'required|unique:product,id'
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'Ошибка валидации');
                return back();
            } else {
                if (! empty($request->file('img'))) {
                    $image = $request->file('img')->store('products');
                    $request->file('img')->move(public_path('img/catalog/products'), $image);
                }
                $model->name = $request->input('name');
                $model->description = $request->input('description');
                $model->price = $request->input('price');
                if (isset($image)) {
                    $model->img = $image;
                }
                $model->slug = $request->input('slug');
                $model->save();
                /* product to category */
                if (! empty($request->input('category_id'))) {
                    $exists = false;
                    $exists = ProductCategory::where('product_id', $model->id)
                        ->exists();
                    if ($exists) {
                        $pc = ProductCategory::where('product_id', $model->id)->first();
                        $pc->category_id = $request->input('category_id');
                        $pc->save();
                    } else {
                        $pc = new ProductCategory();
                        $pc->product_id = $model->id;
                        $pc->category_id = $request->input('category_id');
                        $pc->save();
                    }
                } else {
                    ProductCategory::where('product_id', $id)
                        ->delete();
                }
                Session::flash('success', 'Товар сохранен');

                return redirect(route('product_list'));
            }
        }

        $form_action = route('product_update', ['id' => $id]);
        $category_list = Category::getCategoryList();
        $category_id = (ProductCategory::where(['product_id' => $id])->first()) ? ProductCategory::where(['product_id' => $id])->first()->category_id : null;
        $color_options = Option::getOptions();
        $product_options = ProductOption::getProductOptions($model->id);

        return view('product.form')->with([
            'form_action' => $form_action,
            'category_list' => $category_list,
            'category_id' => $category_id,
            'model' => $model,
            'color_options' => $color_options,
            'product_options' => $product_options
        ]);
    }

    /**
     * Add product to the cart
     *
     * @param Request $request
     * @param $id
     * @param $option_id
     * @return mixed
     */
    public function addToCart(Request $request, $id, $option_id, $quantity)
    {
        $product = Product::find($id);
        $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($old_cart);

        $cart->add($product, $product->id, $option_id, $quantity);
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * Increases quantity of the defined product in cart
     *
     * @param Request $request
     * @param $product_id
     * @param $option_id
     * @return mixed
     */
    public function incQuan(Request $request, $product_id, $option_id)
    {
        $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($old_cart);
        $cart->inrease($product_id, $option_id);
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * Decreases quantity of the defined product in cart
     *
     * @param Request $request
     * @param $product_id
     * @param $option_id
     * @return mixed
     */
    public function decQuan(Request $request, $product_id, $option_id)
    {
        $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($old_cart);
        $cart->decrease($product_id, $option_id);
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * Deletes item from the cart
     *
     * @param Request $request
     * @param $product_id
     * @param $option_id
     * @return mixed
     */
    public function delItem(Request $request, $product_id, $option_id)
    {
        $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($old_cart);
        $cart->delete($product_id, $option_id);
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }
}
