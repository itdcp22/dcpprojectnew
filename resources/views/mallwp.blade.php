@extends('layouts.adminwp')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">


            <h3>




              @if($user->user_type =='mall')
              {{$pendingwpmall}}
              @else
              {{$pendingwp}}
              @endif





            </h3>




            <p>Work Permit Request</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>

          @if($user->user_type =='admin')



          <a href="{{route('mall.workpermitapp.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('mall.workpermit.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif


        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>

              @if($user->user_type =='mall')
              {{$approvedwpmall}}
              @else
              {{$approvedwp}}
              @endif





            </h3>

            <p>Work Permit Approved</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>

          @if($user->user_type =='mall')


          <a href="{{route('mall.workpermitapp.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('mall.workpermit.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif



        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
              @if($user->user_type =='mall')
              {{$rejectedwpmall}}
              @else
              {{$rejectedwp}}
              @endif
            </h3>

            <p>Work Permit Rejected</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          @if($user->user_type =='mall')


          <a href="{{route('mall.workpermitapp.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('mall.workpermit.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>


              0




            </h3>

            <p>Work Completed</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{route('admin.cashtopups.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->









@endsection