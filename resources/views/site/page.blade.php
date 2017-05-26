@extends('layouts.front', ['show_slider' => false])

@section('main-content')
    <div class="text-block">
        <h1>{{ $model->title }}</h1>
        <div class="text">
            <div>{!! $model->content !!}</div>
        </div>
    </div>
@stop