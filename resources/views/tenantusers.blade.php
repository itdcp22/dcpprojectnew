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
                    <h3 class="card-title">Pending User List</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <TH>ID</TH>
                                <th> User Name </th>
                                <th> Email </th>
                                <th> Company Name </th>
                                <th> Type </th>
                                <th> Created Date </th>
                                <th>Approve</th>



                            </tr>
                        </thead>
                        <tbody>



                            @foreach($users as $user)

                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->dept }}</td>

                                <td>{{ $user->user_type}}</td>
                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

                                <td>


                                    <a href="{{ route('users.edit',$user->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                </td>



                            </tr>
                            @endforeach





                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th> User Name </th>
                                <th> Email </th>
                                <th> Company Name </th>
                                <th> Type </th>
                                <th> Created Date </th>
                                <th>Approve</th>


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