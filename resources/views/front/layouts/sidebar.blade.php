 <!-- Sidebar -->
 <nav class="navbar navbar-inverse navbar-fixed-top nav" id="sidebar-wrapper">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('src/front/images/logos/logo_purple.png') }}" alt="#">
        </a>
    </div>
    <ul class="nav sidebar-nav">
        <li class="{{ $idh=='dashboard'?'active':'' }}">
            <a id="link1" class="nav-section1" href="{{ url('dashboard') }}">
                <i class="fa fa-circle-o" aria-hidden="true"></i>
                <i class="fa fa-circle" aria-hidden="true"></i> Dashboard
            </a>
        </li>
        <li class="{{ $idh=='bayar'?'active':'' }}">
            <a id="link4" class="nav-section4" href="{{ url('bayar') }}">
                <i class="fa fa-circle-o" aria-hidden="true"></i>
                <i class="fa fa-circle" aria-hidden="true"></i> Bayar
            </a>
        </li>
        <li class="{{ $idh=='profil'?'active':'' }}">
            <a id="link2" class="nav-section2" href="{{ url('profil') }}">
                <i class="fa fa-circle-o" aria-hidden="true"></i>
                <i class="fa fa-circle" aria-hidden="true"></i> Profil
            </a>
        </li>
        <li>
            <a id="link3" class="nav-section3" href="{{ url('logout') }}">
                <i class="fa fa-circle-o" aria-hidden="true"></i>
                <i class="fa fa-circle" aria-hidden="true"></i> Logout
            </a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->