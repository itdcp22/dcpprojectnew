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
          <h3 class="card-title">Unpaid Bills
            <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary btn-sm">Add Bill</a></h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> Tran No. </th>
                <th> Tran Date </th>
                <th> Supplier Name </th>
                <th> Bill Date </th>
                <th> Bill No. </th>
                <th> Bill Amount </th>
                <th> Purpose </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>

              @if(count($accounts))

              @foreach($accounts as $c)

              <tr>
                <td>


                  @if( !empty($c->th_attach))

                  <a href="{{ url('storage/categories/'.$c->th_attach) }}" target="_blank">{{ $c->th_tran_no }}</a>
                  @else
                  {{ $c->th_tran_no }}
                  @endif



                </td>
                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                <td>{{ $c->th_supp_name }}</td>
                <td>{{ date('d-m-Y', strtotime($c->th_bill_dt)) }}</td>
                <td>{{ $c->th_bill_no }}</td>
                <td class="text-right">{{ number_format($c->th_bill_amt,3) }}</td>
                <td>{{ $c->th_purpose }}</td>


                <td>
                  <a href="{{ route('admin.accounts.print', $c) }}">

                    <i class="fa fa-print text-green" aria-hidden="true"></i>

                  </a>
                  /



                  <a href="{{ route('admin.accounts.edit',$c->th_tran_no) }}">
                    <i class="fa fa-edit"></i>

                  </a>

                  /

                  <a data-catid={{$c->id}} data-toggle="modal" data-target="#delete">
                    <i class="fa fa-trash text-red"></i>

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

                <th> Tran No. </th>
                <th> Tran Date </th>
                <th> Supplier Name </th>
                <th> Bill Date </th>
                <th> Bill No. </th>
                <th> Bill Amount </th>
                <th> Purpose </th>
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

  <!-- Modal -->
  <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title text-left" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <form action="{{route('admin.accounts.destroy','test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
          <div class="modal-body">
            <p class="text-left">
              Are you sure you want to delete this transaction?
            </p>
            <input type="hidden" name="category_id" id="cat_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>



</section>




@endsection