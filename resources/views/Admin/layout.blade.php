<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('Admin/css/styles.css')}}" rel="stylesheet" />
        @yield('custom-css')

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">SRS Electrical</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> --}}
                    <a href="{{route('register')}}" target="_blank" rel="noopener noreferrer"><button class="btn btn-primary" id="btnNavbarSearch" type="button">Add tester</button></a>
                 <a href="{{route('user.logout')}}" method="POST"  rel="noopener noreferrer">   <button class="btn btn-primary" id="btnNavbarSearch" type="button">Logout</button></a>

                </div>
            </form>

           
           
        </nav>


        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">SRS</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="{{route('product.read')}}"target='blank'>
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Products
                                
                            </a>
                           
                            <a class="nav-link" href="{{route('testing.read')}}"target='blank'>
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Testings
                            </a>
                          
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{route('failed.read')}}"target='blank'>
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Failed Tests
                            </a>
                            <a class="nav-link" href="{{route('testlog.read')}}"target='blank'>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Test Logs
                            </a>
                            <a class="nav-link" href="{{route('dept.read')}}"target='blank'>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Departments
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>



            
            <div id="layoutSidenav_content">
                @yield('content')

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; All rights reserved by SRS Electrical</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset ('Admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('Admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('Admin/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
