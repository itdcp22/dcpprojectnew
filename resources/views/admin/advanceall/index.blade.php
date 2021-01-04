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
          <h3 class="card-title">Cash Advance Request
            <a href="{{ route('admin.advances.create') }}" class="btn btn-primary btn-sm">Add Request</a> </h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> Tran Date </th>
                <th> Request Date </th>
                <th> Amount </th>
                <th> Reason</th>
                <th> Emp Name</th>
                <th> Action</th>

              </tr>
            </thead>
            <tbody>

              @if(count($advances))

              @foreach($advances as $c)

              <tr>
                <td>{{ $c->id }}</td>
                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                <td>{{ date('d-m-Y', strtotime($c->ca_adv_date)) }}</td>

                <td class="text-right">{{ number_format($c->ca_adv_amt,3) }}</td>


                <td>{{ $c->ca_purpose }}</td>
                <td>{{ $c->ca_emp_name }}</td>


                <td>

                  <a href="{{ route('admin.advances.show',$c->id) }}">
                    <i class="fa fa-print text-green"></i>

                  </a>

                  /

                  <a href="{{ route('admin.advances.edit',$c->id) }}"><i class="fa fa-edit"></i></a>
                  /



                  <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">


                    <i class="fa fa-trash text-red"></i>

                  </a>
                  <form action="{{ route('admin.advances.destroy', $c->id)}}" method="POST">
                    @method('DELETE')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </form>
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
                <th> Tran Date </th>
                <th> Request Date </th>
                <th> Amount </th>
                <th> Reason</th>
                <th> Emp Name</th>
                <th> Action</th>

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