

<div class="vertical-menu" style="background: #a11c4b">

    <!-- LOGO -->
    <div class="navbar-brand-box" style="   box-shadow: -2px 6px 3px rgb(52 58 64 / 8%);">
        <a href="{{route('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/konteks-icon.png')}}" alt="" height="35">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/konteks-icon.png')}}" alt="" height="35">
            </span>

        </a>
    </div>



    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">


                {{-- ALL USER --}}
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="icon nav-icon" data-feather="trello"></i>
                        <span class="menu-item" data-key="t-sales">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('permohonan-registrasi')}}">
                        <i class="icon nav-icon" data-feather="trello"></i>
                        <span class="menu-item" data-key="t-sales">Permohonan Registrasi</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('permohonan')}}">
                        <i class="icon nav-icon" data-feather="trello"></i>
                        <span class="menu-item" data-key="t-sales">Permohonan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('approval-survey')}}">
                        <i class="icon nav-icon" data-feather="trello"></i>
                        <span class="menu-item" data-key="t-sales">Aproval dan Survey</span>
                    </a>
                </li>



                <li>
                    <a href="{{route('master-data.index')}}">
                        <i class="icon nav-icon" data-feather="trello"></i>
                        <span class="menu-item" data-key="t-sales">Master Data</span>
                    </a>
                </li>


                <li>
                    <a href="{{route('user.setting')}}">
                        <i class="icon nav-icon" data-feather="user"></i>
                        <span class="menu-item" data-key="t-sales">User Setting</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
