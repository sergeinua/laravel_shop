/*РЈРґР°Р»РµРЅРёРµ С‚РѕРІР°СЂР° РёР· РєРѕСЂР·РёРЅС‹, РїРµСЂРµСЃС‡РµС‚ РєРѕР»РёС‡РµСЃС‚РІР° Рё С†РµРЅС‹ РІ РјРёРЅРё РєРѕСЂР·РёРЅРµ, РѕС„РѕСЂР»РµРЅРёРµ Р·Р°РєР°Р·Р°*/


function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}
$(document).ready(function () {

    $('#top-menu').slicknav({
        prependTo: '.mobileNav',
        label: ''
    });

    $('.text table').wrap('<div class="table-responsive"></div>');

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : 0;
    }

    function updateSession() {
        $.ajax({
            url: '/update_session',
            dataType: 'html',
            data: {'update': 1},

            success: function (data) {
                //console.log(data);
            }
        });
    }

    $('#contact-popup').hide();
    curr = $('#shop-cart-currency');
    US.Currency.init({
        name: curr.attr('name'),
        course: curr.attr('course'),
        decimals: curr.attr('decimals'),
        dsep: curr.attr('dsep'),
        tsep: curr.attr('tsep')
    });


    function dataMiniCart() {
        $.ajax({
            url: '/order_product',
            data: {'get_data': 1},
            dataType: 'json',
            success: function (data) {
                count = data._c;
                price = data._p;
            }
        });
    }

    dataMiniCart();

    US.Cart.onsave = function () {

        count = this.getCount();
        price = this.getPrice();

        var sessionCount = parseInt($('.mini-cart-count').attr('data-count'));

        var sessionPrice = parseFloat($('.cart-price').attr('data-price'));
        if (!sessionPrice) sessionPrice = 0;
        if (!sessionCount) sessionCount = 0;

        totalCount = count + sessionCount;
        totalPrice = price + sessionPrice;
        dataMiniCart();

        if (totalCount) {
            $('.cart-isempty').hide();
            $('.cart-isnotempty').show();

            $('.cart-count').find('.mini-cart-count').html(totalCount);
            $('.cart-price').html(US.formatPrice(totalPrice) + '&nbsp;' + US.Currency.name);

            $('#cart-total').html(US.money(totalPrice, 'strong'));
        }
        else {
            $('.cart-isempty').show();
            $('.cart-isnotempty').hide();
        }

    };


    // РР· cookie
    US.Cart.init();


    $('a[rel=fancybox]').fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false
    });


    $('.quantity_box_button_down_v').bind('click', function () {
        var vid = $(this).attr('productid');

        var qty = parseInt($('input[data-vid=' + vid + ']').val());
        if (qty >= 1)
            qty--;


        $('input[data-vid=' + vid + ']').val(qty);

    });

    $('.quantity_box_button_up_v').bind('click', function () {
        var vid = $(this).attr('productid');

        var qty = parseInt($('input[data-vid=' + vid + ']').val());
        qty++;


        $('input[data-vid=' + vid + ']').val(qty);

    });


    $('.product-variant').bind('change', function () {
        var s = $(this);
        var price = $(s.attr('rel'));

        $('option', s).each(function () {
            o = $(this);
            if (o.attr('value') == s.attr('value')) {
                if ((o.attr('photo') != '') && (o.attr('photo'))) {
                    $('#photo_main').attr('src', o.attr('photo'));
                    $('#photo_main_a').attr('src', o.attr('photo_urlAbs'));
                }
                price.html(o.attr('priceshow'));
            }
        });
    }).trigger('change');

    $('.product-variantadd').bind('change', function () {
        var s = $(this);
        if (s.find('option:selected').attr('flag')) {
            s.parent().parent().find('.button').css('display', 'none');
            s.parent().parent().find('.incart').css('display', '');
        }
        else {
            s.parent().parent().find('.button').css('display', '');
            s.parent().parent().find('.incart').css('display', 'none');
        }
    });

    $('.photo-variant').bind('click', function () {
        t = $(this);
        $('#photo_main').attr('src', t.attr('photo'));
        $('#photo_main_a').attr('src', t.attr('photo_urlAbs'));
        $('#photo_main_a').attr('href', t.attr('photo_urlAbs'));
        $('.product-variant').val(t.attr('vid'));
        $('.product-variant').change();
    });

    $('.solo-var a.button').bind('click', function () {
        t = $(this);
        var_id = t.attr('productid');
        var count = parseInt($('#quantityProduct' + var_id).val());
        var price = parseInt($('#quantityProduct' + var_id).attr('pricevariant'));
        if (!count) {
            count = 1;
        }

        US.Cart.add('v' + var_id, count, price);

        count = US.Cart.getCount();
        price = US.Cart.getPrice();

        if (count) {
            t.hide();
            t.parent().find('.incart').show();
        }

        /*if (count)
         {
         if (t.attr('show')) $(t.attr('show')).show();
         if (t.attr('hide')) $(t.attr('hide')).hide();
         }
         else
         {
         // РљСЂРёРІРѕР№ С€Р°Р±Р»РѕРЅ, РЅРµ РґРѕР±Р°РІРёР»РѕСЃСЊ
         }
         t.parent().find('.button').css('display','none');
         t.parent().find('.incart').css('display','');
         */
        return false;
    });

    /*$('.addtocart-variant a.button').bind('click', function(){

     t = $(this);
     var_id = t.attr('productid');
     var count = parseInt($('#quantityProduct' + var_id).val());
     if(!count){
     count = 1;
     }
     // var var_id = US.checkId(t.parent().find('.product-variant').val());
     // if(var_id == ''){
     //     alert('Р’С‹ РЅРµ РІС‹Р±СЂР°Р»Рё РІР°СЂРёР°РЅС‚.');
     //     return false;
     // }

     US.Cart.add('v'+var_id,count,t.parent().find('option:selected').attr('price'));

     count = US.Cart.getCount();
     price = US.Cart.getPrice();

     if (count)
     {
     if (t.attr('show')) $(t.attr('show')).show();
     if (t.attr('hide')) $(t.attr('hide')).hide();
     }
     else
     {
     // РљСЂРёРІРѕР№ С€Р°Р±Р»РѕРЅ, РЅРµ РґРѕР±Р°РІРёР»РѕСЃСЊ
     }
     t.parent().parent().find('.button').css('display','none');
     t.parent().parent().find('.incart').css('display','');
     t.parent().find('option:selected').attr('flag','1');

     return false;
     });*/
    $('.addtocartvariant').bind('click', function () {

        var count = parseInt($('#quantityProduct').val());
        if (!count) {
            count = 1;
        }

        product_variants = $('.tb').find('input[type=checkbox][checked]');
        var countVar = product_variants.size();

        for (num = 0; num < countVar; num++) {
            var pr_id = US.checkId(product_variants.eq(num).attr('productid'));
            var var_id = US.checkId(product_variants.eq(num).attr('variantid'));

            var pr_price = parseFloat(product_variants.eq(num).attr('variantprice'));
            if (var_id != 0) {
                $('.tb').find('input[type=checkbox][variantid=' + var_id + ']').hide();
                $('.tb').find('input[type=checkbox][variantid=' + var_id + ']').parent().find('a').show();
                $('.tb').find('input[type=checkbox][variantid=' + var_id + ']').attr('variantid', '0');
                US.Cart.add('v' + var_id, count, pr_price);
            }
        }
        return false;

    });


    $('.addtocart').bind('click', function () {
        var arr = new Array();
        var products = new Array();
        var i = 0;
        var j = 0;
        var k = 0;
        $('.inputboxquantity').each(function (index) {
            tmp = $(this);
            var_id = tmp.attr('id');
            count_variant = parseInt(tmp.attr('value'));
            price_variant = parseInt(tmp.attr('pricevariant'));
            product_id = parseInt(tmp.attr('productid'));

            if (count_variant != 0) {
                arr[index] = new Array(var_id, count_variant, product_id);
                US.Cart.add('v' + var_id, count_variant, price_variant);
            }
        });

        /*$.ajax({
         type: "GET",
         url:"/order_product",
         data:{'arr':arr},
         success: function(data){

         },
         error: function(data){
         alert("С€Р»Р°Рє");
         }
         });
         */
        t = $(this);
        if (t.attr('show')) $(t.attr('show')).show();
        if (t.attr('hide')) $(t.attr('hide')).hide();

        return false;
    });


    $('.cart-delete').bind('click', function () {
        t = $(this);

        if (confirm('РЈРґР°Р»РёС‚СЊ СЌС‚РѕС‚ С‚РѕРІР°СЂ РёР· Р·Р°РєР°Р·Р°?')) {
            var deleteId = US.checkId(t.attr('productid'));
            $.ajax({
                url: '/order_product_delete',
                data: {'id': deleteId},

                success: function (data) {
                    alert('С‚РѕРІР°СЂ СѓРґР°Р»РµРЅ РёР· РєРѕСЂР·РёРЅС‹');
                }
            });

            t.parent().parent().empty();
        }

        return false;
    });


    $('.cart-count-changer').bind('keyup', function () {
        var t = $(this);

        var id = US.checkId(t.attr('productid'));
        var price = parseFloat(t.attr('price'));
        var count = parseInt(t.attr('value'));

        if (count) {
            count = count ? count : 1;
            t.attr('value', count);


            $.ajax({
                url: '/upd-cart',
                dataType: 'json',
                data: {'id': id, 'count': count, 'price': price},

                success: function (data) {

                    var chc = parseInt(data.chc);
                    var chp = parseFloat(data.chp);

                    var currentCount = parseInt($('.mini-cart-count').html());
                    var currentPrice = parseFloat($('.cart-price').attr('data-price'));

                    var newCount = currentCount + chc;
                    var newPrice = currentPrice + chp;
                    $('.mini-cart-count').html(newCount);
                    $('.cart-price').attr('data-price', newPrice).html(US.money(newPrice, 'strong'));
                    $('#cart-total').html(US.money(newPrice, 'strong'));
                    //var newPrice = price * data;
                }
            });

            $(t.attr('update')).html(US.money(price * count, 'strong'));
        }

    });
    $('.cart-count-changer').bind('blur', function () {
        var t = $(this);

        var id = US.checkId(t.attr('productid'));
        var price = parseFloat(t.attr('price'));
        var count = parseInt(t.attr('value'));

        if (!count) {
            count = 1;
            $.ajax({
                url: '/upd-cart',
                dataType: 'json',
                data: {'id': id, 'count': count, 'price': price},

                success: function (data) {

                    var chc = parseInt(data.chc);
                    var chp = parseFloat(data.chp);

                    var currentCount = parseInt($('.mini-cart-count').html());
                    var currentPrice = parseFloat($('.cart-price').attr('data-price'));

                    var newCount = currentCount + chc;
                    var newPrice = currentPrice + chp;
                    $('.mini-cart-count').html(newCount);
                    $('.cart-price').attr('data-price', newPrice).html(US.money(newPrice, 'strong'));
                    //var newPrice = price * data;
                    $('#cart-total').html(US.money(newPrice, 'strong'));
                }
            });
            $(t.attr('update')).html(US.money(price * count, 'strong'));
        }

    });

    $('.captcha').click(function () {
        $('.captcha').attr('src', '');
        $('.captcha').attr('src', '/captcha?a=' + (new Date()).getTime());
        return false;
    });

    $('.quantity_box_button_down').click(function () {
        var product_id = $(this).attr('productid');
        var qty_el = document.getElementById('quantityProduct' + product_id);

        var qty = qty_el.value;

        if (!isNaN(qty) && qty > 1)
            qty_el.value--;

        var t = $('#quantityProduct' + product_id);

        if (t.attr('update') !== undefined) {
            var price = parseFloat(t.attr('price'));
            var count = parseInt(t.attr('value'));

            if (count) {
                count = count ? count : 1;
                t.attr('value', count);

                $.ajax({
                    url: '/upd-cart',
                    dataType: 'json',
                    data: {'id': product_id, 'count': count, 'price': price},

                    success: function (data) {

                        var chc = parseInt(data.chc);
                        var chp = parseFloat(data.chp);

                        var currentCount = parseInt($('.mini-cart-count').html());
                        var currentPrice = parseFloat($('.cart-price').attr('data-price'));

                        var newCount = currentCount + chc;
                        var newPrice = currentPrice + chp;
                        $('.mini-cart-count').html(newCount);
                        $('.cart-price').attr('data-price', newPrice).html(US.money(newPrice, 'strong'));
                        //var newPrice = price * data;
                        $('#cart-total').html(US.money(newPrice, 'strong'));
                    }
                });
                $(t.attr('update')).html(US.money(price * count, 'strong'));
            }
        }
        return false;
    });
    $('.quantity_box_button_up').click(function () {
        var product_id = $(this).attr('productid');

        var qty_el = document.getElementById('quantityProduct' + product_id);

        var qty = qty_el.value;

        if (!isNaN(qty))
            qty_el.value++;


        var t = $('#quantityProduct' + product_id);
        if (t.attr('update') !== undefined) {
            var price = parseFloat(t.attr('price'));
            var count = parseInt(t.attr('value'));

            if (count) {
                count = count ? count : 1;
                t.attr('value', count);
                $.ajax({
                    url: '/upd-cart',
                    dataType: 'json',
                    data: {'id': product_id, 'count': count, 'price': price},

                    success: function (data) {

                        var chc = parseInt(data.chc);
                        var chp = parseFloat(data.chp);

                        var currentCount = parseInt($('.mini-cart-count').html());
                        var currentPrice = parseFloat($('.cart-price').attr('data-price'));

                        var newCount = currentCount + chc;
                        var newPrice = currentPrice + chp;
                        $('.mini-cart-count').html(newCount);
                        $('.cart-price').attr('data-price', newPrice).html(US.money(newPrice, 'strong'));
                        //var newPrice = price * data;
                        $('#cart-total').html(US.money(newPrice, 'strong'));
                    }
                });
                $(t.attr('update')).html(US.money(price * count, 'strong'));
            }
        }

        return false;
    });


    jQuery(".cloner").click(
        function () {
            var addedSelect = $(this);

            select = addedSelect.parent().parent().find('.line-f.first').clone().removeClass('first');

            select.find('.label').html('');

            select.find('.que').hide();

            select.find('select').attr('value', "").addClass('add-sel');

            select.insertBefore(addedSelect.parent());

            return false;

        });

    $('.add-sel').live('change', function () {
        if ($(this).attr('value') == '') {
            $(this).parent().parent().html('');
        }
    }).trigger('change');

    $('#checkcurSelect').change(function () {
        $('#checkcurForm').submit();
    })

    $('#checkAll').change(function () {
        if ($('#checkAll').attr('checked') == false) {
            $('.tb input[type=checkbox]').attr('checked', '');
        }
        else {
            $('.tb input[type=checkbox]').attr('checked', 'checked');
        }
    });

    //РєРѕР»-РІРѕ С‚РѕРІР°СЂРѕРІ РЅР° СЃС‚СЂР°РЅРёС†Сѓ
    $('#select_count').bind('change', function () {
        window.location = $('#base_url').val() + '/page:' + $('#paging_current').val() + '/pcnt:' + $('#select_count').val() + $('#paging_get').val();
    });

    //СЃРѕСЂС‚РёСЂРѕРІРєР° С‡РµСЂРµР· СЃРµР»РµРєС‚
    $('#select_order').bind('change', function () {
        window.location = $('#select_order').val();
    });


    //РїРѕРґРїРёСЃР°С‚СЊСЃСЏ РЅР° СЂР°СЃСЃС‹Р»РєСѓ
    $('#subscribe_button').bind('click', function () {
        if ($("#subscribe_email").val().trim() == '') {
            alert('РЈРєР°Р¶РёС‚Рµ РІР°С€ e-mail.');
            $("#subscribe_email").focus();
            return false;
        }
        if (!validateEmail($("#subscribe_email").val().trim())) {
            alert('РЈРєР°Р¶РёС‚Рµ РїСЂР°РІРёР»СЊРЅС‹Р№ С„РѕСЂРјР°С‚ e-mail');
            $("#subscribe_email").focus();
            return false;
        }
        $.post('/subscribe', {
                email: $("#subscribe_email").val(),
                name: $("#subscribe_name").val(),
                active: '1'
            }, function (data) {
                if (data == '') {
                    $('#subscribe_error').hide();
                    $('#subscribe_success').show();
                } else {
                    $('#subscribe_error').html(data).show();
                    $('#subscribe_success').hide();
                }
            }
        );

        return false;
    });

    //РґРѕР±Р°РІРёС‚СЊ РІ Р·Р°РєР»Р°РґРєРё
    $('.btn_zk').click(function () {
        var t = $(this);
        t.toggleClass('act');
        var productID = t.attr('productId');
        toggleCookies('bookmarks', productID);

        if (t.hasClass('act')) t.text('РЈРґР°Р»РёС‚СЊ Р·Р°РєР»Р°РґРєСѓ');
        else t.text('Р’ Р·Р°РєР»Р°РґРєРё');

        var count = $.cookie('bookmarks') ? $.cookie('bookmarks').split(',').length : 0;
        $('span.bookmarks-counter').text(count);

        return false;
    });

    //Р·РІС‘Р·РґС‹ РґР»СЏ РєРѕРјРјРµРЅС‚Р°СЂРёРµРІ С‚РѕРІР°СЂРѕРІ
    $('#star-1').click(function () {
        $('#star-5').css('background-position', '-33px 0px');
        $('#star-4').css('background-position', '-33px 0px');
        $('#star-3').css('background-position', '-33px 0px');
        $('#star-2').css('background-position', '-33px 0px');
        $('#star-1').css('background-position', '0px 0px');
        $('#comment_rating').val('1');
        return false;
    });
    $('#star-2').click(function () {
        $('#star-5').css('background-position', '-33px 0px');
        $('#star-4').css('background-position', '-33px 0px');
        $('#star-3').css('background-position', '-33px 0px');
        $('#star-2').css('background-position', '0px 0px');
        $('#star-1').css('background-position', '0px 0px');
        $('#comment_rating').val('2');
        return false;
    });
    $('#star-3').click(function () {
        $('#star-5').css('background-position', '-33px 0px');
        $('#star-4').css('background-position', '-33px 0px');
        $('#star-3').css('background-position', '0px 0px');
        $('#star-2').css('background-position', '0px 0px');
        $('#star-1').css('background-position', '0px 0px');
        $('#comment_rating').val('3');
        return false;
    });

    $('#star-4').click(function () {
        $('#star-5').css('background-position', '-33px 0px');
        $('#star-4').css('background-position', '0px 0px');
        $('#star-3').css('background-position', '0px 0px');
        $('#star-2').css('background-position', '0px 0px');
        $('#star-1').css('background-position', '0px 0px');
        $('#comment_rating').val('4');
        return false;
    });
    $('#star-5').click(function () {
        $('#star-5').css('background-position', '0px 0px');
        $('#star-4').css('background-position', '0px 0px');
        $('#star-3').css('background-position', '0px 0px');
        $('#star-2').css('background-position', '0px 0px');
        $('#star-1').css('background-position', '0px 0px');
        $('#comment_rating').val('5');
        return false;
    });
    //РѕС‚РїСЂР°РІРєР° РєРѕРјРјРµРЅС‚Р°СЂРёСЏ
    $('#comment_submit').bind('click', function () {
        if ($('#comment_name').attr('value') == '') {
            alert('РџСЂРµРґСЃС‚Р°РІСЊС‚РµСЃСЊ, РїРѕР¶Р°Р»СѓР№СЃС‚Р°.');
            $('#comment_name').focus();
            return false;
        }
        if ($('#comment_message').attr('value') == '') {
            alert('Р’РІРµРґРёС‚Рµ РІР°С€ РѕС‚Р·С‹РІ');
            $('#comment_message').focus();
            return false;
        }
        if ($('#comment_captcha').attr('value') == '') {
            alert('Р’РІРµРґРёС‚Рµ С‚РµРєСЃС‚, СѓРєР°Р·Р°РЅРЅС‹Р№ РЅР° РєР°СЂС‚РёРЅРєРµ');
            $('#comment_captcha').focus();
            return false;
        }
        var rand = Math.random();
        var star = $('#comment_rating').val();
        var prid = $('#comment_product_id').val();
        var name = $('#comment_name').val().trim();
        var message = $('#comment_message').val().trim();
        var captcha = $('#comment_captcha').val().trim();
        $.ajax({
            type: "POST",
            url: "/addproductcomment",
            data: {"name": name, "message": message, "rand": rand, "prid": prid, "captcha": captcha, "star": star},
            dataType: "html",
            success: function (data) {
                if (data == 'ok') {
                    $('#comment_moderation').show();
                    $('#comment_name').val('');
                    $('#comment_message').val('');
                    $('#comment_captcha').val('');
                    $('.stars_comment').css('background-position', '0px 0px');
                    $('.captcha').attr('src', '');
                    $('.captcha').attr('src', '/captcha?a=' + (new Date()).getTime());
                }
                if (data == 'off') {
                    alert('РўРµРєСЃС‚ РІРІРµРґС‘РЅ РЅРµРїСЂР°РІРёР»СЊРЅРѕ, РїРѕРїСЂРѕР±СѓР№С‚Рµ РµС‰С‘ СЂР°Р·');
                    $('#comment_captcha').focus();
                }
                if (data == '') {
                    alert("РџСЂРѕРёР·РѕС€Р»Р° РѕС€РёР±РєР°!");
                }
            },
            error: function (data) {
                alert("РџСЂРѕРёР·РѕС€Р»Р° РѕС€РёР±РєР°!");
            }
        });
        return false;

    });

    //Р·Р°РєР°Р· РѕР±СЂР°С‚РЅРѕРіРѕ Р·РІРѕРЅРєР°
    $('#callback-link').click(function () {
        $('#callback-result').hide();
        $('#callback-form').show();
        $('#contact-popup').show();
    });
    $('#callback-close').click(function () {
        $('#contact-popup').hide();
    });

    $("#callback-send").click(function () {
        var rand = Math.random();
        var name = $('#callback-name').val().trim();
        var phone = $('#callback-phone').val().trim();
        var time = $('#callback-time').val().trim();
        if ((name == '') || (phone == '')) {
            alert('РРјСЏ Рё РЅРѕРјРµСЂ С‚РµР»РµС„РѕРЅР° РѕР±СЏР·Р°С‚РµР»СЊРЅС‹ РґР»СЏ Р·Р°РїРѕР»РЅРµРЅРёСЏ.')
            return false;
        }
        $('#callback-send').hide();
        $('#callback-preload').show();
        $.ajax({
            type: "GET",
            url: "/callback",
            data: {"name": name, "phone": phone, "time": time, "rand": rand},
            dataType: "html",
            success: function (data) {
                $('#callback-form').hide();
                $('#callback-result').show();
                $('#callback-form input[type=text]').val('');
                $('#callback-preload').hide();
                $('#callback-send').show();
            },
            error: function (data) {
                alert("РџСЂРѕРёР·РѕС€Р»Р° РѕС€РёР±РєР°!");
            }
        });
    });


});
function validateEmail(email) {
    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return reg.test(email);
}

