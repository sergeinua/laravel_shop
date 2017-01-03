@extends('layouts.front', ['show_slider' => true])

@section('main-content')

    <div class="text-block" id="block-print">
        <h1>{{ $title }}</h1>
        <div class="text">

            {!! $content !!}

        </div>

    </div>

@stop