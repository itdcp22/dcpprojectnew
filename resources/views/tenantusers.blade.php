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


                                <th> Name </th>
                                <th> Mobile</th>

                                <th> Email </th>
                                <th> Brand </th>
                                <th> Type </th>
                                <th> Created Date </th>

                                <th> Authorised By </th>
                                <th> Last Seen</th>
                                <th> Status </th>





                            </tr>
                        </thead>
                        <tbody>



                            @foreach($users as $user)

                            <tr>


                                <td>{{ $user->name }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->brand_name }}</td>

                                <td>{{ $user->user_type}}</td>
                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

                                <td>{{ $user->flex1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>

                                <td>
                                    @if(Cache::has('user-is-online-' . $user->id))
                                    <span class="text-success">Online</span>
                                    @else
                                    <span class="text-secondary">Offline</span>
                                    @endif
                                </td>






                            </tr>
                            @endforeach





                        </tbody>
                        <tfoot>
                            <tr>


                                <th> Name </th>
                                <th> Mobile</th>
                                <th> Email </th>
                                <th> Brand </th>
                                <th> Type </th>
                                <th> Created Date </th>

                                <th> Authorised By </th>
                                <th> Last Seen</th>
                                <th> Status </th>



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