function toggleCookies(cookieName, value) {

    var data;
    if ($.cookie(cookieName))
        data = $.cookie(cookieName).split(',');
    else
        data = new Array();

    if (!in_array(value, data)) {
        data.push(value);
    } else
        data = array_remove(value, data);
    domain = document.domain;
    var options = {domain: '.' + domain, path: '/'};

    options.expires = 30;

    $.cookie(cookieName, data.join(','), options);
}

function removeCookies(cookieName, value) {
    if ($.cookie(cookieName)) {
        var data = $.cookie(cookieName).split(',');
        data = array_remove(value, data);
        domain = document.domain;
        $.cookie(cookieName, data.length ? data.join(',') : '', {domain: '.' + domain, path: '/'});
    }
}

function in_array(needle, haystack) {
    for (var i in haystack)
        if (haystack[i] == needle)
            return true;
    return false;
}

function array_remove(needle, haystack) {
    var newData = new Array();

    for (var i in haystack)
        if (haystack[i] != needle)
            newData.push(haystack[i]);

    return newData;
}

//Р¤СѓРЅРєС†РёСЏ РґР»СЏ РІРµСЂСЃРёРё РЅР° РїРµС‡Р°С‚СЊ
function toprint(divId) {
    var atext = document.getElementById(divId).innerHTML;
    var head = document.getElementsByTagName("head")[0].innerHTML;
    var captext = window.document.title;
    var alink = window.document.location;
    var prwin = open('');
    prwin.document.open();
    prwin.document.writeln('<html><head>' + head + '<\/head><body style="background:white;"><div onselectstart="return false;" oncopy="return false;">');
    prwin.document.writeln('<div style="margin-bottom:5px;"><a href="javascript://" onclick="window.print();">РџРµС‡Р°С‚СЊ<\/a> вЂў <a href="javascript://" onclick="window.close();">Р—Р°РєСЂС‹С‚СЊ РѕРєРЅРѕ<\/a><\/div><hr>');
    prwin.document.writeln(atext);
    prwin.document.writeln('<div style="clear:both;"></div><div style="font-size:8pt;">РЎС‚СЂР°РЅРёС†Р° РјР°С‚РµСЂРёР°Р»Р°: ' + alink + '<\/div>');
    prwin.document.writeln('<\/div><\/body><\/html>');
    prwin.document.close();
}

