@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    <div class="text-block">
        <h1>{{ $model->name }}</h1>
        <div id="cat-item">
            <div class="backgr clearfix">
                <div id="ci-photos">
                    <div id="cip-main">
                        <img src="/img/catalog/{{ $model->img }}" alt="{{ $model->name }}" title="{{ $model->name }}" class="b-img">
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
                                <input value="-" class="quantity_box_button quantity_box_button_down_v" type="button">
                                <input class="inputboxquantity" size="4" value="1" id="quantity{{ $product_option->code }}" type="text">
                                <input value="+" class="quantity_box_button quantity_box_button_up_v" type="button">
                            </div>
                            <div class="prod_buy solo-var" style="    margin-top: 15px;">
                                @if (\App\ProductBalance::inStock($model->id, $product_option->id))

                                    <a href="{{ route('add_to_cart', [ 'id' => $model->id, 'option_id' => $product_option->id,
                                    'quantity' => 1]) }}" class="button addtocartvariant tc533">
                                        <span>Купить</span>
                                    </a>
                                    @else
                                        <a href="{{ route('add_to_cart', [ 'id' => $model->id, 'option_id' => $product_option->id,
                                        'quantity' => 1]) }}" class="button addtocartvariant tc533" style="padding: 5px">
                                            <span>Заказать</span>
                                        </a>
                                    @endif

                                {{--<a href="{{ route('shopping_cart') }}" class="incart" style="display: none;">--}}
                                    {{--<span>В корзине</span>--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.quantity_box_button_down_v').on('click', function () {
                var _quan = $(this).parent().find('.inputboxquantity').val();
                if (_quan > 1) {
                    $(this).parent().find('.inputboxquantity').val(--_quan);
                    var _link = $(this).parent().parent().find('.addtocartvariant'),
                        _url = _link.attr('href');
                    _url = _url.substring(0, _url.length - 1) + _quan;
                    _link.attr('href', _url);
                }
            });
            $('.quantity_box_button_up_v').on('click', function () {
                var _quan = $(this).parent().find('.inputboxquantity').val();
                $(this).parent().find('.inputboxquantity').val(++_quan);
                var _link = $(this).parent().parent().find('.addtocartvariant'),
                    _url = _link.attr('href');
                _url = _url.substring(0, _url.length - 1) + _quan;
                _link.attr('href', _url);
            });
        })
    </script>
@stop