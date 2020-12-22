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
          <h3 class="card-title">Work Permit
            <a href="{{ route('mall.workpermit.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> Date </th>
                <th> Company </th>
                <th> Brand</th>
                <th> Applicant </th>
                <th> Mobile </th>
                <th> Date From</th>
                <th> Date To</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>App / Rej By</th>
                <th>App / Rej Date</th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>

              @if(count($workpermit))

              @foreach($workpermit as $c)

              <tr>
                <td>{{ $c->wp_request_id }}</td>
                <td>{{ date('d-m-Y h:i A', strtotime($c->created_at)) }}</td>

                <td>{{ $c->wp_comp_name }}</td>

                <td>{{ $c->wp_brand_name }}</td>
                <td>{{ $c->wp_applicant }}</td>
                <td>{{ $c->wp_mobile }}</td>

                <td>{{ date('d-m-Y', strtotime($c->wp_from_date)) }}</td>
                <td>{{ date('d-m-Y', strtotime($c->wp_to_date)) }}</td>
                <td>{{ date('h:i A', strtotime($c->wp_from_time)) }}</td>
                <td>{{ date('h:i A', strtotime($c->wp_to_time)) }}</td>

                <td>
                  @if($c->wp_status =='Pending')
                  <div class="text-success">
                    Pending
                  </div>
                  @elseif($c->wp_status =='Approved')
                  <div class="text-primary">
                    Approved
                  </div>
                  @else
                  <div class="text-danger">
                    Rejected
                  </div>
                  @endif
                </td>

                <td>{{ $c->wp_approved_name }}</td>
                <td>
                  @if ( !empty ( $c->wp_approved_date ) )
                  {{ date('d-m-Y', strtotime($c->wp_approved_date)) }}
                  @endif
                <td>
                  <a href="{{ route('mall.workpermit.show',$c->id) }}">
                    <i class="fa fa-print text-green"></i>
                  </a>
                  /
                  <a href="{{ route('mall.workpermitapp.edit',$c->id) }}">
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
                <td colspan="13">No Record Found</td>
              </tr>
              @endif

            </tbody>
            <tfoot>
              <tr>

                <th> ID </th>
                <th> Date </th>
                <th> Company </th>
                <th> Brand</th>
                <th> Applicant </th>
                <th> Mobile </th>
                <th> Date From</th>
                <th> Date To</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>App / Rej By</th>
                <th>App / Rej Date</th>
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