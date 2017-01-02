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
//        $this->middleware('auth');
    }

    public function index()
    {
        $model = Page::all()
            ->where('name', '<>', 'Home');

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
        if ($request->isMethod('post')) {
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

        if ($request->isMethod('post')) {
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

    public function homePage(Request $request)
    {
        $form_action = route('page_home');
        $model = Page::where('name', 'Home')->first();
        $content = json_decode($model->content);

        if ($request->isMethod('post')) {
            $content = [];
            $content['socials'] = [
                'vk' => [
                    'link' => $request->input('vk'),
                    'show' => $request->input('vk_show')
                ],
                'fb' => [
                    'link' => $request->input('fb'),
                    'show' => $request->input('fb_show')
                ],
                'tw' => [
                    'link' => $request->input('tw'),
                    'show' => $request->input('tw_show')
                ],
                'pin' => [
                    'link' => $request->input('pin'),
                    'show' => $request->input('pin_show')
                ],
                'ok' => [
                    'link' => $request->input('ok'),
                    'show' => $request->input('ok_show')
                ],
                'yout' => [
                    'link' => $request->input('yout'),
                    'yout_show' => $request->input('yout_show')
                ],
                'insta' => [
                    'link' => $request->input('insta'),
                    'show' => $request->input('insta_show')
                ]
            ];
            $content['tel'] = [
                'tel_num_1' => $request->input('tel_num_1'),
                'tel_num_2' => $request->input('tel_num_2'),
                'tel_num_3' => $request->input('tel_num_3')
            ];
            $content['skype'] = $request->input('skype');
            $content['content'] = $request->input('content');
            $model->content = json_encode($content);
            $status = $model->save();
            if ($status) {
                Session::flash('success', 'Страница сохранена');
            } else {
                Session::flash('error', 'Возникла ошибка при сохраненнии');
            }

            return redirect(route('page_list'));
        }

        return view('page.home-page')
            ->with([
                'form_action' => $form_action,
                'content' => $content
            ]);
    }
}
