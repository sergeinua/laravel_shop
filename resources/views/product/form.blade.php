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
                        @if(isset($model))
                            <div>
                                <hr>
                                <div class="text-center">Опции товара</div>
                                <hr>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <ul class="actual-colors">
                                            @if($product_options)
                                                <span>Доступные цвета:</span>
                                                @foreach($product_options as $key => $value)
                                                    <li style="margin-top: 10px">
                                                        <a class="btn btn-danger" onclick="deleteOption({{ $key }})">удалить</a>
                                                        {{ $value['description'] }}
                                                        <img style="height: 34px;" src="/img/catalog/{{ $value['img'] }}">
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
                                            <button id="btn">Добавить опцию</button>
                                        </div>
                                        <div class="col-xs-3"></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="pull-right">
                            {{ Form::button('Сохранить', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) }}
                        </div>
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
    </script>

@stop