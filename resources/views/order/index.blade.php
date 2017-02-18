@extends('layouts.admin')

@section('main-content')

    <div class="md-6">
        <div class="panel">
            <div>Фильтровать по статусу</div>
            <div>
                {{ Form::open(['method' => 'GET']) }}
                    {{ Form::select('filter', ['' => 'все заказы'] + $status_list, isset($_GET['filter']) ? $_GET['filter'] : null) }}
                {{ Form::close() }}
            </div>
        </div>
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
        .panel {
            width: 20%;
            margin: auto;
            text-align: center;
            padding: 15px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('select').on('change', function () {
                $('form').trigger('submit');
            });
        });
    </script>
@stop