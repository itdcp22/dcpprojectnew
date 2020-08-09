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
          <h3 class="card-title">Tenant Details
            <a href="{{ route('mall.tenant.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> ID </th>
                <th> Company Name </th>
                <th>Contact Person</th>
                <th> Telephone </th>
                <th> Mobile </th>
                <th> Email </th>
                <th>Created By</th>
                <th>Created Date</th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>

              @if(count($tenant))

              @foreach($tenant as $c)

              <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->tm_name }}</td>
                <td>{{ $c->tm_contact }}</td>
                <td>{{ $c->tm_tel}}</td>
                <td>{{ $c->tm_mobile}}</td>
                <td> {{ $c->tm_email }} </td>
                <td> {{ $c->tm_created_uid }} </td>
                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>

                <td>

                  <a href="{{ route('foh.booking.show',$c->id) }}">
                    <i class="fa fa-print text-green"></i>

                  </a>

                  /


                  <a href="{{ route('foh.booking.edit',$c->id) }}">
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
                <th> Company Name </th>
                <th>Contact Person</th>
                <th> Telephone </th>
                <th> Mobile </th>
                <th> Email </th>
                <th>Created By</th>
                <th>Created Date</th>
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