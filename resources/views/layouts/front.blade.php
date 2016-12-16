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
    <script type="text/javascript" src="/js/jquery.slicknav.min.js"></script>
    <script type="text/javascript" src="/js/prettyphoto.js"></script>
    <script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="/js/slider.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/compare.js"></script>
    <script type="text/javascript" src="/js/ultimate.js"></script>
    <script type="text/javascript" src="/js/jquery.tinycarousel.js"></script>
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
            <li class=" ">
                <a href="/katalog/novyj">
                    <img src="/images/catalog_category/000/000108/832-5555555.crop-147x90.ed81694eb3.png" alt="НОВЫЙ"
                         title="НОВЫЙ" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/parswool">
                    <img src="/images/catalog_category/000/000110/204-logo-final-finawhite-l.crop-147x90.3d3fe991d9.jpg"
                         alt="PARSWOOL" title="PARSWOOL" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/snako-turciya">
                    <img src="/images/catalog_category/000/000100/554-nako.crop-147x90.985e1cae29.png" alt="NAKO Турция"
                         title="NAKO Турция" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/alize">
                    <img src="/images/catalog_category/000/000084/785-alize.crop-147x90.84bbee8879.jpg" alt="ALIZE"
                         title="ALIZE" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/kartopu">
                    <img src="/images/catalog_category/000/000105/490-kartopu.crop-147x90.9ca53e29b8.jpg" alt="KARTOPU"
                         title="KARTOPU" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/gazzal">
                    <img src="/images/catalog_category/000/000086/974-gazzal.crop-147x90.5d761b8238.jpg" alt="GAZZAL"
                         title="GAZZAL" class="b-img">
                </a>
            </li>
            <li class=" brandLast">
                <a href="/katalog/yarnart">
                    <img src="/images/catalog_category/000/000085/364-yarnart.crop-147x90.0b5884e347.jpg" alt="YARNART"
                         title="YARNART" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/lanoso">
                    <img src="/images/catalog_category/000/000107/880-lanoso_logo.crop-147x90.41b19c2129.jpg"
                         alt="LANOSO" title="LANOSO" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/pexorka">
                    <img src="/images/catalog_category/000/000093/755-pehorka.crop-147x90.116dbbc062.jpg" alt="ПЕХОРКА"
                         title="ПЕХОРКА" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/troickaya">
                    <img src="/images/catalog_category/000/000089/642-troickja.crop-147x90.59a449ddce.jpg"
                         alt="ТРОИЦКАЯ" title="ТРОИЦКАЯ" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/kamteks">
                    <img src="/images/catalog_category/000/000094/815-7551789.crop-147x90.1fe15f1dce.jpg" alt="КАМТЕКС"
                         title="КАМТЕКС" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/nako">
                    <img src="/images/catalog_category/000/000088/432-nako-logo.crop-147x90.63e13cd6ac.gif" alt="NAKO"
                         title="NAKO" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/vita-fancy">
                    <img src="/images/catalog_category/000/000106/798-vita-fancy-logo4.crop-147x90.50a40d10f2.gif"
                         alt="VITA FANCY" title="VITA FANCY" class="b-img">
                </a>
            </li>
            <li class=" brandLast">
                <a href="/katalog/vita">
                    <img src="/images/catalog_category/000/000095/654-vita.crop-147x90.8dedfbeb8c.jpg" alt="VITA"
                         title="VITA" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/vita-cotton">
                    <img src="/images/catalog_category/000/000096/259-vitac.crop-147x90.9712936106.jpg"
                         alt="VITA COTTON" title="VITA COTTON" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/semyonovskaya">
                    <img src="/images/catalog_category/000/000091/591-sempryaga9.crop-147x90.5ffc34aea7.jpg"
                         alt="СЕМЁНОВСКАЯ" title="СЕМЁНОВСКАЯ" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/lama-ural">
                    <img src="/images/catalog_category/000/000099/795-lama.crop-147x90.f9196a658c.jpg" alt="ЛАМА УРАЛ"
                         title="ЛАМА УРАЛ" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/vesovaya-pryazha">
                    <img src="/images/catalog_category/000/000101/119-vesovaja-prjazha.crop-147x90.820d951d85.jpg"
                         alt="Весовая пряжа" title="Весовая пряжа" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/klubochnaya-pryazha">
                    <img src="/images/catalog_category/000/000103/781-klybochnaja-prjazha.crop-147x90.c73161c903.jpg"
                         alt="Клубочная пряжа" title="Клубочная пряжа" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/tabletka">
                    <img src="/images/catalog_category/000/000090/250-606-ovechya.crop-147x90.bbfa7b5245.jpg"
                         alt="ТАБЛЕТКА овечья шерсть" title="ТАБЛЕТКА овечья шерсть" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/kombinat-kirova">
                    <img src="/images/catalog_category/000/000098/709-5555555.crop-147x90.082f34ab21.jpg"
                         alt="Комбинат Кирова" title="Комбинат Кирова" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/magic">
                    <img src="/images/catalog_category/000/000087/930-logo999.crop-147x90.2eca6c54b2.jpg" alt="MAGIC"
                         title="MAGIC" class="b-img">
                </a>
            </li>
            <li class=" ">
                <a href="/katalog/raspradazha">
                    <img src="/images/catalog_category/000/000109/784-raspradazha.crop-147x90.d1654cca53.png"
                         alt="РАСПРОДАЖА" title="РАСПРОДАЖА" class="b-img">
                </a>
            </li>
        </ul>

    </div>
    <div style="clear:both;"></div>
