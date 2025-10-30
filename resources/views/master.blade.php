<!DOCTYPE html>
<html lang="en">
    <head>
        <title>EEPIStaff | @yield('title', 'App Employee')</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
        <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
        <meta name="author" content="CodedThemes">

        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('fonts/tabler-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/material.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" id="main-style-link">
        <link rel="stylesheet" href="{{ asset('css/style-preset.css') }}">
    </head>
    <body>
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>

        <nav class="pc-sidebar">
            <div class="navbar-wrapper">
                <div class="m-header d-flex align-items-center">
                    <a href="dashboard/index.html" class="d-flex align-items-center gap-2 text-dark pt-5 text-xl fw-bold fs-5 text-decoration-none">
                        <img src="{{ asset('images/favicon.png') }}" alt="logo" width="50" height="50">
                        <span style="font-family: 'Poppins', sans-serif; font-weight: 800; letter-spacing: 2px;">
                            <span style="color: #013B71;">EEPI</span><span style="color: #FDC300;">Staff</span>
                        </span>
                    </a>
                </div>
                <div class="navbar-content">
                    <ul class="pc-navbar">
                        <li class="pc-item @yield('active') pt-4">
                            <a href="../dashboard/index.php" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                                <span class="pc-mtext">Dashboard</span>
                            </a>
                        </li>
                        
                        <li class="pc-item pc-caption">
                            <label>PAGES</label>
                            <i class="ti ti-dashboard"></i>
                        </li>                        
                        <li class="pc-item @yield('active-employee')">
                            <a href="/employees" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-users"></i></span>
                                <span class="pc-mtext">Employee</span>
                            </a>
                        </li>
                        <li class="pc-item @yield('active-department')">
                            <a href="/departments" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-browser"></i></span>
                                <span class="pc-mtext">Department</span>
                            </a>
                        </li>
                        <li class="pc-item @yield('active-position')">
                            <a href="/positions" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                                <span class="pc-mtext">Position</span>
                            </a>
                        </li>                        
                        <li class="pc-item @yield('active-attendance')">
                            <a href="/attendance" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-clipboard"></i></span>
                                <span class="pc-mtext">Attendance</span>
                            </a>
                        </li>
                        <li class="pc-item @yield('active-salary')">
                            <a href="/salaries" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-report-money"></i></span>
                                <span class="pc-mtext">Salary</span>
                            </a>
                        </li>

                        <li class="pc-item pc-caption">
                            <label>OTHER</label>
                            <i class="ti ti-brand-chrome"></i>
                        </li>
                        <li class="pc-item">
                            <a href="/reports" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-report"></i></span>
                                <span class="pc-mtext">Report</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/settings" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-settings"></i></span>
                                <span class="pc-mtext">Setting</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/profile" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-user"></i></span>
                                <span class="pc-mtext">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="pc-header">
            <div class="header-wrapper">
                <div class="me-auto pc-mob-drp">
                    <ul class="list-unstyled">
                        <li class="pc-h-item pc-sidebar-collapse">
                            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="pc-h-item pc-sidebar-popup">
                            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="pc-container">
            <div class="pc-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">@yield('sub-title')</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0)">@yield('caption')</a></li>
                                    <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">@yield('sub-title')</h4>
                                    <p class="card-subtitle">
                                        Electronic Engineering Polytechnic Institute of Surabaya
                                    </p>
                                </div>
                                <div class="ms-auto mt-3 mt-md-0">
                                    @yield('button-add')
                                </div>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="pc-footer">
            <div class="footer-wrapper container-fluid">
                <div class="row">
                    <div class="col-sm my-1">
                        <p class="m-0">EEPIStaff - Copyright © <a href="https://codedthemes.com/">Codedthemes</a>.</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>
        <script src="{{ asset('js/pages/dashboard-default.js') }}"></script>
        <script src="{{ asset('js/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/fonts/custom-font.js') }}"></script>
        <script src="{{ asset('js/pcoded.js') }}"></script>
        <script src="{{ asset('js/plugins/feather.min.js') }}"></script>

        <script>layout_change('light');</script>
        <script>change_box_container('false');</script>
        <script>layout_rtl_change('false');</script>
        <script>preset_change("preset-1");</script>
        <script>font_change("Public-Sans");</script>
    </body>
</html>