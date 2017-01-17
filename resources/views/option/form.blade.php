@extends('layouts.admin')

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить опцию</div>

                    <div class="panel-body">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        {{ Form::open(['url' => $form_action, 'method' => 'POST', 'id' => 'category', 'class' => 'clearfix', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-group input-group-lg">
                            {{ Form::text('code', isset($model->code) ? $model->code : null, ['placeholder' => 'код', 'class' => 'form-control']) }}
                        </div>
                        <div class="form-group input-group-lg">
                            {{ Form::text('description', isset($model->description) ? $model->description : null, ['placeholder' => 'описание', 'class' => 'form-control']) }}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                                @if(isset($model->img))
                                    <img style="height: 50px;" src="/img/catalog/{{$model->img}}">
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                {{ Form::file('img') }}
                            </div>
                        </div>


                        {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop