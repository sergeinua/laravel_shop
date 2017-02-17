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
                    <tr class="{{ $order->read == 0 ? 'unread' : null }}" onclick="document.location='{{ route('order_show', ['id' => $order->id]) }}'">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ \App\Order::getStatusDescr($order->status) }}</td>
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
        tr {
            cursor: pointer;
        }
    </style>
@stop