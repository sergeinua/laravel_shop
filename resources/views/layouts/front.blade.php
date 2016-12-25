<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Пряжа для вязания - купить пряжу в интернет магазине оптом</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="пряжа для вязания, купить, оптом, склад, пряжа, пряжа в москве, интернет магазин пряжи, магазины пряжи в москвеПряжа для вязания - купить пряжу в интернет магазине оптомПряжа для вязания - купить пряжу в интернет магазине оптом">
    <meta name="description"
          content="Купить пряжу в интернет магазине оптом. Доставка по России, самовывоз. Оптовый склад в Москве.Пряжа для вязания - купить пряжу в интернет магазине оптомПряжа для вязания - купить пряжу в интернет магазине оптом">
    <link rel="stylesheet" type="text/css" href="/css/fancybox.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/fancybox.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/main1.css" type="text/css">
    <link rel="stylesheet" href="/css/filter.css" type="text/css">
    <link rel="stylesheet" href="/css/grid.css" type="text/css">
    <link rel="stylesheet" href="/css/gallery.css" type="text/css">
    <link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css">
    <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.css" type="text/css">
    <script type="text/javascript" src="/js/jquery.slicknav.min.js"></script>
    <script type="text/javascript" src="/js/prettyphoto.js"></script>
    <script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="/js/slider.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/compare.js"></script>
    <script type="text/javascript" src="/js/ultimate.js"></script>
    <script type="text/javascript" src="/js/jquery.tinycarousel.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.js"></script>

    <link type="image/ico" href="/favicon.ico" rel="shortcut icon">
</head>
<body>
<div id="header" class="container">
    <div class="main_menu clearfix">

        @include('site.menu-top')

        <div id="search">
            <form action="/poisk-po-katalogu" method="get">
                <input value="" name="query" style="display: inline-block;" type="text">
                <input name="" value="Поиск" class="button" style="display: inline-block;" type="submit">
            </form>
        </div>
        <div class="reg">
            <a href="#" id="callback-link">Войти
            </a>
            <div style="display:none;" id="contact-popup" class="popupPhone"><a href="#" id="callback-link">
                </a>
                <div class="callback-wrap"><a href="#" id="callback-link">
                    </a>
                    <div class="callback-wrap"><a href="#" id="callback-link">
                        </a><a class="callback-close" id="callback-close"><img src="/images/close.png"
                                                                               alt="закрыть"></a>

                        <form action="/registraciya/login" method="post">
                            <table border="0">
                                <tbody>
                                <tr>

                                    <td><input id="auth-user" class="pl" name="data[User][username]" placeholder="Логин"
                                               type="text"></td>
                                </tr>
                                <tr>

                                    <td><input id="auth-pass" class="pl" name="data[User][password]"
                                               placeholder="Пароль" type="password"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <br><a href="/registraciya/password" style="color:#626262; font-size:10px;">Забыли
                                            пароль</a></td>
                                    <td><input value="Войти" style="float:right;" type="submit"></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <a style="float:right;" href="/registraciya">Регистрация</a></div>
    </div>
    <div class="mobileNav">
        <div class="slicknav_menu"><a href="#" aria-haspopup="true" tabindex="0" class="slicknav_btn slicknav_collapsed"
                                      style="outline: medium none;"><span class="slicknav_menutxt"></span><span
                        class="slicknav_icon slicknav_no-text"><span class="slicknav_icon-bar"></span><span
                            class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a>
            <ul class="slicknav_nav slicknav_hidden" aria-hidden="true" style="display: none;" role="menu">
                <li><a class="act" role="menuitem" tabindex="-1">ГЛАВНАЯ</a></li>
                <li><a href="/galereya" role="menuitem" tabindex="-1">ГАЛЕРЕЯ</a></li>
                <li><a href="/opt" role="menuitem" tabindex="-1">ОПТ</a></li>
                <li><a href="/dostavka" role="menuitem" tabindex="-1">ДОСТАВКА</a></li>
                <li><a href="/oplata" role="menuitem" tabindex="-1">ОПЛАТА</a></li>
                <li><a href="/contacts" role="menuitem" tabindex="-1">КОНТАКТЫ </a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="header-middle clearfix">
        <a id="logo"><img src="/img/logo.jpg" alt="logo" width="200"></a>
        <div class="block_soc">
            <div class="phobes">

                @foreach ($tel_nums as $tel_num)

                    <p><a hef="tel:{{ $tel_num }}">{{ $tel_num }}</a></p>

                @endforeach

            </div>
            <div class="soc_m">
                <div>
                    <div id="SkypeButton_Call_pryaja-opt-parswool_1">
                        <a href="skype:{{ $skype_id }}"><img style="height: 20px" src="/img/social/skype.png"></a>
                    </div>
                </div>

                @include('site.social-links')

            </div>
        </div>
        <div id="top-panel">
            <div id="shop-cart">
                <span id="shop-cart-currency" name="руб" course="1" decimals="0" dsep="." tsep="&nbsp;"></span>
                <span class="cart-isnotempty" style="display: none;">
									<a href="/korzina">
										КОРЗИНА:<br> <small>(<span class="cart-count"><span class="mini-cart-count"
                                                                                            data-count="">0</span>&nbsp;товаров</span>
										на сумму <span class="cart-price" data-price="">0&nbsp;руб</span>)</small>
									</a>
								</span>
                <span class="cart-isempty">
									КОРЗИНА:<br>
									<small>(пусто)</small>
								</span>
            </div>
        </div>
    </div>
    <div class="b-header-bottom clearfix">
        <div class="subscribe-block-layout">
            <div id="subscribe-block">
                <div class="clearfix b-subscribe-block">
                    <div class="b-subscribe-inpt">
                        <input id="subscribe_email" class="pl" name="email" placeholder="E-mail">
                    </div>
                    <div class="b-subscribe-btn">
                        <input id="subscribe_button" value="Подписаться" class="button" type="submit">
                    </div>
                </div>
                <p id="subscribe_success">Вы добавлены в рассылку</p>
                <p id="subscribe_error"></p>
            </div>
        </div>
        <p class="b-subscribe-text">Узнавать о новых поступлениях пряжи и выгодных предложениях</p>
    </div>
