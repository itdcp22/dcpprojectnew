@extends('layouts.admin')
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
          <h3 class="card-title">KPI Details
            <a href="{{ route('kpi.info.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> ID </th>
                <th> Name </th>

                <th> Mobile </th>

                <th> Visit Date </th>
                <th> Visit Time </th>

                <th> Reference</th>
                <th> User</th>
                <th> Booking Date</th>
                <th> Status</th>
                <th>Approved By</th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>








              </td>

              </tr>


              <tr>
                <td colspan="11">No Record Found</td>
              </tr>


            </tbody>
            <tfoot>
              <tr>

                <th> ID </th>
                <th> Name </th>

                <th> Mobile </th>

                <th> Visit Date </th>
                <th> Visit Time </th>

                <th> Reference</th>
                <th> User</th>
                <th> Booking Date</th>
                <th> Status</th>
                <th>Approved By</th>
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