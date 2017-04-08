@extends('layouts.admin')

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Карточка товара</h1></div>
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
                            {{ Form::textarea('description', isset($model->description) ? $model->description : null, ['placeholder' => 'описание', 'class' => 'form-control']) }}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                                {{ Form::text('price', isset($model->price) ? $model->price : null, ['placeholder' => 'цена', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                {{ Form::select('category_id', $category_list, isset($category_id) ? $category_id : null, ['placeholder' => 'категория', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-xs-12">
                                {{ Form::file('img') }}
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                @if(isset($model->img))
                                    <img style="height: 50px;" src="/img/catalog/{{ $model->img }}">
                                @endif
                            </div>
                        </div>
                        <div class="pull-right">
                            {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Опции товара</h2>
                    </div>
                    <div class="panel-body">
                        @if(isset($model))
                            <div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <ul class="actual-colors">
                                            @if($product_options)
                                                <span>Доступные цвета:</span>
                                                @foreach($product_options as $key => $value)
                                                    <li>
                                                        <div class="row">
                                                            <a class="col-xs-1" onclick="deleteOption({{ $key }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            <span class="col-xs-2">{{ $value['description'] }}</span>
                                                            <img class="col-xs-1" src="/img/catalog/{{ $value['img'] }}">
                                                            <input class="col-xs-2 opt-quan" type="text" id="stock-{{ $key }}">
                                                            <a onclick="updateStock({{ $key }})" class="col-xs-1"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <span>У товара нет добавленных опций.</span>
                                            @endif
                                        </ul>
                                        <div id="options_result"></div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            {{ Form::select('option_id', $color_options, null,['class' => 'form-control', 'id' => 'option_id']) }}
                                        </div>
                                        <div class="col-xs-3">
                                            <button class="btn btn-primary" id="btn">Добавить опцию</button>
                                        </div>
                                        <div class="col-xs-3"></div>
                                    </div>
                                </div>
                            </div>
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
            @if(isset($model))
                $('button#btn').click(function (event) {
                    event.preventDefault();
                    var option_id = $('#option_id').val(),
                        product_id = "{{$model->id}}";
                    var data = {
                        option_id: option_id,
                        product_id: product_id
                    };
                    $.post('/api/option', data, function (error) {
                        console.log(error)
                    }).done(function(response) {
                        window.location.reload();
                    });
                    return false;
                });
            @endif
        });
        function deleteOption(item_id) {
            var url = '/api/option/delete/' + item_id;
            $.post(url, null, function (error) {
                console.log(error);
            }).done(function () {
                window.location.reload();
            });
        }
        function updateStock(product_option_id) {
            var stock = parseInt($('#stock-' + product_option_id).val()),
                data = {
                    product_option_id: product_option_id,
                    stock: stock
                };
            $.post('/api/stock', data, function (err) {
                console.log('err', err);
            }).done(function (res) {
                console.log('sent', res);
            });
            return false;
        }
    </script>
    <style>
        ul li {
            margin-top: 10px;
            list-style-type: none;
        }
        .col-xs-2.opt-quan {
            width: 30px;
            height: 20px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            padding: 3px;
        }
    </style>

@stop