</div>
<div class="categ_menu">
    <div class="services-menu container">
        <ul class="level1 clearfix">

            @foreach($categories as $category)

                <li class="">
                    <a href="/catalog/{{ $category->slug }}">
                        <img src="/img/catalog/cats/{{ $category->slug }}.jpg" alt=""
                             title="{{ $category->name }}" class="b-img">
                    </a>
                </li>

            @endforeach

        </ul>
    </div>
    <div style="clear:both;"></div>
</div>
<div id="main">
    <div class="container">
        <div class="row mobile-marg">
            <div class="col-sm-8 ss_block hidden-xs">
                <div class="bxslider">
                    <li>
                        <img src="/img/slider/1.jpg">
                    </li>
                    <li>
                        <img src="/img/slider/2.jpg">
                    </li>
                </div>
            </div>
            <div class="col-sm-4 b_block">
                <div class="banner-1">
                    <div class="banner">
                        <a href="http://www.parswool.ru/katalog/yarnart/christmas" target="_blank">
                            <img src="http://parswool.ru/images/b/000/000006/237-sdc15694.jpg" alt="" width="320">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div>
    <div class="main_bl">
        <div class="container">
            <div class="row">
                <div class="left-col col-sm-3">
                    <div class="left_cat">
                        <div class="h2">Наша продукция</div>

                        @include('site.menu-left')

                    </div>
                    <div class="banner2"></div>
                </div>
                <div id="right-col" class="col-sm-9">

                    @yield('main-content')

                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div>
</div>
<div id="footer">
    <div class="container">
        <div id="copy">
            © <?= date('Y'); ?> «ParsWool».
        </div>
        <a rel="nofollow" href="http://prosto-sait.ru/" id="ilike">Разработка сайта - Просто Сайт</a>
    </div>
</div>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=RsxPYni5vHMFONNNXKVOoyXo9V4Ow6R6Dr1ErgltjxgYq1XsbkuZbHoDnx/UNwf3tgnWYWH4dTquGFsiNg26Zi6znx6FjmxBK190e5nBJLrpRZg4CqsbFztsK6saoQoSDnMwZTxlbK8cN4aVdrbhe/vWCyyxxdmKxPclWZMV5gQ-&pixel_id=1000014142';</script>
<!-- VK Widget -->
<div id="vk_community_messages"></div>
<!-- VK Widget -->
<div id="vk_community_messages"></div>

<div id="fancybox-tmp"></div>
<div id="fancybox-loading">
    <div></div>
</div>
<div id="fancybox-overlay"></div>
<div id="fancybox-wrap">
    <div id="fancybox-outer">
        <div class="fancybox-bg" id="fancybox-bg-n"></div>
        <div class="fancybox-bg" id="fancybox-bg-ne"></div>
        <div class="fancybox-bg" id="fancybox-bg-e"></div>
        <div class="fancybox-bg" id="fancybox-bg-se"></div>
        <div class="fancybox-bg" id="fancybox-bg-s"></div>
        <div class="fancybox-bg" id="fancybox-bg-sw"></div>
        <div class="fancybox-bg" id="fancybox-bg-w"></div>
        <div class="fancybox-bg" id="fancybox-bg-nw"></div>
        <div id="fancybox-content"></div>
        <a id="fancybox-close"></a>
        <div id="fancybox-title"></div>
        <a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a
                href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({auto:true});
    });
</script>
</body>
</html>