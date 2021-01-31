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
          <h3 class="card-title">Objective Master
            <a href="{{ route('kpi.objective.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>




                <?php $number = 0; ?>


                <th>Department</th>
                <th> Objective</th>
                <th> Created Date</th>

                <th>Action</th>

              </tr>
            </thead>
            <tbody>

              @if(count($objective))

              @foreach($objective as $c)

              <tr>


                <td>{{ $c->obj_dept }}</td>
                <td>{{ $c->obj_desc }}</td>
                <td>{{ $c->created_at }}</td>





                <td>




                  <a href="{{ route('kpi.objective.edit',$c->id) }}">
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
                <th>Department</th>
                <th> Objective</th>
                <th> Created Date</th>

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