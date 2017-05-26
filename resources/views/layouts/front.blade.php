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
    <link rel="stylesheet" href="/css/main1.css" type="text/css">
    <link rel="stylesheet" href="/css/filter.css" type="text/css">
    <link rel="stylesheet" href="/css/grid.css" type="text/css">
    <link rel="stylesheet" href="/css/gallery.css" type="text/css">
    <link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css">
    <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.css" type="text/css">
    <link type="image/gif" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.7/images/bx_loader.gif" rel="shortcut icon">
    <link type="image/png" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.7/images/controls.png" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.7/jquery.bxslider.css" type="text/css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.7/jquery.bxslider.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.7/vendor/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.7/vendor/jquery.fitvids.js"></script>
    <link type="image/ico" href="/favicon.ico" rel="shortcut icon">
</head>
<body>
<div id="header" class="container">
    <div class="main_menu clearfix">

        @include('site.menu-top')

        <div id="search">
            <form action="/search" method="get">
                <input value="" name="query" style="display: inline-block;" type="text">
                <input name="" value="Поиск" class="button" style="display: inline-block;" type="submit">
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="header-middle clearfix">
        <a id="logo" href="/">
            <img src="/img/logo.jpg" alt="logo" width="200">
        </a>
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
            @include('cart.cart')
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
                        <img src="/img/catalog/{{ $category->img }}" alt=""
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
        @if($show_slider)
        <div class="row mobile-marg">
            <div class="col-xs12 ss_block hidden-xs">
                {{--slider not finished here--}}
                    <div class="bxslider">
                        <li>
                            <img src="/img/slider/1.jpg">
                        </li>
                        <li>
                            <img src="/img/slider/2.jpg">
                        </li>
                    </div>
            </div>
        </div>
        @endif
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
            © <?= date('Y'); ?> «KakadU».
        </div>
    </div>
</div>
{{--<div id="fancybox-tmp"></div>--}}
{{--<div id="fancybox-loading">--}}
    {{--<div></div>--}}
{{--</div>--}}
{{--<div id="fancybox-overlay"></div>--}}
{{--<div id="fancybox-wrap">--}}
    {{--<div id="fancybox-outer">--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-n"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-ne"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-e"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-se"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-s"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-sw"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-w"></div>--}}
        {{--<div class="fancybox-bg" id="fancybox-bg-nw"></div>--}}
        {{--<div id="fancybox-content"></div>--}}
        {{--<a id="fancybox-close"></a>--}}
        {{--<div id="fancybox-title"></div>--}}
        {{--<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a--}}
                {{--href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>--}}
    {{--</div>--}}
{{--</div>--}}
@if($show_slider)
<script>
    $(document).ready(function(){
        var slider = $('.bxslider').bxSlider({auto:true});
        $(window).resize(function () {
            slider.reloadSlider();
        })
    });
</script>
@endif
</body>
</html>