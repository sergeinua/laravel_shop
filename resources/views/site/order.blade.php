@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    @if ($status)
        <p>Ваш заказ был успешно создан.</p>
    @else
        <p>Возникла ошибка при создании Вашего заказа.</p>
    @endif

@stop