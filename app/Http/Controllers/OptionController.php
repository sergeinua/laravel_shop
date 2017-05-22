<?php

namespace App\Http\Controllers;

use App\Option;
use App\ProductBalance;
use App\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Renders list of the options
     *
     * @return $this
     */
    public function index()
    {
        $model = Option::all();

        return view('option.index')
            ->with(['model' => $model]);
    }

    /**
     * Creating new option
     *
     * @param Request $request
     * @return $this|Redirect
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:option',
                'description' => 'required'
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'Ошибка валидации');
                return Redirect::to('admin/option/add')
                    ->withErrors($validator);
            } else {
                if (! empty($request->file('img'))) {
                    $image = $request->file('img')->store('options');
                    $request->file('img')->move(public_path('img/catalog/options'), $image);
                }
                $model = new Option();
                $model->code = $request->input('code');
                $model->description = $request->input('description');
                if (isset($image)) {
                    $model->img = $image;
                }
                $model->save();
                //product to option
                $po = new ProductOption();
                $po->product_id = $request->input('product_id');
                $po->option_id = $model->id;
                $po->save();
                //balance
                $pb = new ProductBalance();
                $pb->product_option_id = $po->id;
                $pb->stock = 0;
                $pb->save();

                Session::flash('success', 'Опция сохранена');

                return back();
            }
        }

        $form_action = route('option_add');

        return view('option.form')
            ->with(['form_action' => $form_action]);
    }

    /**
     * Updates existing option
     *
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|Redirect
     */
    public function update(Request $request, $id)
    {
        $model = Option::find($id);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'code' => 'required|unique:option,id',
                'description' => 'required'
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'Ошибка валидации');
                return back();
            } else {
                if (! empty($request->file('img'))) {
                    $image = $request->file('img')->store('options');
                    $request->file('img')->move(public_path('img/catalog/options'), $image);
                }
                $model->code = $request->input('code');
                $model->description = $request->input('description');
                if (isset($image)) {
                    $model->img = $image;
                }
                $model->save();
                Session::flash('success', 'Опция сохранена');

                return redirect(route('option_list'));
            }
        }

        $form_action = route('option_update', ['id' => $id]);

        return view('option.form')
            ->with([
                'model' => $model,
                'form_action' => $form_action
            ]);
    }
}
