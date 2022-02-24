<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @if (empty(ucfirst(request()->segment(2))) && empty(ucfirst(request()->segment(3))))
            {{ ucfirst(request()->segment(1)) }}
        @elseif (empty(ucfirst(request()->segment(3))))
            {{ ucfirst(request()->segment(2)) }}
        @endif
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href={{ asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css") }}> --}}
    <!-- Tempusdominus Bbootstrap 4 -->
    {{-- <link rel="stylesheet" href={{ asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}> --}}
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href={{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}> --}}
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href={{ asset("plugins/jqvmap/jqvmap.min.css") }}> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
    <!-- dataTables -->
    {{-- <link rel="stylesheet" href={{ asset("plugins/datatables/datatables.css") }}> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href={{ asset("plugins/daterangepicker/daterangepicker.css") }}> --}}
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
@livewireStyles

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
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
            </ul>

            <!-- SEARCH FORM -->
            {{-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Cari Siswa"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" class="btn btn-sm btn-info" onclick="event.preventDefault();
                              this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-2 pb-2 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        <a href="#" class="d-block">{{ Auth::user()->jabatan }}</a>
                        <a href="#" class="d-block">{{ Auth::user()->kelas }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="{{ url('admin/dashboard') }}"
                                class="nav-link {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @role('pelapor')
                            <li class="nav-item has-treeview">
                                <a href="#"
                                    class="nav-link {{ request()->segment(2) == 'penghargaan' ? 'active' : '' }}">
                                    <i class="fas fa-check-circle nav-icon"></i>
                                    <p>
                                        Penghargaan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link {{ request()->segment(2) == 'pelanggaran' && request()->segment(3) == 'record' ? 'active' : '' }}{{ request()->segment(2) == 'pelanggaran' && request()->segment(3) == 'pelaporan' ? 'active' : '' }}">
                                    <i class="fas fa-times-circle nav-icon"></i>
                                    <p>
                                        Pelanggaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('pelapor/kelas') }}"
                                    class="nav-link {{ request()->segment(2) == 'kelas' ? 'active' : '' }}">
                                    <i class="nav-icon fas icon-class-user"></i>
                                    <p>
                                        Kelas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('pelapor/siswa') }}"
                                    class="nav-link {{ request()->segment(2) == 'siswa' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Siswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('pelapor.books.index') }}"
                                    class="nav-link {{ request()->segment(2) == 'books' ? 'active' : '' }}">
                                    <i class="nav-icon fas icon-class-user"></i>
                                    <p>
                                        Contoh
                                    </p>
                                </a>
                            </li>
                        @endrole
                        @role('admin')
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/penghargaan') }}"
                                    class="nav-link {{ request()->segment(2) == 'penghargaan' ? 'active' : '' }}">
                                    <i class="fas fa-check-circle nav-icon"></i>
                                    <p>
                                        Penghargaan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/pelanggaran') }}"
                                    class="nav-link {{ request()->segment(2) == 'pelanggaran' ? 'active' : '' }}">
                                    <i class="fas fa-times-circle nav-icon"></i>
                                    <p>
                                        Pelanggaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/kelas') }}"
                                    class="nav-link {{ request()->segment(2) == 'kelas' ? 'active' : '' }}">
                                    <i class="nav-icon fas icon-class-user"></i>
                                    <p>
                                        Kelas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/siswa') }}"
                                    class="nav-link {{ request()->segment(2) == 'siswa' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Siswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="{{ url('admin/contacts') }}"
                                    class="nav-link {{ request()->segment(2) == 'books' ? 'active' : '' }}">
                                    <i class="nav-icon fas icon-class-user"></i>
                                    <p>
                                        Contoh
                                    </p>
                                </a>
                            </li>
                        @endrole
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <div class="container-fluid">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @if (empty(ucfirst(request()->segment(2))) && empty(ucfirst(request()->segment(3))))
                                    {{ ucfirst(request()->segment(1)) }}s
                                @elseif (empty(ucfirst(request()->segment(3))))
                                    {{ ucfirst(request()->segment(2)) }}
                                @endif
                            </h1>
                        </div><!-- /.col -->
                </div><!-- /.container-fluid -->
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            {{ $slot }}
                        </section>
                    </div>
                </div>
            </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src={{ asset("plugins/jquery/jquery.min.js") }}></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jQuery UI 1.11.4 -->
    {{-- <script src={{ asset("plugins/jquery-ui/jquery-ui.min.js") }}></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- ChartJS -->
    {{-- <script src={{ asset("plugins/chart.js/Chart.min.js") }}></script> --}}
    <!-- Sparkline -->
    {{-- <script src={{ asset("plugins/sparklines/sparkline.js") }}></script> --}}
    <!-- JQVMap -->
    {{-- <script src={{ asset("plugins/jqvmap/jquery.vmap.min.js") }}></script> --}}
    {{-- <script src={{ asset("plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src={{ asset("plugins/jquery-knob/jquery.knob.min.js") }}></script> --}}
    <!-- daterangepicker -->
    {{-- <script src={{ asset("plugins/moment/moment.min.js") }}></script> --}}
    {{-- <script src={{ asset("plugins/daterangepicker/daterangepicker.js") }}></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src={{ asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script> --}}
    <!-- Summernote -->
    {{-- <script src={{ asset("plugins/summernote/summernote-bs4.min.js") }}></script> --}}
    <!-- overlayScrollbars -->
    <script src={{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('dist/js/adminlte.js') }}></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset('dist/js/pages/dashboard.js') }}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ asset('dist/js/demo.js') }}></script>
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('show-create', event => {
            $('#exampleModal').modal('show');
        })
        window.addEventListener('close-create', event => {
            $('#exampleModal').modal('hide');
        })

        window.addEventListener('show-update', event => {
            $('#exampleModals').modal('show');
            
        })
        window.addEventListener('close-update', event => {
            $('#exampleModals').modal('hide');
        })
    </script>
</body>
</html>
