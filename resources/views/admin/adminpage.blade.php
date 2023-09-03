<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('../plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet"
        href="{{asset('../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> -->

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('../plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('../plugins/daterangepicker/daterangepicker.css')}}">
</head>
<style>
body {
    display: flex;
    flex-direction: column;
}

section {
    position: relative;
}

footer {
    flex: 0 0 50px;
    /*or just height:50px;*/
    margin-top: auto;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('../assets/img/donut-logo.jpg')}}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <div>

            <style>
            .main-sidebar {
                background-color: #E22C87;
            }
            </style>
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{asset('../assets/img/donut-logo.jpg')}}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Brand Name</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('../assets/img/user-icon.png')}}" class="img-circle elevation-2"
                                alt="User Image" style="background-color:#FFFFFF;">
                        </div>
                        <div class="nav-link">
                            <a href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item menu-open">
                                <a href="{{ url('/admin/charts') }}" class="nav-link ">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>
                                        Analytics
                                        <i class="right fas"></i>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/tables/orders') }}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p> Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/products/main') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tags"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/customers/main') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Customers</p>
                                </a>
                            </li>

                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            </section>
            <section class="content">
                @yield('table')
            </section>
            <section class="content">
                @yield('order-chart')
            </section>
            <section class="content">
                @yield('products')
            </section>
            <section>
                @yield('customers')
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io"></a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
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
    <script src="{{asset('./plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('../plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- daterangepicker -->
    <script src="{{asset('../plugins/moment/moment.min.js')}}"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>

    <script src="{{asset('../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('../dist/js/adminlte.js')}}"></script>


</body>

</html>