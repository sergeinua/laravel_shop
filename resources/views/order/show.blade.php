@extends('layouts.admin')

@section('main-content')

    <div class="alert alert-success hidden" id="notification">Статус заказа был успешно обновлен</div>
    <div class="row">
        <div class="panel">
            <div class="btn-block">
                <div class="btn btn-default" onclick="document.location='{{ route('order_list') }}'">назад</div>
                <div class="btn btn-success" id="order-update">сохранить</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10">
            <div><label>Создан:</label>{{ $model->created_at }}</div>
            <div>
                <label>Статус:</label>
                <div class="status-form">
                    {{ Form::select('status', $status_list, isset($status) ? $status : null, ['id' => 'status-id']) }}
                </div>
            </div>
            <div><label>Имя:</label>{{ $model->cus_name }}</div>
            <div><label>Номер телефона:</label>{{ $model->cus_tel }}</div>
            <hr>
            <div>
                @foreach ($items as $product_id => $options)
                    <ul>
                        <h3>{{ \App\Product::getName($product_id) }}</h3>
                        @foreach ($options->option_id as $option_id => $quantity)
                            <li>
                                <span class="field">{{ \App\Option::getDescription($option_id) }}</span>
                                <span class="field">({{ \App\Option::getCode($option_id) }})</span>
                                <span class="field">{{ \App\Product::getPrice($product_id) }} рублей</span>
                                <span class="field">{{ $quantity }} шт.</span>
                                <span class="field">{{ \App\Product::getPrice($product_id) * $quantity }} рублей</span>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <div class="text-center"><h3>Общая сумма заказа: {{ $model->amount }} рублей</h3></div>
        </div>
    </div>
    <style>
        label {
            width: 150px;
        }
        span.field {
            width: 100px;
            display: inline-block;
        }
        .status-form {
            display: inline-block;
        }
        .btn-block {
            margin-top: 20px;
        }
        .row > .panel {
            padding-left: 30px;
            padding-bottom: 20px;
        }
    </style>
    <script>
        $('#order-update').click(function (event) {
            event.preventDefault();
            var status = $('#status-id').val(),
                data = {
                    status: status
                };
            $.post('/api/order/{{ $model->id }}', data)
                .done(function() {
                    $('#notification').toggleClass('hidden');
                    setTimeout(function () {
                        $('#notification').toggleClass('hidden');
                    }, 3000);
                });
            return false;
        });
    </script>
@stop