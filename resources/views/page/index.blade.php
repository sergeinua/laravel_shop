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
            @if (count($model) > 0)

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>название</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($model as $item)

                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ action("PageController@update", ['id' => $item->id]) }}">{{ $item->name }}</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            @else

                <p>Нет сохраненных страниц</p>

            @endif
        </div>
    </div>
    <div class="md-6">
        <a class="btn btn-info" href="{{ action("PageController@create") }}">Добавить страницу</a>
    </div>

@stop