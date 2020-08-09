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
          <h3 class="card-title">Work Permit
            <a href="{{ route('mall.workpermit.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> Request ID </th>
                <th> Company </th>
                <th> Brand</th>
                <th> Applicant </th>
                <th> Mobile </th>
                <th> Date From</th>
                <th> Date To</th>
                <th>Time From</th>
                <th>Time To</th>


                <th> Action </th>
              </tr>
            </thead>
            <tbody>

              @if(count($workpermit))

              @foreach($workpermit as $c)

              <tr>
                <td>{{ $c->wp_request_id }}</td>
                <td>{{ $c->wp_comp_name }}</td>

                <td>{{ $c->wp_brand_name }}</td>
                <td>{{ $c->wp_applicant }}</td>
                <td>{{ $c->wp_mobile }}</td>

                <td>{{ date('d-m-Y', strtotime($c->wp_from_date)) }}</td>
                <td>{{ date('d-m-Y', strtotime($c->wp_to_date)) }}</td>
                <td>{{ date('h:i A', strtotime($c->wp_from_time)) }}</td>
                <td>{{ date('h:i A', strtotime($c->wp_to_time)) }}</td>







                <td>

                  <a href="{{ route('mall.workpermit.show',$c->id) }}">
                    <i class="fa fa-print text-green"></i>

                  </a>

                  /


                  <a href="{{ route('mall.workpermit.edit',$c->id) }}">
                    <i class="fa fa-edit"></i>

                  </a>


                  /







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

                <th> Request ID </th>
                <th> Company </th>
                <th> Brand</th>
                <th> Applicant </th>
                <th> Mobile </th>
                <th> Date From</th>
                <th> Date To</th>
                <th>Time From</th>
                <th>Time To</th>


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