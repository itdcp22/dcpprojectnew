<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tamani</title>
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


          <img src={{asset('dist/img/jarwani.png class=brand-image img-circle elevation-3 style=opacity: .8')}}>

          <span>Tamani Group</span>
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
              <img src={{asset('dist/img/jarwani.png class=img-circle elevation-2 alt=Logo')}}>
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
                    Pending
                    <span class="right badge badge-warning">{{$pendingwp}}</span>
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
                    Approved/Rejected
                    <span class="right badge badge-success">{{$approvedwp + $rejectedwp}}</span>
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
                    <span class="right badge badge-success">{{$teneantcount}}</span>
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
                <a href="{{ route('tenantusers') }}" class="nav-link  
                @if($segment=='tenantusers')
                active
                @endif            
                ">
                  <i class="nav-icon fas fa-users"></i>


                  <p>
                    Users
                    <span class="right badge badge-success">0</span>
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
      @include('flash-message')
      @yield('content')
    </div>



    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
      </div>
      <strong>Copyright &copy; 2019-2020 <a href="http://mallofmuscat.com">Tamani</a>.</strong> All rights
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
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
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