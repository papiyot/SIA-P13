<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="javascript:void(0)">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">SIA</span>-<span class="font-size-xl text-primary">P13</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('assets/media/avatars/avatar0.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase">183210011-Ichsan</a>
                    </li>
                </ul>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase">183210013-Luluk</a>
                    </li>
                </ul>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="link-effect text-dual-primary-dark"><i class="si si-logout"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{ route('home') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Home</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Input & Output</span></li>

                <li>
                    <a href="{{ route('master',['bahanbaku']) }}"><i class="fa fa-inbox"></i><span class="sidebar-mini-hide">Bahan Baku</span></a>
                    <a href="{{ route('master',['pemasok']) }}"><i class="fa fa-cube"></i><span class="sidebar-mini-hide">Pemasok</span></a>
                    <a href="{{ route('master',['beli']) }}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Beli</span></a>
                    <a href="{{ route('master',['beli_detail']) }}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Beli Detail</span></a>
                    <a href="{{ route('master',['beli_bayar']) }}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Beli Bayar</span></a>
                    <a href="{{ route('master',['produk']) }}"><i class="fa fa-cube"></i><span class="sidebar-mini-hide">Produk</span></a>
                    <a href="{{ route('master',['produk_detail']) }}"><i class="fa fa-cube"></i><span class="sidebar-mini-hide">Produk Detail</span></a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
