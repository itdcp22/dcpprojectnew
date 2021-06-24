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
                    <h3 class="card-title">Paid Invoices

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> Batch ID </th>
                                <th> Brand Name </th>
                                <th> Company Name </th>
                                <th> Type </th>
                                <th> Duration </th>
                                <th> Invoice # </th>
                                <th> Invoice Date</th>

                                <th> Net Amount</th>
                                <th> Payment Date</th>

                                <th> Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if(count($utility))

                            @foreach($utility as $c)

                            <tr>
                                <td>{{ $c->ui_tran_no }}</td>
                                <td>{{ $c->ui_brand_name }}</td>
                                <td>{{ $c->ui_comp_name }}</td>
                                <td>{{ $c->ui_type }}</td>
                                <td>{{ date('d-m-Y', strtotime($c->ui_from_date)) }} to
                                    {{ date('d-m-Y', strtotime($c->ui_to_date)) }}
                                </td>
                                <td class="text-right">{{ $c->ui_inv_no}}</td>
                                <td class="text-right">{{ date('d-m-Y', strtotime($c->created_at))}}</td>
                                <td class="text-right">{{ number_format($c->ui_netamount,3) }}</td>
                                <td class="text-right">{{ date('d-m-Y', strtotime($c->ui_payment_date))}}</td>

                                <td>
                                    <a href="{{ route('mall.utility.show',$c->id) }}">
                                        <i class="fa fa-print text-green"></i>

                                    </a>
                                    /
                                    <a href="{{ route('mall.utility.edit',$c->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="12">No Record Found</td>
                            </tr>
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>

                                <th> Batch ID </th>
                                <th> Brand Name </th>
                                <th> Company Name </th>
                                <th> Type </th>
                                <th> Duration </th>
                                <th> Invoice # </th>
                                <th> Invoice Date</th>

                                <th> Net Amount</th>
                                <th> Payment Date</th>

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