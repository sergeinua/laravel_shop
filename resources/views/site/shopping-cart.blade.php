@extends('layouts.front', ['show_slider' => false])

@section('main-content')

    <div class="text-block" id="block-print">
        <h1>Оптовый склад пряжи</h1>
        @if (!empty($cart->items))
            <div class="cart-isnotempty">
                <form action="{{ route('shopping_cart') }}" method="post" id="oform">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" id="cart-tbl">
                            <tbody>
                            <tr>
                            </tr>
                            @foreach ($cart->items as $item)
                                @foreach ($item['option_id'] as $option => $quantity)
                                    <tr>
                                        <td class="td-img">
                                            <a href="{{ \App\Product::getUtl($item['item']->id) }}" class="lnk-title">
                                                <img src="/img/catalog/{{ \App\Option::getImg($option) }}"
                                                     width="170" height="170" id="491"
                                                     title="{{ $item['item']->name }}}" alt="{{ $item['item']->name }}">
                                            </a>
                                        </td>
                                        <td class="td-info">
                                            <a href="{{ \App\Product::getUtl($item['item']->id) }}" class="lnk-title">{{ $item['item']->name }}</a>
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
                    </div>
                    <h2 class="oform_order">Оформить заказ</h2>
                    <div id="contactForm">
                        <div id="min_price" style="color:red;font-size:24px;display:none;">
                            Минимальный заказ в нашем магазине от 15000 рублей
                            <p><a href="/katalog">Продолжить покупки→</a></p>
                        </div>
                        <div class="label"><em>Укажите, пожалуйста, своё имя, телефон или e-mail.</em></div>
                        <br>
                        <div class="left_cont">
                            <div>
                                <label for="name">Ваше имя:<span>*</span></label>
                                <input type="text" class="text" id="order_user_name" name="data[order][user_name]"
                                       value="">
                            </div>
                            <br>
                            <div>
                                <label for="email">Телефон:<span>*</span></label>
                                <input type="text" class="text" id="order_user_phone" name="data[order][user_phone]"
                                       value="">
                            </div>
                            <br>
                            <div>
                                <label for="email">E-mail:</label>
                                <input type="text" class="text" id="order_user_email" name="data[order][user_email]"
                                       value="">
                            </div>
                        </div>
                        <div>
                            <label for="message">Комментарий к заказу:</label>
                            <textarea id="message" name="data[order][user_comment]" style="height:120px;"></textarea>
                        </div>
                        <div style="margin-top: 5px;">
                            <input type="submit" value="Оформить заказ" id="submitBut" class="submit button">
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#oform').bind('submit', function () {
                            if ($('.cart-price').attr('data-price') < 15000) {
                                $('#min_price').css('display', 'block');
                                $('#min_price').focus();
                                return false;
                            }
                            if ($('#order_user_name').attr('value') == '') {
                                alert('Введите, пожалуйста, свое имя.');
                                $('#order_user_name').focus();
                                return false;
                            }
                            if ($('#order_user_phone').attr('value') == '') {
                                alert('Укажите, пожалуйста, свой телефон');
                                $('#order_user_phone').focus();
                                return false;
                            }
                        });
                    });
                </script>
            </div>
        @else
            <div class="cart-isempty" style="margin-top: 25px;">
                <p>Ваша корзина пуста.</p>
                <p><a href="{{ route('home_page') }}">Начать покупки →</a></p>
            </div>
        @endif
    </div>

@stop