@extends('layouts.admin')

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить товар</div>

                    <div class="panel-body">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        {{ Form::open(['url' => $form_action, 'method' => 'POST', 'id' => 'category', 'class' => 'clearfix']) }}

                        <div class="form-group input-group-lg">
                            {{ Form::text('name', isset($model->name) ? $model->name : null, ['placeholder' => 'название', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::text('slug', isset($model->slug) ? $model->slug : null, ['placeholder' => 'slug', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::textarea('description', isset($model->description) ? $model->description : null, ['placeholder' => 'описание', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::text('price', isset($model->price) ? $model->price : null, ['placeholder' => 'цена', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::select('category_id', $category_list, isset($category_id) ? $category_id : null, ['placeholder' => 'категория', 'class' => 'form-control']) }}
                        </div>

                        {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('textarea').summernote({
                height: 300
            });
        })
    </script>

@stop