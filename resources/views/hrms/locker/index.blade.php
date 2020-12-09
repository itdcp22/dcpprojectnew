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
          <h3 class="card-title">Locker Details
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> Locker ID </th>
                <th> Name </th>
                <th> Title </th>
                <th> Department </th>
                <th> Locker No </th>

                <th> Issued Date</th>

                <th> Remarks </th>
                <th> Updated User </th>
                <th> Last Update </th>
                <th> Action </th>

              </tr>
            </thead>
            <tbody>

              @if(count($locker))

              @foreach($locker as $c)

              <tr>
                <td class="font-weight-bold text-center text-primary">{{ $c->lockerid }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->title }}</td>
                <td>{{ $c->department }}</td>
                <td>{{ $c->lockerno }}</td>


                @if($c->name =='')
                <td></td>
                @else
                <td>{{ date('d-m-Y', strtotime($c->issued_date)) }}</td>
                @endif


                <td>{{ $c->remarks }}</td>

                <td>{{ $c->updated_userid }}</td>

                @if($c->updated_at =='')
                <td></td>
                @else
                <td>{{ date('d-m-Y', strtotime($c->updated_at)) }}</td>
                @endif




                <td>




                  <a href="{{ route('hrms.locker.edit',$c->id) }}">
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

                <th> Locker ID </th>
                <th> Name </th>
                <th> Title </th>
                <th> Department </th>
                <th> Locker No </th>

                <th> Issued Date</th>

                <th> Remarks </th>
                <th> Updated User </th>
                <th> Last Update </th>
                <th> Action </th>

              </tr>
            </tfoot>
          </table>

          <div class="row">
            <div class="col text-right">
              <a href="{{route('hrms.locker.lockerexport')}}">
                <i class="far fa-file-excel fa-2x text-green"></i>
              </a>
            </div>
          </div>

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