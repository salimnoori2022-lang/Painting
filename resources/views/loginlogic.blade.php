<!DOCTYPE html>
<html lang="fa" dir="rtl" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت هوشمند</title>
    <!-- Bootstrap 5 CSS & Icons -->
       <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <!-- Vazirmatn Font CDN -->
    
     <link rel="stylesheet" href="{{asset('assets/css/admincss.css')}}">
    <style>
        
    </style>
</head>
<body>

    <!-- نوبار بالا -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: var(--bg-custom-nav);">
        <div class="container-fluid">
            <!-- دکمه همبرگری موبایل -->
            <button class="navbar-toggler me-2 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fw-bold px-3" href="#">داشبورد هوشمند</a>
            
            <!-- دکمه تغییر تم -->
            <button class="btn btn-outline-light btn-sm ms-auto" id="themeToggler" aria-label="تغییر حالت شب و روز">
                <i class="bi bi-sun-fill" id="themeIcon"></i>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            
            <!-- سایدبار هوشمند -->
            <nav id="sidebarMenu" class="custom-sidebar offcanvas-lg offcanvas-end border-start text-bg-dark" tabindex="-1">
                <div class="offcanvas-body d-flex flex-column p-0 pt-lg-3">
                    <ul class="nav flex-column w-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-speedometer2"></i>
                                <span class="nav-text">داشبورد پیشخوان</span>
                            </a>
                        </li>
                        
                        <!-- دراپ‌داون ۱ (اصلاح شده) -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#productsSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productsSubmenu">
                                <i class="bi bi-box-seam"></i>
                                <span class="nav-text">انبارداری و کالاها</span>
                            </a>
                            <ul class="collapse submenu" id="productsSubmenu">
                                <li><a class="nav-link" href="#"><span class="nav-text">مدیریت موجودی</span></a></li>
                                <li><a class="nav-link" href="#"><span class="nav-text">دسته‌بندی‌ها</span></a></li>
                            </ul>
                        </li>
                        
                        <!-- دراپ‌داون ۲ (اصلاح شده) -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#usersSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="usersSubmenu">
                                <i class="bi bi-people"></i>
                                <span class="nav-text">مدیریت کاربران</span>
                            </a>
                            <ul class="collapse submenu" id="usersSubmenu">
                                <li><a class="nav-link" href="#"><span class="nav-text">لیست مشتریان</span></a></li>
                                <li><a class="nav-link" href="#"><span class="nav-text">سطوح دسترسی</span></a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i>
                                <span class="nav-text">تنظیمات اصلی</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- محتوای اصلی -->
            <main class="main-content col px-md-4 pt-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h3 fw-bold">خلاصه عملکرد سیستم</h1>
                </div>

                <!-- باکس محتوا -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header fw-bold">توضیحات عملکرد قابلیت‌های جدید</div>
                    <div class="card-body">
                        <p class="mb-0">مشکل دراپ‌داون رفع شد. اکنون با قرار دادن موس روی سایدبار و کلیک روی عناوین منو، زیرمنوها به صورت آکاردئونی و کاملاً روان باز می‌شوند.</p>
                    </div>
                </div>
            </main>

        </div>
    </div>

    <!-- ⚠️ فایل حیاتی جاوااسکریپت بوت‌استرپ جهت کارکرد دراپ‌داون‌ها -->
     <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- اسکریپت جاوااسکریپت تغییر تم -->
    <script>
        const toggler = document.getElementById('themeToggler');
        const themeIcon = document.getElementById('themeIcon');
        
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

        // بستن خودکار دراپ‌داون‌ها در صورتی که موس از روی سایدبار کنار رفت
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
