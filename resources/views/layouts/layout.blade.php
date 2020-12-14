<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
            href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            {{ Auth::user()->name }}
                            <span class="float-right text-sm ml-2"><i class="fas fa-caret-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="media-body">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    <span class="float-right text-sm"><i class="fas fa-sign-out-alt"></i></span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Real House</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            @if (Auth::user()->role_id == 1)
                            <li class="nav-item py-2">
                                <a href="/dashboard/user" class="nav-link">
                                    <i class="nav-icon fas fa-user-alt"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="/dashboard/project" class="nav-link">
                                    <i class="nav-icon fas fa-project-diagram"></i>
                                    <p>
                                        Project
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="/dashboard/building" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        Building
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="/dashboard/unit" class="nav-link">
                                    <i class="nav-icon fas fa-puzzle-piece"></i>
                                    <p>
                                        Unit
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="/dashboard/amenity" class="nav-link">
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>
                                        Amenity
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="/dashboard/facility" class="nav-link">
                                    <i class="nav-icon fas fa-plus-square"></i>
                                    <p>
                                        Facility
                                    </p>
                                </a>
                            </li>
                            @else
                            <li class="nav-item py-2">
                                <a href="/dashboard/reseller" class="nav-link">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Reseller
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="/dashboard/unit" class="nav-link">
                                    <i class="nav-icon fas fa-puzzle-piece"></i>
                                    <p>
                                        Unit
                                    </p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">
                                    @yield('header')
                                </h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.1.0-rc
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        {{-- <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script> --}}
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        {{-- <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script> --}}
        <!-- Sparkline -->
        {{-- <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script> --}}
        <!-- JQVMap -->
        {{-- <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
        <!-- jQuery Knob Chart -->
        {{-- <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script> --}}
        <!-- daterangepicker -->
        {{-- <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
        <!-- Tempusdominus Bootstrap 4 -->
        {{-- <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}
        <!-- Summernote -->
        {{-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
        <!-- overlayScrollbars -->
        <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
    </body>
    <style>
        body {
            counter-reset: Serial;
            /* Set the Serial counter to 0 */
        }

        tr td:first-child:before {
            counter-increment: Serial;
            /* Increment the Serial counter */
            content: counter(Serial);
            /* Display the counter */
        }

    </style>

</html>