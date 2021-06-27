@extends('layouts.adminwp')
@section('content')


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <!-- /.card-header -->

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Brand Master
            <a href="{{ route('mall.brand.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> ID </th>
                <th> Brand Name </th>
                <th> Company Name </th>
                <th>Unit Number</th>
                <th> Area</th>
                <th> Location </th>
                <th> VAT Number </th>
                <th>DOO</th>
                <th>Type</th>
                <th>Utility</th>
                <th>Status</th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>

              @if(count($brand))

              @foreach($brand as $c)

              <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->bm_name }}</td>
                <td>{{ $c->bm_tm_name }}</td>
                <td>{{ $c->bm_unit_no }}</td>
                <td>{{ $c->bm_size}}</td>
                <td>{{ $c->bm_location}}</td>
                <td>{{ $c->bm_vat}}</td>
                <td> {{ date('d-m-Y', strtotime($c->bm_open_date)) }} </td>
                <td> {{ $c->bm_type }} </td>
                <td> {{ $c->bm_eb}} || {{$c->bm_cwater}} ||
                  {{$c->bm_water  }} </td>

                <td>
                  @if($c->bm_status ==0)
                  <div class="text-danger">
                    Inactive
                  </div>
                  @elseif($c->bm_status ==1)
                  <div class="text-primary">
                    Active
                  </div>

                  @else
                  Status Error

                  @endif </td>
                <td>




                  <a href="{{ route('mall.brand.edit',$c->id) }}">
                    <i class="fa fa-edit"></i>

                  </a>






                </td>

              </tr>
              @endforeach

              @else
              <tr>
                <td colspan="11">No Record Found</td>
              </tr>
              @endif

            </tbody>
            <tfoot>
              <tr>

                <th> ID </th>
                <th> Brand Name </th>
                <th> Company Name </th>
                <th>Unit Number</th>
                <th> Area</th>
                <th> Location </th>
                <th> VAT Number </th>
                <th>DOO</th>
                <th>Type</th>
                <th>Utility</th>
                <th>Status</th>
                <th> Action </th>

              </tr>
            </tfoot>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>


@endsection