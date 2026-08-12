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
      <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
      
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
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"> {{ Auth::user()->name }}</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt"></i> Logout
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
              <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i data-feather="users"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i data-feather="shield"></i>
                    <span>Roles</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                    <i data-feather="key"></i>
                    <span>Permissions</span>
                </a>
            </li>
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

              <a href="#" class="menu-toggle nav-link has-dropdown">

                  <i data-feather="home"></i>

                  <span>
                      Property Management
                  </span>

              </a>


              <ul class="dropdown-menu">

                  {{-- =====================================================
                      PROPERTY CATEGORIES
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('property-categories.*') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('property-categories.index') }}"
                      >

                          <i data-feather="layers"></i>

                          <span>
                              Property Categories
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      AMENITIES
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('amenities.*') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('amenities.index') }}"
                      >

                          <i data-feather="star"></i>

                          <span>
                              Amenities
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      COUNTRIES
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('countries.*') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('countries.index') }}"
                      >

                          <i data-feather="globe"></i>

                          <span>
                              Countries
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      STATES
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('states.*') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('states.index') }}"
                      >

                          <i data-feather="map"></i>

                          <span>
                              States
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      CITIES
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('cities.*') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('cities.index') }}"
                      >

                          <i data-feather="map-pin"></i>

                          <span>
                              Cities
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      AREAS
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('areas.*') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('areas.index') }}"
                      >

                          <i data-feather="navigation"></i>

                          <span>
                              Areas
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      PROPERTIES - ADMIN
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('properties.index')
                              || request()->routeIs('properties.create')
                              || request()->routeIs('properties.edit')
                              || request()->routeIs('properties.show')
                              ? 'active'
                              : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('properties.index') }}"
                      >

                          <i data-feather="home"></i>

                          <span>
                              Properties
                          </span>

                      </a>

                  </li>


                  {{-- =====================================================
                      GET PROPERTIES - BUYER SEARCH
                  ====================================================== --}}

                  <li class="{{ request()->routeIs('properties.search') ? 'active' : '' }}">

                      <a
                          class="nav-link"
                          href="{{ route('properties.search') }}"
                      >

                          <i data-feather="search"></i>

                          <span>
                              Get Properties
                          </span>

                      </a>

                  </li>

              </ul>

          </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other
                  Pages</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                <li><a class="nav-link" href="posts.html">Posts</a></li>
                <li><a class="nav-link" href="profile.html">Profile</a></li>
                <li><a class="nav-link" href="contact.html">Contact</a></li>
                <li><a class="nav-link" href="invoice.html">Invoice</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="chevrons-down"></i><span>Multilevel</span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Menu 1</a></li>
                <li class="dropdown">
                  <a href="#" class="has-dropdown">Menu 2</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Child Menu 1</a></li>
                    <li class="dropdown">
                      <a href="#" class="has-dropdown">Child Menu 2</a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Child Menu 1</a></li>
                        <li><a href="#">Child Menu 2</a></li>
                      </ul>
                    </li>
                    <li><a href="#"> Child Menu 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <main id="main" class="main-content">
            @yield('content')
      </main>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
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
    
    @stack('scripts')
    </body>
</html>