<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>MOM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#datepicker").datepicker();
    });
  </script>

  <!-- daterangepicker -->


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




  <!-- daterangepicker -->


  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->

  <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('mallwp')}}" class="nav-link">Home</a>
        </li>



      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">

          <a class="nav-link" href="/changepassword">

            <i class="fas fa-key"></i>
            {{ __('Change Password') }}
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



        <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      @if(auth()->user()->type =='user')
      <a href=" {{ route('home') }}" class="brand-link">
        @else(auth()->user()->type =='tenant')
        <a href=" {{ route('mallwp') }}" class="brand-link">
          @endif


          <img src={{asset('dist/img/malllogonew.PNG class=brand-image img-circle elevation-3 style=opacity: .8')}}>

          <span>Mall Of Muscat</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

              @if(auth()->user()->company =='3')
              <img src={{asset('dist/img/logo.png class=img-circle elevation-2 alt=Logo')}}>
              @elseif(auth()->user()->company =='2')

              <img src={{asset('dist/img/malllogonew.PNG class=img-circle elevation-2 alt=MallLogo')}}>
              @else
              <img src={{asset('dist/img/avatar5.png elevation-2 alt=MallLogo')}}>
              @endif





            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <?php
              $segment = Request::segment(2);
              ?>




              <li class="nav-item">
                <a href=" {{ route('mallwp') }}" class="nav-link
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
                <a href="{{route('mall.workpermit.create')}}" class="nav-link                          
                ">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Work Permit
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{route('mall.workpermit.index')}}" class="nav-link
                @if($segment=='workpermit')
                active
                @endif
                ">
                  <i class="nav-icon fas fa-hourglass-half"></i>

                  <p>
                    Pending/Not Approved


                    @if((Auth::user()->user_type) == 'tenant')
                    <span class="right badge badge-warning">{{$pendingwp}}</span>
                    @elseif((Auth::user()->user_type) == 'mall')
                    <span class="right badge badge-warning">{{$pendingwpmall}}</span>
                    @endif



                  </p>


                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('workpermit.approved')}}" class="nav-link
                @if($segment=='approved')
                active
                @endif
                ">
                  <i class="nav-icon fas fa-calendar-check"></i>


                  <p>
                    Approved

                    @if((Auth::user()->user_type) == 'tenant')
                    <span class="right badge badge-success">{{$approvedwp}}</span>
                    @elseif((Auth::user()->user_type) == 'mall')
                    <span class="right badge badge-success">{{$approvedwpmall}}</span>
                    @endif



                  </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{route('circtent')}}" class="nav-link  
                @if($segment=='circtent')
                active
                @endif            
                ">
                  <i class="nav-icon fas fa-bell"></i>



                  <p>
                    Circular

                    <span class="right badge badge-info">{{$circount}}</span>


                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('utilitycust')}}" class="nav-link  
                @if($segment=='utilitycust')
                active
                @endif            
                ">
                  <i class="nav-icon fas fa-charging-station"></i>







                  <p>
                    Utility

                    <span class="right badge badge-info">Bills</span>


                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('manual')}}" class="nav-link
                @if($segment=='manual')
                active
                @endif
                ">
                  <i class="nav-icon fas fa-book-open"></i>



                  <p>
                    User Manual





                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('operation')}}" class="nav-link
                @if($segment=='operation')
                active
                @endif
                ">
                  <i class="nav-icon fas fa-award"></i>
                  <p>
                    Operation
                  </p>
                </a>
              </li>



              @can('isMall')

              <li class="font-weight-bold nav-header">MALL MASTER</li>

              <li class="nav-item">
                <a href="{{route('mall.tenant.index')}}" class="nav-link
                @if($segment=='tenant')
                active
                @endif
                ">
                  <i class="nav-icon fas fa-building"></i>


                  <p>
                    Tenant
                    <span class="right badge badge-info">{{$teneantcount}}</span>
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('mall.brand.index')}}" class="nav-link
                @if($segment=='brand')
                active
                @endif
                ">
                  <i class="nav-icon fas fa-coffee"></i>


                  <p>
                    Brand
                    <span class="right badge badge-success">{{$brandcount}}</span>
                  </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="/contacts" class="nav-link  
                @if($segment=='contacts')
                active
                @endif            
                ">
                  <i class="nav-icon fas fa-user"></i>


                  <p>
                    Pending Users

                    <span class="right badge badge-warning">{{$pendingusers}}</span>

                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('tenantusers') }}" class="nav-link  
                @if($segment=='tenantusers')
                active
                @endif            
                ">
                  <i class="nav-icon fas fa-users"></i>


                  <p>
                    Approved Users

                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('mall.circular.index')}}" class="nav-link  
                @if($segment=='circular')
                active
                @endif            
                ">
                  <i class="nav-icon fas fa-bell"></i>



                  <p>
                    Circular

                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-charging-station"></i>

                  <p>
                    Utility Bills
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('mall.utility.index')}}" class="nav-link">

                      <i class="nav-icon far fa-circle text-danger"></i>
                      <p>Electricity</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('cwater')}}" class="nav-link">

                      <i class="nav-icon far fa-circle text-success"></i>
                      <p>Chilled Water</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('water')}}" class="nav-link">

                      <i class="nav-icon far fa-circle text-primary"></i>
                      <p>Water + Sewage</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('consolidate')}}" class="nav-link">

                      <i class="nav-icon far fa-circle text-warning"></i>
                      <p>Consolidate</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="{{route('ui_unpaid')}}" class="nav-link">

                      <i class="far fa-dot-circle nav-icon text-danger"></i>
                      <p>Unpaid - Invoices</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('ui_paid')}}" class="nav-link">


                      <i class="far fa-dot-circle nav-icon text-success"></i>
                      <p>Paid - Invoices</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('summary')}}" class="nav-link">


                      <i class="far fa-dot-circle nav-icon text-primary"></i>
                      <p>Unpaid - Brands</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('summary_ui_comp')}}" class="nav-link">


                      <i class="far fa-dot-circle nav-icon text-info"></i>
                      <p>Unpaid - Company</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('summary_ui_type')}}" class="nav-link">


                      <i class="far fa-dot-circle nav-icon text-info"></i>
                      <p>Unpaid - Type</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('utility_email_home')}}" class="nav-link">


                      <i class="far fa-envelope nav-icon text-secondary"></i>

                      <p>Email Trigger</p>
                    </a>
                  </li>















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
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Petty Cash
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
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

                </ul>
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
      @include('flash-message')
      @yield('content')
    </div>



    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
      </div>
      <strong>Copyright &copy; 2019-2021 <a href="http://mallofmuscat.com">MOM</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <!-- jQuery -->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">

  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->

  <script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>

  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="{{ asset('dist/js/adminlte.js')}}"></script>


  <!-- AdminLTE for demo purposes -->

  <script src="{{ asset('dist/js/demo.js')}}"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example3').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "order": [
          [1,"desc"]
        ],
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

  <script>
    $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var cat_id = button.data('catid')
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
  })

  </script>

</body>

</html>