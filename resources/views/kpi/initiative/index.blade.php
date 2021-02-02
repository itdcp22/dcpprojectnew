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
          <h3 class="card-title">Initiative Master
            <a href="{{ route('kpi.initiative.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>


                <th> Objective</th>
                <th> KPI Title </th>
                <th> Initiative Title </th>
                <th>Owner</th>
                <th> Major Activities </th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>

              @if(count($initiative))

              @foreach($initiative as $c)

              <tr>


                <td>{{ $c->ini_obj_desc }}</td>
                <td>{{ $c->ini_kpi_title }}</td>
                <td>{{ $c->ini_title }}</td>
                <td>{{ $c->ini_owner }}</td>
                <td>{{ $c->ini_maj_acti }}</td>




                <td>




                  <a href="{{ route('kpi.initiative.edit',$c->id) }}">
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

                <th> Objective</th>
                <th> KPI Title </th>
                <th> Initiative Title </th>
                <th>Owner</th>
                <th> Major Activities </th>
                <th>Action</th>

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