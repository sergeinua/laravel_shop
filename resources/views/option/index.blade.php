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
                    <th>Описание</th>
                    <th>Код</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $item)
                    <tr>
                        <td><a href="{{ action("OptionController@update", ['id' => $item->id]) }}">{{ $item->description }}</a></td>
                        <td>{{ $item->code }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="md-6">
        <a class="btn btn-info" href="{{ action("OptionController@create") }}">Добавить опцию</a>
    </div>

@stop