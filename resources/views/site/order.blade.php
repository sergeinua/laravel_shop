@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    <div class="text-block" id="block-print">
        <h1>Оптовый склад пряжи</h1>
        @if ($status)
            <p>Ваш заказ был успешно создан.</p>
        @else
            <p>Возникла ошибка при создании Вашего заказа.</p>
        @endif
    </div>

@stop