<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kuliah PBKK Kelas B 2024</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tambahkan "/" diawal, artinya dari directory public --}}

    {{-- Css Aplikasi --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Future Features can be added here -->
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- End of Header -->

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Sidebar Items -->
                        <li class="nav-item">
                            <a href="{{ route('genap-ganjil') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Genap Ganjil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fibonacci') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Fibonacci</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bilangan-prima') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Bilangan Prima</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('param') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Routing</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- /.Main Sidebar Container -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @yield('title') <!-- Title Section -->
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
            <!-- End of Content Header -->

            <!-- Main content -->
            <div class="container-fluid">
                @yield('alert') <!-- Alert Section -->
                @yield('content') <!-- Main Content Section -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="main-footer">
            <strong>&copy; <span id="current-year"></span> <a href="#">PBKK B</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
        <!-- /.footer -->
        <!-- End of Footer -->

        <script>
            // Set the current year in the copyright
            document.getElementById('current-year').textContent = new Date().getFullYear();
        </script>
    </div>
    <!-- ./wrapper -->

    {{-- Tambahkan "/" diawal, artinya dari directory public --}}
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminlte.js"></script>
    @yield('script') <!-- Script Section -->
</body>

</html>
