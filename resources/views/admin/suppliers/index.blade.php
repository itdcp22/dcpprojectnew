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
          <h3 class="card-title">Supplier Master
            <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary btn-sm">New Supplier</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> Company Name </th>
                <th> Account Name </th>
                <th> Account Number </th>
                <th> Bank Name </th>
                <th> IBAN </th>
                <th> SWIFT</th>

                <th> Status</th>
                <th> Action</th>


              </tr>
            </thead>
            <tbody>

              @if(count($supplier))

              @foreach($supplier as $c)

              <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->supp_comp_name }}</td>
                <td>{{ $c->supp_account_name }}</td>
                <td>{{ $c->supp_acc_no}}</td>
                <td>{{ $c->supp_bank_name }}</td>
                <td>{{ $c->supp_swift }}</td>
                <td>{{ $c->supp_iban }}</td>



                <td>
                  @if($c->supp_status =='1')
                  <div class="text-primary">
                    Active
                  </div>
                  @else
                  <div class="text-danger">
                    Inactive
                  </div>

                  @endif



                </td>






                <td> <a href="{{ route('admin.suppliers.edit',$c->id) }}">
                    <i class="fa fa-edit text-blue"></i>

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
                <th> Company Name </th>
                <th> Account Name </th>
                <th> Account Number </th>
                <th> Bank Name </th>
                <th> IBAN </th>
                <th> SWIFT</th>

                <th> Status</th>
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