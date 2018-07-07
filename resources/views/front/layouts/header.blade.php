<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="{{ url('dashboard') }}">
                <!-- Logo icon image, you can use font-icon also -->
                <b>
                    {{-- <!--This is dark logo icon-->
                    <img src="{{ asset('src/back/img/admin-logo.png') }}" alt="home" class="dark-logo" />
                    <!--This is light logo icon-->
                    <img src="{{ asset('src/back/img/admin-logo-dark.png') }}" alt="home" class="light-logo" /> --}}
                    <h3><b> | Letspay <small>Client</small></b></h3>
                </b>
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs">
                    {{-- <h3>LetsPayAdmin</h3> --}}
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left pull-left">
            <li>
                <div class="sliderMenu" onclick="sld(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </li>
        </ul>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <a class="profile-pic" href="javascript:void()">
                    <img src="{{ 'https://www.gravatar.com/avatar/'.md5(strtolower(trim(Auth::user()->email))).'&d=retro&s=40&f=y' }}" alt="user-img" width="36" class="img-circle">
                    <b class="hidden-xs">{{ Auth::check()?Auth::user()->nama:'' }}</b>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<style>
    .sliderMenu {
        display: inline-block;
        cursor: pointer;
        margin-top: 10px;
        margin-left: 20px;
    }

    .bar1, .bar2, .bar3 {
        width: 35px;
        height: 5px;
        background-color: #fff;
        margin: 6px 0;
        transition: 0.4s;
    }

    /* Rotate first bar */
    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-9px, 6px) ;
        transform: rotate(-45deg) translate(-9px, 6px) ;
    }

    /* Fade out the second bar */
    .change .bar2 {
        opacity: 0;
    }

    /* Rotate last bar */
    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-8px, -8px) ;
        transform: rotate(45deg) translate(-8px, -8px) ;
    }
</style>
<script>
    function sld(x) {
        x.classList.toggle("change");
        if($(x).hasClass('change')){
            $('.sidebar').animate({
                left: 0
            }, 300);
        } else {
            $('.sidebar').animate({
                left: -240
            }, 200);
        }
    }
</script>
<!-- End Top Navigation -->