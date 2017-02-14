@extends('layouts.admin')

@section('main-content')

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div>
        <div><label>Создан:</label>{{ $model->created_at }}</div>
        <div><label>Статус:</label>{{ $model->status }}</div>
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
    <style>
        label {
            width: 150px;
        }
        span.field {
            width: 100px;
            display: inline-block;
        }
    </style>

@stop