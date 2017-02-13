<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Renders list of the categories
     *
     * @return $this
     */
    public function index()
    {
        $model = Category::all();

        return view('category.index')
            ->with(['model' => $model]);
    }

    /**
     * Creates new category
     *
     * @param Request $request
     * @return $this
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'status' => 'required|numeric'
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'Ошибка валидации');
                return Redirect::to('admin/category/add')
                    ->withErrors($validator);
            } else {
                if (! empty($request->file('img'))) {
                    $image = $request->file('img')->store('cats');
                    $request->file('img')->move(public_path('img/catalog/cats'), $image);
                }
                $model = new Category();
                $model->name = $request->input('name');
                $model->slug = $request->input('slug');
                $model->parent_id = ($request->input('parent_id') == '') ? '0' : $request->input('parent_id');
                $model->status = $request->input('status');
                $model->description = $request->input('description');
                if (isset($image)) {
                    $model->img = $image;
                }
                $model->save();
                Session::flash('success', 'Категория сохранена');

                return redirect(route('category_list'));
            }
        }
        $category_list = Category::getCategoryList();
        $form_action = route('category_add');

        return view('category.form')
            ->with([
                'category_list' => $category_list,
                'form_action' => $form_action
            ]);
    }

    /**
     * Updates existing category
     *
     * @param Request $request
     * @param $id
     * @return $this|Redirect
     */
    public function update(Request $request, $id)
    {
        $model = Category::find($id);

        if ($request->isMethod('post')) {
            if (! empty($request->file('img'))) {
                $image = $request->file('img')->store('cats');
                $request->file('img')->move(public_path('img/catalog/cats'), $image);
            }
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->description = $request->input('description');
            $model->parent_id = ($request->input('parent_id') == '') ? '0' : $request->input('parent_id');
            $model->status = $request->input('status');
            if (isset($image)) {
                $model->img = $image;
            }
            $model->save();

            return redirect(route('category_list'));
        }
        $category_list = Category::getCategoryList();
        $form_action = route('category_edit', ['id' => $id]);

        return  view('category.form')
            ->with([
                'model' => $model,
                'category_list' => $category_list,
                'form_action' => $form_action
            ]);
    }
}
