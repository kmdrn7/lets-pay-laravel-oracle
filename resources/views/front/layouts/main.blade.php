<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- Site Metas -->
    <title>LetsPay - Ayo Nabung dan Pakai Buat Bayar Apapun Semaumu</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <!-- <link rel="icon" href="{{ asset('src/front/images/fevicon/icon_purple.gif') }}" type="image/gif"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('src/front/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('src/front/css/style.css') }}">
    <!-- theme_preview -->
    <link rel="stylesheet" href="{{ asset('src/front/css/landing.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('src/front/css/responsive.css') }}">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{ asset('src/front/css/colors.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('src/front/css/custom.css') }}">
    <!-- Wow Animation CSS -->
    <link rel="stylesheet" href="{{ asset('src/front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('src/front/css/font-awesome.min.css') }}">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="purple_color">
    <div class="bg_load" style="z-index: 9999; display: none;">
        <div class="verticle-center">
            <img class="loader_animation" src="{{ asset('src/front/images/loaders/loader_1.png') }}" alt="#">
        </div>
    </div>
    <div id="wrapper">
       @include('front.layouts.sidebar')
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="banner_section">
                <div class="container">
                    <div class="priview_banner">
                        <h3 style="font-size: 50px">
                            <b>Lets</b>Pay</h3>
                        <p>Tabung uangmu dan gunakan untuk membayar apapun dan dimanapun dengan mudah</p>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery (necessary for Bootstrap's JavaScript) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('src/front/js/bootstrap.min.js') }}"></script>
    <!-- Menu JS -->
    <script src="{{ asset('src/front/js/menumaker.js') }}"></script>
    <!-- Wow Animation -->
    <script src="{{ asset('src/front/js/wow.js') }}"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript) -->
    <script src="{{ asset('src/front/js/custom.js') }}"></script>
    <!-- side bar menu -->
    <script>
        $(document).ready(function () {
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;
            trigger.click(function () {
                hamburger_cross();
            });

            function hamburger_cross() {
                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function () {
                $('#wrapper').toggleClass('toggled');
            });
        });
    </script>
    <!-- scroll to id -->
    <script>
        function scrollNav() {
            $('.nav a').click(function () {
                //Toggle Class
                $(".active").removeClass("active");
                $(this).closest('li').addClass("active");
                var theClass = $(this).attr("class");
                $('.' + theClass).parent('li').addClass('active');
                //Animate
                $('html, body').stop().animate({
                    scrollTop: $($(this).attr('href')).offset().top - 0
                }, 400);
                return false;
            });
            $('.scrollTop a').scrollTop();
        }
        scrollNav();
    </script>
</body>
</html>