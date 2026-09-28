<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Admin Dashboard</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    <link rel="stylesheet" href="{{asset('assets/css/admincss.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/tooplate-style.css')}}">
    <style>
    
    </style>
  
</head>
<body>

    <!-- Top Fixed Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: var(--bg-custom-nav);">
        <div class="container-fluid">
            <!-- Mobile Toggle Menu Button -->
            <button class="navbar-toggler me-2 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fw-bold px-3" href="#">Victoria Elite</a>
            
              <div class="me-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="{{ route('index') }}">
                            <i class="bi bi-house-door-fill me-1"></i> Home
                        </a>
                    </li>
                </ul>
            </div>

             <!-- Search Bar inside Navbar (Centered/Expanded Flex) -->
            <form class="d-flex mx-auto w-100 me-2" style="max-width: 300px;" role="search">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-transparent border-secondary text-secondary"><i class="bi bi-search"></i></span>
                    <input class="form-control navbar-search border-secondary" type="search" placeholder="Search everything..." aria-label="Search">
                </div>
            </form>
            
            <!-- Right Aligned Navbar Icons Section -->
            <div class="d-flex align-items-center ms-auto gap-3">
    
    <!-- Notification Dropdown -->
  

    @auth
    @if(auth()->user()->type === 'Admin')
        <a href="{{ route('admin.notifications.index') }}"
           class="notification-icon">

            <i class="bi bi-bell-fill"></i>

            @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="notification-badge">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            @endif
        </a>
    @endif
@endauth

    <!-- User Profile Dropdown (Added Section) -->
    <div class="dropdown">
        <button class="btn btn-link d-flex align-items-center text-decoration-none text-white dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Placeholder Profile Image -->
           
            <span class="d-none d-sm-inline" style="font-size: 0.9rem;">{{auth()->user()->name}}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow mt-2">
            <li>
                <div class="dropdown-header">
                    <h6 class="text-overflow mb-0 fw-bold">Welcome!</h6>
                </div>
            </li>
            <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-person me-2"></i> My Profile</a></li>
           
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Log Out</a></li>
        </ul>
    </div>

            <!-- Dark/Light Theme Toggler -->
            <button class="btn btn-outline-light btn-sm ms-auto" id="themeToggler" aria-label="Toggle Theme Mode">
                <i class="bi bi-sun-fill" id="themeIcon"></i>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            
            <!-- Smart Collapsible Sidebar -->
            <nav id="sidebarMenu" class="custom-sidebar offcanvas-lg offcanvas-start border-end text-bg-dark" tabindex="-1">
                <div class="offcanvas-body d-flex flex-column p-0 pt-lg-3">
                    <ul class="nav flex-column w-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-speedometer2"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        
                        <!-- Nested Dropdown 1 -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#productsSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productsSubmenu">
                                <i class="bi bi-box-seam"></i>
                                <span class="nav-text">Post Management</span>
                            </a>
                            <ul class="collapse submenu" id="productsSubmenu">
                                <li><a class="nav-link" href="{{url('/')}}"><span class="nav-text">Posts</span></a></li>
                                <li><a class="nav-link" href="{{url('create')}}"><span class="nav-text">Add New Post</span></a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#productsSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productsSubmenu">
                                <i class="bi bi-box-seam"></i>
                                <span class="nav-text">Appointments</span>
                            </a>
                            <ul class="collapse submenu" id="productsSubmenu">
                                 <li><a class="nav-link" href="{{url('show')}}"><span class="nav-text">Appointment list</span></a></li>
                                <li><a class="nav-link" href="#"><span class="nav-text">ali</span></a></li>
                            </ul>
                        </li>
                        
                        <!-- Nested Dropdown 2 -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#usersSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="usersSubmenu">
                                <i class="bi bi-people"></i>
                                <span class="nav-text">Users</span>
                            </a>
                            <ul class="collapse submenu" id="usersSubmenu">
                                <li><a class="nav-link" href="{{url('userlist')}}"><span class="nav-text">Users List</span></a></li>
                                <li><a class="nav-link" href="#"><span class="nav-text">Permissions</span></a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i>
                                <span class="nav-text">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="main-content col px-md-4 pt-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h3 fw-bold">System Overview</h1>
                </div>

                <!-- Main Content Placeholder Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header fw-bold">LISTS</div>
                    <div class="card-body">
                        @yield('admin')
                    </div>
                </div>
            </main>

        </div>
    </div>

    <!-- Vital Bootstrap 5 JS Bundle for Dropdowns & Offcanvas -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/smoothscroll.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- Theme Logic & Auto-Collapse Cleanup Script -->
    <script>
        const toggler = document.getElementById('themeToggler');
const themeIcon = document.getElementById('themeIcon');

// مدیریت تغییر تم دارک و لایت
toggler.addEventListener('click', () => {
    const htmlElement = document.documentElement;
    const currentTheme = htmlElement.getAttribute('data-bs-theme');
    
    if (currentTheme === 'light') {
        htmlElement.setAttribute('data-bs-theme', 'dark');
        themeIcon.className = 'bi bi-moon-fill';
    } else {
        htmlElement.setAttribute('data-bs-theme', 'light');
        themeIcon.className = 'bi bi-sun-fill';
    }
});

// بستن خودکار دراپ‌داون‌های باز شده زمانی که موس از محدوده سایدبار خارج می‌شود
document.getElementById('sidebarMenu').addEventListener('mouseleave', () => {
    const collapses = document.querySelectorAll('.custom-sidebar .collapse');
    collapses.forEach(collapse => {
        const bsCollapse = bootstrap.Collapse.getInstance(collapse);
        if (bsCollapse) {
            bsCollapse.hide();
        }
    });
});

    </script>
</body>
</html>
