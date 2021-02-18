@extends('layouts.admin')

@section('content')

<style>
  .container1 {
    position: relative;
    width: 100%;
    overflow: hidden;
    padding-top: 56.25%;
    /* 16:9 Aspect Ratio */
  }

  .responsive-iframe {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    border: none;
  }
</style>

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


              @if($user->user_type =='admin')


              {{ number_format($unpaid,3) }}

              @else
              {{ number_format($userunpaid,3) }}
              @endif





            </h3>




            <p>Unpaid Bill Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>

          @if($user->user_type =='admin')


          <a href="{{route('admin.unpaidbills.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('admin.accounts.index')}}" class="small-box-footer">More info <i
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


              @if($user->user_type =='admin')
              {{ number_format($paid,3) }}
              @else
              {{ number_format($userpaid,3) }}
              @endif



            </h3>

            <p>Paid Bill Amount</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>

          @if($user->user_type =='admin')


          <a href="{{route('admin.allpaidbills.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('admin.paidbills.index')}}" class="small-box-footer">More info <i
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
              @if($user->user_type =='admin')
              {{ number_format($advanceall,3) }}
              @else
              {{ number_format($advance,3) }}
              @endif
            </h3>

            <p>Cash Advance</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          @if($user->user_type =='admin')


          <a href="{{route('admin.advanceall.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('admin.advances.index')}}" class="small-box-footer">More info <i
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



              @if($user->user_type =='admin')


              {{ number_format($topup,3) }}


              @else

              {{ number_format($advance_notsettled,3) }}

              @endif




            </h3>

            @if($user->user_type =='admin')


            <p>Cash Topup</p>


            @else
            <p>Unsettled Advance Amount</p>
            @endif


          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>


          @if($user->user_type =='admin')



          <a href="{{route('admin.cashtopups.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>

          @else

          <a href="{{route('admin.advances.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif


        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



@if($user->user_type =='admin')

<div class="container1">
  <iframe class="responsive-iframe" src="{{route('advpending')}}"></iframe>
</div>

@endif



@endsection