</div>
<div id="main">
    <div class="container">
        <div class="row mobile-marg">
            <div class="col-sm-8 ss_block hidden-xs">
                <div class="slider_block">
                    <div id="slider" class="nivoSlider">

                        <a href="http://parswool.ru/katalog/parswool/maccheroni-art" class="nivo-imageLink"
                           style="display: none;">
                            <img src="/images/slideshow/000/000034/174-maccheroni-art.crop-870x370.13b6b2c091.jpg"
                                 alt="" title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <a href="http://parswool.ru/katalog/snako-turciya/ombre" class="nivo-imageLink"
                           style="display: none;">
                            <img src="/images/slideshow/000/000036/496-ombre_2_rusca.crop-870x370.dad27c69d9.jpg" alt=""
                                 title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <a href="http://parswool.ru/katalog/snako-turciya/super-inci-hit-jakar" class="nivo-imageLink"
                           style="display: none;">
                            <img src="/images/slideshow/000/000037/564-s_i_hit_jakar-rus.crop-870x370.0a7457e353.jpg"
                                 alt="" title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <a href="http://parswool.ru/katalog/snako-turciya/paris" class="nivo-imageLink"
                           style="display: none;">
                            <img src="/images/slideshow/000/000035/893-paris_3_rusca.crop-870x370.f174473020.jpg" alt=""
                                 title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <a href="http://www.parswool.ru/katalog/gazzal" class="nivo-imageLink" style="display: block;">
                            <img src="/images/slideshow/000/000031/685-slider03.crop-870x370.b8398d0f47.jpg" alt=""
                                 title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <a href="http://parswool.ru/katalog/alize/superlana-tig" class="nivo-imageLink"
                           style="display: block;">
                            <img src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg" alt=""
                                 title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <a href=" http://www.parswool.ru/katalog/snako-turciya/vizon-anatoliya" class="nivo-imageLink"
                           style="display: none;">
                            <img src="/images/slideshow/000/000005/288-10968572_10152936913367034_2421095525958878331_n.crop-870x370.88f6303674.jpg"
                                 alt="" title="" style="width: 770px; visibility: hidden;">
                        </a>
                        <img class="nivo-main-image"
                             src="/images/slideshow/000/000031/685-slider03.crop-870x370.b8398d0f47.jpg"
                             style="display: inline; height: 327px; width: 770px;">
                        <div class="nivo-caption"></div>
                        <div class="nivo-slice" name="0"
                             style="left: 0px; width: 770px; height: 327px; opacity: 0.672321; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-0px;">
                        </div>
                        <div class="nivo-slice" name="1"
                             style="left: 51px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-51px;">
                        </div>
                        <div class="nivo-slice" name="2"
                             style="left: 102px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-102px;">
                        </div>
                        <div class="nivo-slice" name="3"
                             style="left: 153px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-153px;">
                        </div>
                        <div class="nivo-slice" name="4"
                             style="left: 204px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-204px;">
                        </div>
                        <div class="nivo-slice" name="5"
                             style="left: 255px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-255px;">
                        </div>
                        <div class="nivo-slice" name="6"
                             style="left: 306px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-306px;">
                        </div>
                        <div class="nivo-slice" name="7"
                             style="left: 357px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-357px;">
                        </div>
                        <div class="nivo-slice" name="8"
                             style="left: 408px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-408px;">
                        </div>
                        <div class="nivo-slice" name="9"
                             style="left: 459px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-459px;">
                        </div>
                        <div class="nivo-slice" name="10"
                             style="left: 510px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-510px;">
                        </div>
                        <div class="nivo-slice" name="11"
                             style="left: 561px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-561px;">
                        </div>
                        <div class="nivo-slice" name="12"
                             style="left: 612px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-612px;">
                        </div>
                        <div class="nivo-slice" name="13"
                             style="left: 663px; width: 51px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-663px;">
                        </div>
                        <div class="nivo-slice" name="14"
                             style="left: 714px; width: 56px; height: 327px; opacity: 0; overflow: hidden;"><img
                                    src="/images/slideshow/000/000029/274-untitled.crop-870x370.2b76163243.jpg"
                                    style="position:absolute; width:770px; height:auto; display:block !important; top:0; left:-714px;">
                        </div>
                    </div>
                    <div class="nivo-controlNav"><a class="nivo-control" rel="0">1</a><a class="nivo-control"
                                                                                         rel="1">2</a><a
                                class="nivo-control" rel="2">3</a><a class="nivo-control" rel="3">4</a><a
                                class="nivo-control" rel="4">5</a><a class="nivo-control active" rel="5">6</a><a
                                class="nivo-control" rel="6">7</a></div>
                </div>
            </div>
            <div class="col-sm-4 b_block">
                <div class="banner-1">

                    <div class="banner"><a href="http://www.parswool.ru/katalog/yarnart/christmas" target="_blank"><img
                                    src="http://parswool.ru/images/b/000/000006/237-sdc15694.jpg" alt=""
                                    width="320"></a></div>
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
</body>
</html>