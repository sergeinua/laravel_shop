@extends('layouts.admin')

@section('main-content')

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <div class="md-6">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>название</th>
                    <th>slug</th>
                    <th>состояние</th>
                    <th>описание</th>
                </tr>
                </thead>
                <tbody>

                @foreach($model as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ action("CategoryController@update", ['id' => $item->id]) }}">{{ \App\Category::getCatPath($item->id)  }} >>> {{ $item->name }}</a></td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->getStatus($item->status) }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="md-6">
        <a class="btn btn-info" href="{{ action("CategoryController@create") }}">Добавить пункт</a>
    </div>

@stop