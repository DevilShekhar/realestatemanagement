<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <!-- Add this to your <head> section if SweetAlert is not included -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#"  data-toggle="dropdown"  class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if(Auth::user()->profile_photo)
                                <img  alt="Profile"  src="{{ asset('storage/' . Auth::user()->profile_photo) }}"  class="user-img-radious-style" >
                            @else
                                <img alt="Profile" src="{{ asset('assets/img/user.png') }}" class="user-img-radious-style"  >
                            @endif
                            <span class="d-sm-none d-lg-inline-block">
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">
                                {{ Auth::user()->name }}
                            </div>
                            <a href="{{ route('profile.index') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i>
                                Profile
                            </a>                       
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item has-icon text-danger border-0 bg-transparent w-100 text-start" >
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ url('dashboard') }}">
                            <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i>
                                <span>Dashboard</span></a>
                        </li>
                        @can('view users')
                            <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i data-feather="users"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                        @endcan
                        @can('view roles')
                            <li class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <i data-feather="shield"></i>
                                    <span>Roles</span>
                                </a>
                            </li>
                        @endcan
                        @can('view permissions')
                            <li class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                                <a href="{{ route('permissions.index') }}" class="nav-link">
                                    <i data-feather="key"></i>
                                    <span>Permissions</span>
                                </a>
                            </li>
                        @endcan
                        @can('view properties')
                                            <li class="dropdown
                                  {{ request()->routeIs('property-categories.*')
                            || request()->routeIs('amenities.*')
                            || request()->routeIs('countries.*')
                            || request()->routeIs('states.*')
                            || request()->routeIs('cities.*')
                            || request()->routeIs('areas.*')
                            || request()->routeIs('properties.*')
                            || request()->routeIs('properties.search')
                            ? 'active'
                            : '' }}">
                        @endcan

                            @can('view properties')
                                <a href="#" class="menu-toggle nav-link has-dropdown">

                                    <i data-feather="home"></i>

                                    <span>
                                        Property Management
                                    </span>

                                </a>
                            @endcan
                            <ul class="dropdown-menu">                               
                                @can('view categories property')
                                    <li class="{{ request()->routeIs('property-categories.*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('property-categories.index') }}">
                                            <i data-feather="layers"></i>
                                            <span>
                                                Property Categories
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view amenities')
                                    <li class="{{ request()->routeIs('amenities.*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('amenities.index') }}">
                                            <i data-feather="star"></i>
                                            <span>
                                                Amenities
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view countries')
                                    <li class="{{ request()->routeIs('countries.*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('countries.index') }}">
                                            <i data-feather="globe"></i>
                                            <span>
                                                Countries
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view states')
                                    <li class="{{ request()->routeIs('states.*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('states.index') }}">
                                            <i data-feather="map"></i>
                                            <span>
                                                States
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view cities')
                                    <li class="{{ request()->routeIs('cities.*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('cities.index') }}">
                                            <i data-feather="map-pin"></i>
                                            <span>
                                                Cities
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view areas')
                                    <li class="{{ request()->routeIs('areas.*') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('areas.index') }}">
                                            <i data-feather="navigation"></i>
                                            <span>
                                                Areas
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view property')
                                    <li class="{{ request()->routeIs('properties.index')
                                    || request()->routeIs('properties.create')
                                    || request()->routeIs('properties.edit')
                                    || request()->routeIs('properties.show')
                                    ? 'active'
                                    : '' }}">

                                        <a class="nav-link" href="{{ route('properties.index') }}">
                                            <i data-feather="home"></i>
                                                <span>Properties</span>
                                        </a>
                                    </li>
                                @endcan                               
                                @can('get search properties')
                                    <li class="{{ request()->routeIs('properties.search') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('properties.search') }}">
                                            <i data-feather="search"></i>
                                            <span>
                                                Get Properties
                                            </span>
                                        </a>
                                    </li>
                                @endcan     
                                @can('my enquiry')
                                    <li class="{{ request()->routeIs('my-enquiry') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('my-enquiry') }}">
                                            <i data-feather="mail"></i>
                                            <span>
                                                My Enquiries
                                            </span>
                                        </a>
                                    </li>
                                @endcan   
                                @can('sold out property')
                                    <li class="{{ request()->routeIs('properties.sold-out-property') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('properties.sold-out-property') }}">
                                            <i data-feather="check-circle"></i>
                                            <span>
                                                Sold Out Property
                                            </span>
                                        </a>
                                    </li>
                                @endcan                        
                            </ul>
                        </li>
                        @can('property enquiries listing')
                        <li class="{{ request()->routeIs('property-enquiries.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('property-enquiries.index') }}">
                                <i data-feather="message-circle"></i>
                                <span>Property Enquiries</span>
                            </a>
                        </li>
                        @endcan                    
                         @can('contact submissions')
                        <li class="{{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                            <a href="{{ route('contacts.index-list') }}" class="nav-link">
                                <i data-feather="message-square"></i>
                                <span>Contact Submissions</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <main id="main" class="main-content">
                @yield('content')
            </main>
            <footer class="main-footer">
                <div class="footer-left">
                    <div class="copyright-text">
                        <p>
                            © {{ date('Y') }} PropertyHub. All Rights Reserved.
                            <span class="copyright-separator">|</span>
                            Developed &amp; Marketed by
                            <a href="https://eternalhightech.com/" target="_blank" rel="noopener noreferrer">
                                Eternal HighTech
                            </a>
                        </p>
                    </div>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>
    <!-- General JS Files -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
    <!-- Template JS -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts')
</body>

</html>
