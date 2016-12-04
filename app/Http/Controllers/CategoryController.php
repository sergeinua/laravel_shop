<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Renders list of the categories
     *
     * @return $this
     */
    public function index()
    {
        $model = Category::where('status', '1')->get();

        return view('category.index')
            ->with(['model' => $model]);
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
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
                $model = new Category();
                $model->name = $request->input('name');
                $model->slug = $request->input('slug');
                $model->parent_id = ($request->input('parent_id') == '') ? '0' : $request->input('parent_id');
                $model->status = $request->input('status');
                $model->description = $request->input('description');
                $model->save();
                Session::flash('success', 'Категория сохранена');

                return Redirect::to('admin/category');
            }

        }
        $category_list = Category::getCategoryList();

        return view('category.form')
            ->with(['category_list' => $category_list]);
    }
}
