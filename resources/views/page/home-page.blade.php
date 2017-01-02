@extends('layouts.admin')

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Настройки домашней страницы</div>

                    <div class="panel-body">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        {{ Form::open(['url' => $form_action, 'method' => 'POST', 'id' => 'category', 'class' => 'clearfix']) }}

                            <div class="form-group input-group-lg">
                                {{ Form::label('vk_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('vk_show', true, isset($content->socials->vk->show) ? $content->socials->vk->show : false) }}
                                {{ Form::text('vk', isset($content->socials->vk->link) ? $content->socials->vk->link : false, ['placeholder' => 'vk link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('fb_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('fb_show', true, isset($content->socials->fb->show) ? $content->socials->fb->show : false) }}
                                {{ Form::text('fb', isset($content->socials->fb->link) ? $content->socials->fb->link : false, ['placeholder' => 'fb link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('tw_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('tw_show', true, isset($content->socials->tw->show) ? $content->socials->tw->show : false) }}
                                {{ Form::text('tw', isset($content->socials->tw->link) ? $content->socials->tw->link : false, ['placeholder' => 'tw link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('pin_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('pin_show', true, isset($content->socials->pin->show) ? $content->socials->pin->show : false) }}
                                {{ Form::text('pin', isset($content->socials->pin->link) ? $content->socials->pin->link : false, ['placeholder' => 'pin link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('ok_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('ok_show', true, isset($content->socials->ok->show) ? $content->socials->ok->show : false) }}
                                {{ Form::text('ok', isset($content->socials->ok->link) ? $content->socials->ok->link : false, ['placeholder' => 'ok link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('yout_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('yout_show', true, isset($content->socials->yout->show) ? $content->socials->yout->show : false) }}
                                {{ Form::text('yout', isset($content->socials->yout->link) ? $content->socials->yout->link : false, ['placeholder' => 'youtube link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('insta_show', 'Отображать ссылку') }}
                                {{ Form::checkbox('insta_show', true, isset($content->socials->insta->show) ? $content->socials->insta->show : false) }}
                                {{ Form::text('insta', isset($content->socials->insta->link) ? $content->socials->insta->link : false, ['placeholder' => 'insta link', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('tel_num_1', 'Телефон 1') }}
                                {{ Form::text('tel_num_1', isset($content->tel->tel_num_1) ? $content->tel->tel_num_1 : null, ['placeholder' => 'номер телефона 1', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('tel_num_2', 'Телефон 2') }}
                                {{ Form::text('tel_num_2', isset($content->tel->tel_num_2) ? $content->tel->tel_num_2 : null, ['placeholder' => 'номер телефона 2', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('tel_num_3', 'Телефон 3') }}
                                {{ Form::text('tel_num_3', isset($content->tel->tel_num_3) ? $content->tel->tel_num_3 : null, ['placeholder' => 'номер телефона 3', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::label('skype', 'skype id') }}
                                {{ Form::text('skype', isset($content->skype) ? $content->skype : null, ['placeholder' => 'skype id', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group input-group-lg">
                                {{ Form::textarea('content', isset($content->content) ? $content->content : null, ['placeholder' => 'контент', 'class' => 'form-control', 'rows' => 20, 'id' => 'content']) }}
                            </div>

                        {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('textarea').summernote();
        });
    </script>

@stop