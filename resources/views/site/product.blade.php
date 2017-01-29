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
            <br>
            <br>
            @if(isset($product_options))
                <h2>Доступные цвета</h2>
                <ul id="cip-thumbs-variant" class="row">
                @foreach($product_options as $product_option)
                    <li class="col-sm-2 col-xs-4">
                        <div class="thumbs-inner">
                            <a rel="fancybox" href="/images/product_variant/008/008722/264-1-kremoyj.jpg" class="photo-variant" photo_urlabs="/images/product_variant/008/008722/264-1-kremoyj.jpg" photo="/images/product_variant/008/008722/264-1-kremoyj.tn-300x300.480567d319.jpg">
                                <img src="/img/catalog/{{ $product_option->img }}" alt="1" title="1" class="b-img">
                            </a>
                            <br>
                            <span>
                                <p>{{ $product_option->code }}</p>
                                <p>{{ $product_option->description }}</p>
                            </span>
                            <div class="quantity qty">
                                <input value="-" class="quantity_box_button quantity_box_button_down_v" productid="8722" type="button">
                                <input class="inputboxquantity" size="4" productid="533" pricevariant="463" value="1" data-vid="8722" id="quantityProduct8722" type="text">
                                <input value="+" class="quantity_box_button quantity_box_button_up_v" productid="8722" type="button">
                            </div>
                            <div class="prod_buy solo-var" style="    margin-top: 15px;">
                                <a href="{{ route('add_to_cart', [ 'id' => $model->id, 'option_id' => $product_option->id ]) }}" class="button addtocartvariant tc533">
                                    <span>Купить</span>
                                </a>
                                <a href="/korzina" class="incart ic533" style="display: none;">
                                    <span>В корзине</span>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>

    </div>

@stop