<?php

namespace App\Http\Controllers;

use App\Category;
use App\Option;
use App\Product;
use App\ProductBalance;
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
        $this->middleware('auth');
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
                'slug' => 'required|unique:product'
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

                return redirect(route('product_update', ['id' => $model->id]));
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
        //that's for the redirect after option update
        $request->session()->put('product_id', $id);

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
     * Deletes product with all existing options
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        Product::destroy($id);
        $product_option_id = ProductOption::where('product_id', $id)->get();

        if (count($product_option_id) > 0) {
            foreach ($product_option_id as $item) {
                ProductBalance::where('product_option_id', $item->id)->delete();
                ProductOption::where('option_id', $item->option_id)->delete();
                Option::where('id', $item->option_id)->delete();
            }
        }

        ProductCategory::where('product_id', $id)->delete();
        Session::flash('success', 'Товар удален');

        return redirect(route('product_list'));
    }
}
