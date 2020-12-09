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
                    <h3 class="card-title">User List</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> User ID </th>
                                <th> User Name </th>
                                <th> Email </th>
                                <th> Company Name </th>
                                <th> Type </th>

                                <th> Created Date </th>
                                <th> Status </th>
                                <th> Last Seen</th>


                            </tr>
                        </thead>
                        <tbody>



                            @foreach($users as $user)

                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    @if($user->company =='1')
                                    {{ "Al Jarwani"}}
                                    @elseif($user->company =='2')
                                    {{"Mall Of Muscat"}}
                                    @elseif($user->company =='3')
                                    {{"Oman Aquarium"}}
                                    @elseif($user->company =='4')
                                    {{"Snow Village"}}
                                    @endif

                                </td>


                                <td>{{ $user->user_type}}</td>
                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

                                <td>
                                    @if(Cache::has('user-is-online-' . $user->id))
                                    <span class="text-success">Online</span>
                                    @else
                                    <span class="text-secondary">Offline</span>
                                    @endif
                                </td>

                                <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>



                            </tr>
                            @endforeach





                        </tbody>
                        <tfoot>
                            <tr>

                                <th> User ID </th>
                                <th> User Name </th>
                                <th> Email </th>
                                <th> Company Name </th>
                                <th> Type </th>

                                <th> Created Date </th>
                                <th> Status</th>
                                <th> Last Seen</th>

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