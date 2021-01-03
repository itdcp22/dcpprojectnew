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
          <h3 class="card-title">Cash Advance Master
            <a href="{{ route('admin.advances.create') }}" class="btn btn-primary btn-sm">Advance Request</a></h3>
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
                <th> Status</th>
                <th> Print</th>


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


                <td>
                  @if($c->ca_status =='0' && $c->ca_pay_status =='0')
                  <div class="text-primary">
                    Waiting for approval
                  </div>
                  @elseif($c->ca_status =='0' && $c->ca_pay_status =='1')
                  <div class="text-success">
                    Request approved
                  </div>
                  @elseif($c->ca_status =='1' && $c->ca_pay_status =='1')
                  Transaction Completed
                  @elseif($c->ca_status =='0' && $c->ca_pay_status =='2')
                  <div class="text-danger">
                    Request rejected
                  </div>
                  @else
                  Status Error

                  @endif



                </td>
                <td> <a href="{{ route('admin.advances.show',$c->id) }}">
                    <i class="fa fa-print text-green"></i>

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
                <th> Tran Date </th>
                <th> Request Date </th>
                <th> Amount </th>
                <th> Reason</th>
                <th> Status</th>
                <th> Print</th>


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