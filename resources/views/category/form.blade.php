@extends('layouts.admin')

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить категорию</div>

                    <div class="panel-body">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        {{ Form::open(['url' => $form_action, 'method' => 'POST', 'id' => 'category', 'class' => 'clearfix', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-group input-group-lg">
                            {{ Form::text('name', isset($model->name) ? $model->name : null, ['placeholder' => 'название', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::text('slug', isset($model->slug) ? $model->slug : null, ['placeholder' => 'slug', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::select('parent_id', $category_list, isset($model->parent_id) ? $model->parent_id : null, ['placeholder' => 'Родительская категория', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::select('status', ['1' => 'Активно', '0' => 'Неактивно'], isset($model->status) ? $model->status : null, ['placeholder' => 'Состояние', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group input-group-lg">
                            {{ Form::textarea('description', isset($model->description) ? $model->description : null, ['placeholder' => 'описание', 'class' => 'form-control']) }}
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                                {{ Form::file('img') }}
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                @if(isset($model->img))
                                    <img style="height: 50px;" src="/img/catalog/{{$model->img}}">
                                @endif
                            </div>
                        </div>

                        {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}

                        {{ Form::close() }}

                        @if(isset($model))
                            <a href="{{ route('category_delete', ['id' => $model->id]) }}" class="btn btn-lg btn-danger pull-right">удалить товар</a>
                        @endif

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