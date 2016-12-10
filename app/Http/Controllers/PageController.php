<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $model = Page::all();

        return view('page.index')
            ->with(['model' => $model]);
    }

    /**
     * Creates new page
     *
     * @param Request $request
     * @return $this
     */
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
                return Redirect::to(route('page_add'))
                    ->withErrors($validator);
            } else {
                $model = new Page();
                $model->name = $request->input('name');
                $model->slug = $request->input('slug');
                $model->title = $request->input('title');
                $model->status = $request->input('status');
                $model->content = $request->input('content');
                $model->order = $request->input('order');
                $status = $model->save();
                if ($status) {
                    Session::flash('success', 'Страница сохранена');
                } else {
                    Session::flash('error', 'Возникла ошибка при сохраненнии');
                }

                return redirect(route('page_list'));
            }
        }
        $form_action = route('page_add');

        return view('page.form')
            ->with([
                'form_action' => $form_action
            ]);
    }

    /**
     * Updates existing page
     *
     * @param Request $request
     * @param $id
     * @return $this|Redirect
     */
    public function update(Request $request, $id)
    {
        $model = Page::find($id);

        if($request->isMethod('post')) {
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->title = $request->input('title');
            $model->content = $request->input('content');
            $model->order = $request->input('order');
            $model->status = $request->input('status');
            $model->save();

            return redirect(route('page_list'));
        }
        $form_action = route('page_edit', ['id' => $id]);

        return  view('page.form')
            ->with([
                'model' => $model,
                'form_action' => $form_action
            ]);
    }
}
