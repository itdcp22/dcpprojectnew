@extends('layouts.adminplain')
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
                    <h3 class="card-title text-center">Unsettled Advance
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> Name </th>
                                <th> Amount </th>



                            </tr>
                        </thead>
                        <tbody>

                            @if(count($advances))

                            @foreach($advances as $c)

                            <tr>
                                <td>{{ $c->ca_emp_name }}</td>

                                <td class="text-right">{{ number_format($c->total,3) }}</td>










                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="11">No Record Found</td>
                            </tr>
                            @endif

                        </tbody>

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