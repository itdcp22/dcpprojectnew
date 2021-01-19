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
          <h3 class="card-title">Payment Master
            <a href="{{ route('admin.payments.create') }}" class="btn btn-primary btn-sm">New Payment</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> Tran.No </th>
                <th> Tran Date </th>
                <th> Bank Name </th>
                <th> Supplier Name </th>

                <th> Currency</th>
                <th> Amount</th>
                <th> Created By</th>
                <th> Action</th>



              </tr>
            </thead>
            <tbody>

              @if(count($payments))

              @foreach($payments as $c)

              <tr>
                <td>{{ $c->pay_tran_no }}</td>

                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                <td>{{ $c->bank_name }}</td>
                <td>{{ $c->pay_supp_acc_name }}</td>

                <td>{{ $c->pay_supp_currency }}</td>

                <td class="text-right">{{ number_format($c->pay_supp_amount,3) }}</td>

                <td>{{ $c->pay_created_name}}</td>






                <td> <a href="{{ route('admin.payments.show',$c->id) }}">
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

                <th> Tran.No </th>
                <th> Tran Date </th>
                <th> Bank Name </th>
                <th> Supplier Name </th>

                <th> Currency</th>
                <th> Amount</th>
                <th> Created By</th>
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