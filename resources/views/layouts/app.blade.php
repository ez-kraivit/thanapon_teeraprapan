<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>THANAPON | @yield('title')</title>

    <link rel="icon" href="{{asset('img/favicon.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('sb/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('sb/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->

    <link href="{{asset('sb/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500;600&display=swap" rel="stylesheet">
    <script src="{{asset('js/jquery35.js')}}" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{asset('js/ckeditor.js')}}"></script> --}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>

<body id="page-top" style="font-family:'Prompt',sans-serif;">
    {{-- <body id="page-top" oncontextmenu="return false;" style="font-family:'Prompt',sans-serif;"> --}}
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success  sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas  fa-leaf"></i>
                </div>
                <div class="sidebar-brand-text mx-3 md-block">
                    Thanapon<br></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>หน้าแรก</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('list.csv')}}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>รายาการย้อนหลัง ทั้งหมด</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('list.csv.month')}}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>รายการย้อน หลังรายเดือน</span></a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars icon-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @can('deshboard')
                        @yield('messanger')
                        @endcan

                    </ul>

                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">@yield('dashboardpath')</h1>
                    @yield('content')

                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; THANAPON</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sb/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sb/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('sb/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('sb/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('sb/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sb/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('sb/js/demo/datatables-demo.js')}}"></script>

    {{-- <script src="{{asset('js/edittext.js')}}"></script> --}}
</body>

</html>

<style scoped>
    .icon-bars::before {
        color: #ed1b2f;
    }

</style>
