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
                    <h3 class="card-title">Sewage Master
                        <a href="{{ route('sewage_create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> ID </th>
                                <th> Brand Name </th>
                                <th> Company Name </th>
                                <th> Month </th>
                                <th> OMR </th>
                                <th> CMR </th>
                                <th>Consumed</th>
                                <th>Amount</th>
                                <th> Vat </th>
                                <th> Net Amount</th>
                                <th> Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if(count($utility))

                            @foreach($utility as $c)

                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->ui_brand_name }}</td>
                                <td>{{ $c->ui_comp_name }}</td>
                                <td>{{ $c->ui_month }}</td>
                                <td class="text-right">{{ $c->ui_omr}}</td>
                                <td class="text-right">{{ $c->ui_cmr}}</td>
                                <td class="text-right"> {{ $c->ui_consumed }} </td>

                                <td class="text-right">{{ number_format($c->ui_amount,3) }}</td>
                                <td class="text-right">{{ number_format($c->ui_vat,3) }}</td>
                                <td class="text-right">{{ number_format($c->ui_netamount,3) }}</td>



                                <td>

                                    <a href="{{ route('mall.utility.show',$c->id) }}">
                                        <i class="fa fa-print text-green"></i>

                                    </a>

                                    /


                                    <a href="{{ route('mall.brand.edit',$c->id) }}">
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
                                <th> Brand Name </th>
                                <th> Company Name </th>
                                <th> Month </th>
                                <th> OMR </th>
                                <th> CMR </th>
                                <th>Consumed</th>
                                <th>Amount</th>
                                <th> Vat </th>
                                <th> Net Amount</th>
                                <th> Action</th>

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