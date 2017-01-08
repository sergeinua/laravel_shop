@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    <div class="text-block">
        <h1>{{ $model->name }}</h1>
        <div id="cat-item">
            <div class="backgr clearfix">
                <div id="ci-photos">
                    <div id="cip-main">
                        <img src="/img/catalog/{{ $model->img }}" alt="ALPACA ROYAL" title="ALPACA ROYAL" class="b-img">
                    </div>
                </div>
                <div id="ci-top">
                    <div class="text">
                        {!! $model->description !!}
                    </div>
                    <span class="price">Цена: {{ $model->price }} руб</span>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>

@stop