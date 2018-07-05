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
                <a href="{{ url('admin/dashboard') }}" class="waves-effect {{ $idh=='dashboard'?'active':'' }}">
                    <i class="fa fa-dashboard fa-fw" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('admin/nasabah') }}" class="waves-effect {{ $idh=='nasabah'?'active':'' }}">
                    <i class="fa fa-user-md fa-fw" aria-hidden="true"></i>
                    Nasabah
                </a>
            </li>
            <li>
                <a href="{{ url('admin/transaksi') }}" class="waves-effect {{ $idh=='transaksi'?'active':'' }}">
                    <i class="fa fa-money fa-fw" aria-hidden="true"></i>
                    Transaksi
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle waves-effect {{ $idh=='laporan'?'active':'' }}" data-toggle="collapse" data-target="#drop" role="button" aria-expanded="false">
                    <i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i>
                    Laporan <span class="caret"></span>
                </a>
                <ul class="nav collapse" id="drop">
                    <li><a href="{{ url('admin/laporan-nasabah') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Nasabah</a></li>
                    <li><a href="{{ url('admin/laporan-admin') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Admin</a></li>
                    <li><a href="{{ url('admin/laporan-transaksi-bank') }}"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; Transaksi Bank</a></li>
                    <li><a href="{{ url('admin/laporan-transaksi-lpc') }}"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; Transaksi LPC</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('admin/logout') }}" class="waves-effect">
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