@extends('layouts.admin')

@section('main-content')

    <div class="md-6">
        <div>фильтр здесь</div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Создан</th>
                    <th>Статус</th>
                    <th>Номер телефона</th>
                    <th>email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr class="{{ $order->seen == 0 ? 'unread' : null }}">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a class="{{ $order->seen == 0 ? 'unread' : null }}" href="{{ route('order_show', ['id' => $order->id]) }}">{{ \App\Order::getStatusDescr($order->status) }}</a>
                        </td>
                        <td>{{ $order->cus_tel }}</td>
                        <td>{{ $order->cus_email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .unread {
            color: red;
        }
    </style>
@stop