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
          <h3 class="card-title">Purchase Request 1
            <a href="{{ route('purchase.purchaserequest.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> Company </th>
                <th> Brand </th>
                <th> Number</th>
                <th> Date </th>
                <th> Name </th>
                <th> Required Date </th>
                <th>Status</th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>

              @if(count($purchaserequest))

              @foreach($purchaserequest as $c)

              <tr>



                <td>{{ $c->pr_req_comp_name }}</td>
                <td>{{ $c->pr_req_brand_name }}</td>
                <td>{{ $c->pr_req_no}}</td>
                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                <td>{{ $c->pr_req_name }}</td>
                <td>{{ date('d-m-Y', strtotime($c->pr_req_del_date)) }}</td>
                <td>
                  @if($c->pr_req_status =='1')
                  <div class="text-success">
                    Pending
                  </div>
                  @elseif($c->pr_req_status =='2')
                  <div class="text-primary">
                    Processed
                  </div>
                  @else
                  <div class="text-danger">
                    Unknown
                  </div>
                  @endif
                </td>

                <td>

                  <a href="{{ route('purchase.purchaserequest.show',$c->id) }}">
                    <i class="fa fa-print text-green"></i>

                  </a>

                  /


                  <a href="{{ route('procurement.purchaserequest.edit',$c->id) }}">
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

                <th> Company </th>
                <th> Brand </th>

                <th> Number</th>
                <th> Date </th>
                <th> Name </th>
                <th> Required Date </th>
                <th>Status</th>
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



<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title text-left" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('mall.workpermit.destroy','test')}}" method="post">
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



@endsection