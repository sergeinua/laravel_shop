@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    <div class="text-block">
        <h1>{{ $category->name }}</h1>
        <div class="text">
            <div class="products">

                @foreach($products as $product)

                    <div class="item">
                        <div class="i-wrap">

                            <a href="/catalog/alize/{{ $product->slug }}">
                                <span class="title">{{ $product->name }}</span>
                            </a>
                            <span class="price"><strong>{{ $product->price }}</strong>&nbsp;руб</span><br>
                            <br>
                            <div class="summ_pr">{{ mb_substr(strip_tags($product->description), 0,100, 'utf-8') }}</div>
                        </div>
                    </div>

                @endforeach

            </div>
            <div>{!! $category->description !!}</div>
        </div>
    </div>

@stop