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
                    <h3 class="card-title">User Details
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Mobile</td>
                                <td>Email</td>
                                <td>Company</td>
                                <td>Created Date</td>
                                <td colspan=2>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($contacts))

                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->mobile}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->company}}</td>
                                <td>{{$contact->created_at}}</td>

                                <td>

                                    <a href="{{ route('contacts.edit',$contact->id) }}">
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

                                <td>ID</td>
                                <td>Name</td>
                                <td>Mobile</td>
                                <td>Email</td>
                                <td>Company</td>
                                <td>Created Date</td>
                                <td colspan=2>Actions</td>

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