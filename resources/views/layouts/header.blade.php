<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!-- Image Logo -->
                <a href="https://pis.sch.id" class="logo">
                    <img src="{{asset('assets/images/logo-left.png')}}" alt="" height="22" class="logo-small">
                    <img src="{{asset('assets/images/logo-left.png')}}" alt="" height="25" class="logo-large">
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">
                    
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link  arrow-none waves-effect nav-user" href="https://pis.sch.id" role="button"
                           aria-haspopup="false" aria-expanded="false" target="blank">
                           <span class="fw-bold  mr-2">Perpustakaan</span>
                            <img src="{{asset('assets/images/logo-pavicon.png')}}" alt="user" class="rounded-circle">
                        </a>
                    </li>


                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="/"><i class="mdi mdi-airplay"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-layers"></i>Anggota</a>
                        <ul class="submenu">
                            <li><a href="{{route('anggota.index')}}">Siswa</a></li>
                            <li><a href="{{route('anggota-pegawai.index')}}">Pegawai</a></li>
                            <li><a href="{{route('anggota.trashed')}}">Trashed</a></li>
                            {{-- <li><a href="{{route('anggota.card')}}">Kartu</a></li> --}}
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-layers"></i>Kunjungan</a>
                        <ul class="submenu">
                            <li><a href="{{route('kunjungan.index')}}">Kunjungan</a></li>
                            <li><a href="{{route('kunjungan.daftar')}}">Daftar Kunjungan</a></li>
                        </ul>
                    </li>

                   
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
