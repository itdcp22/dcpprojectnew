<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mall Of Muscat</title>

    <script>
        $( function() {
        $( "#datepicker" ).datepicker();
      } );
    </script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off" style="color:red"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            @if(auth()->user()->user_type =='user')
            <a href=" {{ route('home') }}" class="brand-link">
                @elseif(auth()->user()->user_type =='admin')
                <a href=" {{ route('home') }}" class="brand-link">
                    @else(auth()->user()->type =='tenant')
                    <a href=" {{ route('mallwp') }}" class="brand-link">
                        @endif


                        <img
                            src={{asset('dist/img/jarwani.png class=brand-image img-circle elevation-3 style=opacity: .8')}}>

                        <span>Jarwani Group</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                @if(auth()->user()->company =='3')
                                <img src={{asset('dist/img/logo.png class=img-circle elevation-2 alt=Logo')}}>
                                @elseif(auth()->user()->company =='2')

                                <img
                                    src={{asset('dist/img/malllogonew.PNG class=img-circle elevation-2 alt=MallLogo')}}>
                                @else
                                <img src={{asset('dist/img/jarwani.png class=img-circle elevation-2 alt=Logo')}}>
                                @endif
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>


                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                                <?php
                    $segment = Request::segment(2);              
                  ?>
                                @can('isAdmin')
                                <li class="nav-item">
                                    <a href=" {{ route('home') }}" class="nav-link
                      @if(!$segment)
                      active
                      @endif            
                      ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href=" {{ route('homeicc') }}" class="nav-link
                      @if(!$segment)
                      active
                      @endif            
                      ">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Dashboard - Booking
                                        </p>
                                    </a>

                                </li>
                                @endcan

                                @can('isUser')
                                <li class="nav-item">
                                    <a href=" {{ route('home') }}" class="nav-link
                  @if(!$segment)
                  active
                  @endif            
                  ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>

                                </li>

                                @endcan

                                @can('isMall')
                                <li class="nav-item">
                                    <a href=" {{ route('home') }}" class="nav-link
                  @if(!$segment)
                  active
                  @endif            
                  ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>

                                </li>

                                @endcan

                                @can('isGuest')
                                <li class="nav-item">
                                    <a href=" {{ route('homeicc') }}" class="nav-link
                  @if(!$segment)
                  active
                  @endif            
                  ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard - Booking
                                        </p>
                                    </a>

                                </li>
                                @endcan








                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            Acccounts
                                            <i class="fas fa-angle-left right"></i>

                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                        @if(Gate::check('isUser') || Gate::check('isAdmin') || Gate::check('isMall'))


                                        <li class="nav-item">
                                            <a href="{{route('admin.accounts.create')}}" class="nav-link">
                                                <i class="nav-icon far fa-circle text-warning"></i>
                                                <p>Add Bill</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.accounts.index')}}" class="nav-link
                  @if($segment=='accounts')                
                  active
                  @endif">
                                                <i class="nav-icon far fa-circle text-info"></i>
                                                <p>Unpaid Bills</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.paidbills.index')}}" class="nav-link
                  @if($segment=='paidbills')                
                  active
                  @endif">
                                                <i class="nav-icon far fa-circle text-danger"></i>
                                                <p class="text">Paid Bills</p>
                                            </a>
                                        </li>



                                        <li class="nav-item">

                                            <a href="{{route('admin.advances.index')}}" class="nav-link 
                  
                  @if($segment=='advances')                
                  active
                  @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Advances</p>
                                            </a>
                                        </li>

                                        @can('isMall')
                                        <li class="nav-item">

                                            <a href="{{route('mall.workpermit.index')}}" class="nav-link 
                  
                  @if($segment=='workpermit')                
                  active
                  @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Work Permit</p>
                                            </a>
                                        </li>
                                        @endif



                                        @endif




                                        @can('isAdmin')
                                        <li class="nav-item">

                                            <a href="{{route('admin.unpaidbills.index')}}" class="nav-link 
                      
                      @if($segment=='unpaidbills')                
                      active
                      @endif">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Unpaid Bills - All</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.allpaidbills.index')}}" class="nav-link
                      @if($segment=='allpaidbills')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Paid Bills - All</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.advanceall.index')}}" class="nav-link
                      @if($segment=='advanceall')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Advance Request</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.advancesettlement.index')}}" class="nav-link
                      @if($segment=='advancesettlement')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Advance Settlement</p>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="{{route('admin.advancehistory.index')}}" class="nav-link
                      @if($segment=='advancehistory')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Advance History</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('advpending')}}" class="nav-link                      
                      @if($segment=='advpending')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Advance Unsettled </p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.cashtopups.index')}}" class="nav-link
                      @if($segment=='cashtopups')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Cash Topup</p>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="{{route('cash')}}" class="nav-link
                      @if($segment=='coh')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Cash On Hand</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.expense.index')}}" class="nav-link
                      @if($segment=='expense')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Expanse Analysis</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.categories.index')}}" class="nav-link
                      @if($segment=='categories')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Category</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{route('admin.beneficiary.index')}}" class="nav-link
                      @if($segment=='beneficiary')                
                      active
                      @endif                
                      ">

                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Beneficiary</p>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="{{route('admin.suppliers.index')}}" class="nav-link 
                      @if($segment=='suppliers')                
                      active
                      @endif ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Suppliers</p>
                                            </a>
                                        </li>



                                        <li class="nav-item">
                                            <a href="{{route('admin.payments.index')}}" class="nav-link 
                      @if($segment=='payments')                
                      active
                      @endif ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Payments</p>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>


                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            KPI
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{route('kpi.objective.index')}}" class="nav-link">
                                                <i class="nav-icon far fa-circle text-danger"></i>
                                                <p>Objective</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('kpi.info.index')}}" class="nav-link">

                                                <i class="nav-icon far fa-circle text-warning"></i>
                                                <p>KPI</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('kpi.initiative.index')}}" class="nav-link">
                                                <i class="nav-icon far fa-circle text-info"></i>
                                                <p>Initiatives</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-shopping-cart"></i>

                                        <p>
                                            Procurement
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{route('purchase.purchaserequest.index')}}" class="nav-link">
                                                <i class="nav-icon far fa-circle text-danger"></i>
                                                <p>Purchase Request</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('kpi.info.index')}}" class="nav-link">

                                                <i class="nav-icon far fa-circle text-warning"></i>
                                                <p>Purchase Order</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('kpi.initiative.index')}}" class="nav-link">
                                                <i class="nav-icon far fa-circle text-info"></i>
                                                <p>Goods Receipt Note</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                @can('isAdmin')

                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-tree"></i>
                                        <p>
                                            FOH
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{route('foh.booking.create')}}" class="nav-link
                      ">
                                                <i class="nav-icon fas fa-file"></i>
                                                <p>New Booking</p>
                                            </a>
                                        </li>




                                        <li class="nav-item">
                                            <a href="{{route('foh.booking.index')}}" class="nav-link
                      ">
                                                <i class="nav-icon far fa-circle text-warning"></i>
                                                <p>Booking Details</p>
                                            </a>
                                        </li>




                                        <li class="nav-item">
                                            <a href="{{route('foh.bookinghistory.index')}}" class="nav-link
                      @if($segment=='bookinghistory')
                      active
                      @endif">
                                                <i class="nav-icon far fa-circle "></i>

                                                <p>Booking History</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href='{!! url('/calendar') !!}' class="nav-link">
                                                <i class="far fa fa-calendar-alt nav-icon"></i>
                                                <p>Calendar</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            BOH
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/forms/general.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Schedule</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/advanced.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Fish Movement</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/editors.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Fish Collection</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-table"></i>
                                        <p>
                                            IT
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/tables/simple.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Support</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/tables/data.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Access Request</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Policy</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href=" {{ route('users') }}" class="nav-link">
                                                <i class="nav-icon fas fa-file"></i>
                                                <p>Users</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                @endcan

                                @can('isAccess')
                                <li class="nav-item">
                                    <a href="{{route('hrms.locker.index')}}" class="nav-link
                  @if($segment=='locker')
                  active
                  @endif            
                  ">
                                        <i class="nav-icon fas fa-lock"></i>
                                        <p>
                                            Locker
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan


                                @can('isTenant')
                                <li class="nav-item">
                                    <a href="{{route('mall.workpermit.create')}}" class="nav-link
                  @if($segment=='workpermit')
                  active
                  @endif            
                  ">
                                        <i class="nav-icon fas fa-lock"></i>
                                        <p>
                                            Work Permit
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan







                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->


            <div class="content">
                <div class="container-fluid">
                    @include('flash-message')
                    @yield('content')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->

            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.0
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>

    <!-- Datatable script -->
    <script>
        $(function () {
    $("#example1").DataTable();
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "order": [
                    [0, "desc"]
                ],
                "info": true,
                "autoWidth": true,
            });


  });
    </script>

</body>

</html>