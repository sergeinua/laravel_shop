@extends('layouts.admin')

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить страницу</div>

                    <div class="panel-body">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        {{ Form::open(['url' => $form_action, 'method' => 'POST', 'id' => 'category', 'class' => 'clearfix']) }}

                        <div class="form-group input-group-lg">
                            {{ Form::text('name', isset($model->name) ? $model->name : null, ['placeholder' => 'название', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::text('title', isset($model->title) ? $model->title : null, ['placeholder' => 'тайтл', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::text('slug', isset($model->slug) ? $model->slug : null, ['placeholder' => 'slug', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::select('status', ['1' => 'Опубликовано', '0' => 'Черновик'], isset($model->status) ? $model->status : null, ['placeholder' => 'Состояние', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::textarea('content', isset($model->content) ? $model->content : null, ['placeholder' => 'контент', 'class' => 'form-control', 'rows' => 20]) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::text('order', isset($model->order) ? $model->order : null, ['placeholder' => 'порядок сортировки', 'class' => 'form-control']) }}
                        </div>

                        {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop