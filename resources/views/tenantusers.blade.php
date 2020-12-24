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
                    <h3 class="card-title">Tenant List</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <TH>ID</TH>
                                <th> User Name </th>
                                <th> Mobile</th>

                                <th> Email </th>
                                <th> Company Name </th>
                                <th> Type </th>
                                <th> Created Date </th>
                                <th> Verified Date </th>




                            </tr>
                        </thead>
                        <tbody>



                            @foreach($users as $user)

                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->dept }}</td>

                                <td>{{ $user->user_type}}</td>
                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($user->email_verified_at)) }}</td>





                            </tr>
                            @endforeach





                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th> User Name </th>
                                <th> Mobile</th>
                                <th> Email </th>
                                <th> Company Name </th>
                                <th> Type </th>
                                <th> Created Date </th>
                                <th> Verified Date </th>


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