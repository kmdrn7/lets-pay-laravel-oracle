<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="{{ url('admin/dashboard') }}">
                <!-- Logo icon image, you can use font-icon also --><b>
                <!--This is dark logo icon--><img src="{{ asset('src/back/img/admin-logo.png') }}" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="{{ asset('src/back/img/admin-logo-dark.png') }}" alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                <!--This is dark logo text--><img src="{{ asset('src/back/img/admin-text.png') }}" alt="home" class="dark-logo" /><!--This is light logo text--><img src="{{ asset('src/back/img/admin-text-dark.png') }}" alt="home" class="light-logo" />
                </span> </a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <a class="profile-pic" href="javscript:void">
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
<!-- End Top Navigation -->