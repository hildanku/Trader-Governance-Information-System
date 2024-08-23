<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
       <!--- <img src="/front/dist/assets/images/logo.svg" alt="" srcset=""> -->
        <a href="/"><h4 style="font-weight: bold">Trade Governance Information System</h4></a>
    </div>
    {{-- @if(auth()->check() && auth()->user()->hasRole('operator')) --}}
    @if(Auth::guard('web')->check())
    <div class="sidebar-menu">
        <ul class="menu">
            <li class='sidebar-title'>Main Menu</li>
            <li class="sidebar-item active ">
                <a href="/operator/dashboard" class='sidebar-link'>
                    <i data-feather="home" width="20"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/operator/users" class='sidebar-link'>
                    <i data-feather="users" width="20"></i> 
                    <span>Users Management</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/operator/areas" class='sidebar-link'>
                    <i data-feather="map" width="20"></i> 
                    <span>Areas Management</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/operator/locations" class='sidebar-link'>
                    <i data-feather="map-pin" width="20"></i> 
                    <span>Location Management</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/operator/submissions" class='sidebar-link'>
                    <i data-feather="mail" width="20"></i> 
                    <span>Submission Management</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/operator/permits" class='sidebar-link'>
                    <i data-feather="check-square" width="20"></i> 
                    <span>Permits Management</span>
                </a>
            </li>
        </ul>
    </div>
    @elseif(Auth::guard('userCred')->check())
    <div class="sidebar-menu">
        <ul class="menu">
            <li class='sidebar-title'>Main Menu</li>
            <li class="sidebar-item active ">
                <a href="/trader/dashboard" class='sidebar-link'>
                    <i data-feather="home" width="20"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/trader/business" class='sidebar-link'>
                    <i data-feather="users" width="20"></i> 
                    <span>Business Management</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/trader/submissions" class='sidebar-link'>
                    <i data-feather="mail" width="20"></i> 
                    <span>Submission Management</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/pages/locations" class='sidebar-link'>
                    <i data-feather="map-pin" width="20"></i> 
                    <span>Check Availability Location</span>
                </a>
            </li>
        </ul>
    </div>
    @else
    <div class="sidebar-menu">
        <ul class="menu">
            <li class='sidebar-title'>Menu Utama</li>
            <li class="sidebar-item active ">
                <a href="/home" class='sidebar-link'>
                    <i data-feather="home" width="20"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="users" width="20"></i> 
                    <span>Account</span>
                </a>
                <ul class="submenu ">
                    <li>
                        <a href="/trader/register">Registration</a>
                    </li>
                    <li>
                        <a href="/device">Login</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  ">
                <a href="/pages/locations" class='sidebar-link'>
                    <i data-feather="map-pin" width="20"></i> 
                    <span>Check location availability</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="/pages/about" class='sidebar-link'>
                    <i data-feather="info" width="20"></i> 
                    <span>About Us</span>
                </a>
            </li>
        </ul>
    </div>
    @endif
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{ asset ('/_voler/dist/assets/images/avatar/avatar-s-1.png') }}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Operator!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route ('logout') }}"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
<div class="main-content container-fluid">