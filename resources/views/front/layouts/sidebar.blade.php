<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href="{{ url('dashboard') }}" class="waves-effect {{ $idh=='dashboard'?'active':'' }}">
                    <i class="fa fa-dashboard fa-fw" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('histori-transaksi') }}" class="waves-effect {{ $idh=='nasabah'?'active':'' }}">
                    <i class="fa fa-history fa-fw" aria-hidden="true"></i>
                    Histori Transaksi
                </a>
            </li>
            <li>
                <a href="{{ url('transfer') }}" class="waves-effect {{ $idh=='transfer'?'active':'' }}">
                    <i class="fa fa-google-wallet fa-fw" aria-hidden="true"></i>
                    Transfer
                </a>
            </li>
            <li>
                <a href="{{ url('buat-pembayaran') }}" class="waves-effect {{ $idh=='buat-pembayaran'?'active':'' }}">
                    <i class="fa fa-list-alt fa-fw" aria-hidden="true"></i>
                    Buat Pembayaran
                </a>
            </li>
            <li>
                <a href="{{ url('bayar') }}" class="waves-effect {{ $idh=='bayar'?'active':'' }}">
                    <i class="fa fa-money fa-fw" aria-hidden="true"></i>
                    Bayar
                </a>
            </li>
            <li>
                <a href="{{ url('profil') }}" class="waves-effect {{ $idh=='profil'?'active':'' }}">
                    <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                    Profil
                </a>
            </li>
            <li>
                <a href="{{ url('logout') }}" class="waves-effect">
                    <i class="fa fa-lock fa-fw" aria-hidden="true"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->