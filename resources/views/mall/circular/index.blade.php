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
          <h3 class="card-title">Circular Details
            <a href="{{ route('mall.circular.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> ID </th>
                <th> Circular No </th>
                <th> Date </th>
                <th>Subject</th>
                <th> Document </th>
                <th> Created By </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>





              @if(count($circular))

              @foreach($circular as $c)


              <?php $dt = date("d-m-Y");
           
      
              $fdate = $c->created_at;
             $tdate = $dt;
             $datetime1 = new DateTime($fdate);
             $datetime2 = new DateTime($tdate);
             $interval = $datetime1->diff($datetime2);
             $days = $interval->format('%a');//now do whatever you like with $days
              // echo $days;
 
               ?>




              <tr>
                <td>{{ $c->id }}</td>
                <td> {{ $c->ci_circular_no }} </td>
                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>


                @if($days > 2 )

                <td>{{ $c->ci_subject}}


                </td>
                @else
                <td>{{ $c->ci_subject}}
                  <span class="right badge badge-success">New</span>
                </td>
                @endif


                <td><a href="{{ url('storage/categories/'.$c->ci_document) }}" target="_blank">PDF</a></td>


                <td> {{ $c->ci_user_name }} </td>
                <td>

                  <a href="{{ route('mall.tenant.edit',$c->id) }}">
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
                <th> Circular No </th>
                <th> Date </th>
                <th>Subject</th>
                <th> Document </th>
                <th> Created By </th>
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