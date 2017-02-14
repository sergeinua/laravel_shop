@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    <div class="text-block" id="block-print">
        <h1>Оптовый склад пряжи</h1>
        @if (!empty($cart->items) || !empty($cart->items_out))
            <div class="cart-isnotempty">
                {{ Form::open(['url' => route('order_post'), 'method' => 'POST', 'id' => 'oform', 'enctype' => 'multipart/form-data']) }}
                    <div class="table-responsive">
                        @if (!empty($cart->items))
                            <table cellpadding="0" cellspacing="0" id="cart-tbl">
                                <tbody>
                                    @foreach ($cart->items as $item)
                                        @foreach ($item['option_id'] as $option => $quantity)
                                            <tr>
                                                <td class="td-img">
                                                    <a href="{{ \App\Product::getUrl($item['item']->id) }}" class="lnk-title">
                                                        <img src="/img/catalog/{{ \App\Option::getImg($option) }}"
                                                             width="170" height="170" id="491"
                                                             title="{{ $item['item']->name }}}" alt="{{ $item['item']->name }}">
                                                    </a>
                                                </td>
                                                <td class="td-info">
                                                    <a href="{{ \App\Product::getUrl($item['item']->id) }}" class="lnk-title">{{ $item['item']->name }}</a>
                                                </td>
                                                <td class="td-input quantity">
                                                    <a href="{{ route('cart_decrease', ['product_id' => $item['item']->id, 'option_id' => $option]) }}">
                                                        <input type="button" value="&nbsp;-"
                                                               class="quantity_box_button button quantity_box_button_down">
                                                    </a>
                                                    <input name="" type="text" value="{{ $quantity }}" price="{{ $item['item']->name }}"
                                                           class="cart-count-changer" id="quantityProductv10542">
                                                    <a href="{{ route('cart_increase', ['product_id' => $item['item']->id, 'option_id' => $option]) }}">
                                                        <input type="button" value="+"
                                                               class="quantity_box_button button quantity_box_button_up">
                                                    </a>
                                                </td>
                                                <td class="td-total pvv10542"><strong>{{ $quantity * $item['price'] }}</strong>&nbsp;руб</td>
                                                <td class="td-del">
                                                    <a class="cart-delete" href="{{ route('cart_delete', ['product_id' => $item['item']->id, 'option_id' => $option]) }}">
                                                        <img src="/img/del.png" alt="Удалить">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td colspan="3" align="right">Итого:&nbsp;</td>
                                        <td colspan="2">
                                            <div id="cart-total"><strong>{{ $cart->total_price }}</strong>&nbsp;руб</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                        <hr>
                        @if (!empty($cart->items_out))
                            <h2>Позиции под заказ</h2>
                            <table cellpadding="0" cellspacing="0" id="cart-tbl">
                                <tbody>
                                    @foreach ($cart->items_out as $item)
                                        @foreach ($item['option_id'] as $option => $quantity)
                                            <tr>
                                                <td class="td-img">
                                                    <a href="{{ \App\Product::getUrl($item['item']->id) }}" class="lnk-title">
                                                        <img src="/img/catalog/{{ \App\Option::getImg($option) }}"
                                                             width="170" height="170" id="491"
                                                             title="{{ $item['item']->name }}}" alt="{{ $item['item']->name }}">
                                                    </a>
                                                </td>
                                                <td class="td-info">
                                                    <a href="{{ \App\Product::getUrl($item['item']->id) }}" class="lnk-title">{{ $item['item']->name }}</a>
                                                </td>
                                                <td class="td-input quantity">
                                                    <a href="{{ route('cart_decrease', ['product_id' => $item['item']->id, 'option_id' => $option]) }}">
                                                        <input type="button" value="&nbsp;-"
                                                               class="quantity_box_button button quantity_box_button_down">
                                                    </a>
                                                    <input name="" type="text" value="{{ $quantity }}" price="{{ $item['item']->name }}"
                                                           class="cart-count-changer" id="quantityProductv10542">
                                                    <a href="{{ route('cart_increase', ['product_id' => $item['item']->id, 'option_id' => $option]) }}">
                                                        <input type="button" value="+"
                                                               class="quantity_box_button button quantity_box_button_up">
                                                    </a>
                                                </td>
                                                <td class="td-total pvv10542"><strong>{{ $quantity * $item['price'] }}</strong>&nbsp;руб</td>
                                                <td class="td-del">
                                                    <a class="cart-delete" href="{{ route('cart_delete', ['product_id' => $item['item']->id, 'option_id' => $option]) }}">
                                                        <img src="/img/del.png" alt="Удалить">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td colspan="3" align="right">Итого:&nbsp;</td>
                                        <td colspan="2">
                                            <div id="cart-total"><strong>{{ $cart->total_price_out }}</strong>&nbsp;руб</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <h2 class="oform_order">Оформить заказ</h2>
                    <div id="contactForm">
                        <div class="label"><em>Укажите, пожалуйста, своё имя, телефон или e-mail.</em></div>
                        <br>
                        <div class="left_cont">
                            <div>
                                <label for="name">Ваше имя:<span>*</span></label>
                                <input type="text" class="text" id="order_user_name" name="name">
                                <div class="validation" id="error-name">Введите имя</div>
                            </div>
                            <br>
                            <div>
                                <label for="email">Телефон:<span>*</span></label>
                                <input type="text" class="text" id="order_user_phone" name="tel_num">
                                <div class="validation" id="error-tel">Введите номер телефона</div>
                            </div>
                            <br>
                            <div>
                                <label for="email">E-mail:<span>*</span></label>
                                <input type="email" class="text" id="order_user_email" name="email">
                                <div class="validation" id="error-email">Введите email</div>
                            </div>
                        </div>
                        <div>
                            <label for="message">Комментарий к заказу:</label>
                            <textarea id="message" name="comment" style="height:120px;"></textarea>
                        </div>
                        <div style="margin-top: 5px;">
                            <input type="submit" value="Оформить заказ" id="submitBut" class="submit button">
                        </div>
                    </div>
                {{ Form::close() }}
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#oform').bind('submit', function () {
                            var error = false;
                            if ($('#order_user_name').val().length == 0) {
                                $('#error-name').addClass('error');
                                $('#order_user_name').focus();
                                error = true;
                            } else {
                                $('#error-name').removeClass('error');
                            }
                            if ($('#order_user_phone').val().length == 0) {
                                $('#error-tel').addClass('error');
                                $('#order_user_phone').focus();
                                error = true;
                            } else {
                                $('#error-tel').removeClass('error');
                            }
                            if ($('#order_user_email').val().length == 0) {
                                $('#error-email').addClass('error');
                                $('#order_user_email').focus();
                                error = true;
                            } else {
                                $('#error-email').removeClass('error');
                            }
                            if (error)
                                return false;
                        });
                    });
                </script>
            </div>
            <style>
                .validation {
                    display: none;
                }
                .validation.error {
                    display: block;
                    color: red;
                }
            </style>
        @else
            <div class="cart-isempty" style="margin-top: 25px;">
                <p>Ваша корзина пуста.</p>
                <p><a href="{{ route('home_page') }}">Начать покупки →</a></p>
            </div>
        @endif
    </div>

@stop