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
          <h3 class="card-title">KPI Master
            <a href="{{ route('kpi.info.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>








                <th> Objective</th>
                <th> KPI Title </th>
                <th> Data </th>
                <th>Existing Figure</th>
                <th> Level </th>
                <th> Target %</th>
                <th> Target Figure </th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>

              @if(count($info))

              @foreach($info as $c)

              <tr>


                <td>{{ $c->info_obj_des }}</td>
                <td>{{ $c->kpi_title }}</td>
                <td>{{ $c->kpi_data_desc }}</td>

                <td>{{ $c->kpi_exist }}</td>
                <td>{{ $c->kpi_level }}</td>

                <td>{{ $c->kpi_tarperc}}</td>
                <td> {{ $c->kpi_tar_fig }} </td>



                <td>




                  <a href="{{ route('kpi.info.edit',$c->id) }}">
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
                <th> Data </th>
                <th>Existing Figure</th>
                <th> Level </th>
                <th> Target %</th>
                <th> Target Figure </th>
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