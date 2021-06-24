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




            <p>Work Permit Pending</p>
          </div>
          <div class="icon">
            <i class="fas fa-tools"></i>
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

            <i class="fas fa-thumbs-up"></i>
          </div>

          @if($user->user_type =='mall')


          <a href="{{route('workpermit.approved')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('workpermit.approved')}}" class="small-box-footer">More info <i
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

            <p>Work Permit Not Approved</p>
          </div>
          <div class="icon">

            <i class="fas fa-ban"></i>
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

            <i class="fas fa-check"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

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
              OMR.
              {{number_format($ui_unpaid,3)}}
              @else
              OMR.
              {{number_format($ui_unpaid_cust,3)}}
              @endif





            </h3>




            <p>Unpaid Invoice</p>
          </div>
          <div class="icon">
            <i class="fas fa-charging-station"></i>
          </div>

          @if($user->user_type =='mall')
          <a href="{{route('ui_unpaid')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @else
          <a href="{{route('ui_unpaid_cust')}}" class="small-box-footer">More info <i
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
              OMR.
              {{number_format($ui_paid,3) }}
              @else
              OMR.

              {{number_format($ui_paid_cust,3) }}
              @endif





            </h3>

            <p>Paid Invoice</p>
          </div>
          <div class="icon">

            <i class="fas fa-receipt"></i>
          </div>

          @if($user->user_type =='mall')


          <a href="{{route('ui_paid')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('ui_paid_cust')}}" class="small-box-footer">More info <i
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

            <p>Over Due Amount</p>
          </div>
          <div class="icon">

            <i class="fas fa-ban"></i>
          </div>
          @if($user->user_type =='mall')


          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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

            <p>Services</p>
          </div>
          <div class="icon">

            <i class="fas fa-check"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>

@if($user->user_type =='mall')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">

        <!-- /.card -->

        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Top 5 Brands</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Pending Amount</th>
                </tr>
              </thead>
              <tbody>

                @if(count($utility))
                @foreach($utility as $c)
                <tr>
                  <td>{{ $c->ui_brand_name }}</td>
                  <td>{{ number_format($c->total,3) }}</td>
                </tr>
                @endforeach
                @endif

              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-6">

        <!-- /.card -->

        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Overview</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-sm btn-tool">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-sm btn-tool">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
              <p class="text-success text-xl">

                <i class="fas fa-bolt"></i>
              </p>
              <p class="d-flex flex-column text-right">
                <span class="font-weight-bold">
                  <i class="ion ion-android-arrow-up text-success"></i>
                  {{ number_format($ui_eb_unpaid,3)}}
                </span>
                <span class="text-muted">Electricity</span>
              </p>
            </div>
            <!-- /.d-flex -->
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
              <p class="text-warning text-xl">

                <i class="fas fa-fan"></i>
              </p>
              <p class="d-flex flex-column text-right">
                <span class="font-weight-bold">
                  <i class="ion ion-android-arrow-up text-warning"></i>
                  {{ number_format($ui_cwater_unpaid,3)}}
                </span>
                <span class="text-muted">Chilled Water</span>
              </p>
            </div>
            <!-- /.d-flex -->
            <div class="d-flex justify-content-between align-items-center mb-0">
              <p class="text-danger text-xl">

                <i class="fas fa-water"></i>
              </p>
              <p class="d-flex flex-column text-right">
                <span class="font-weight-bold">
                  <i class="ion ion-android-arrow-up text-danger"></i>
                  {{ number_format($ui_water_unpaid,3)}}
                </span>
                <span class="text-muted">Water + Sewage</span>
              </p>
            </div>
            <!-- /.d-flex -->
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>

@endif

<!-- /.content -->









@endsection