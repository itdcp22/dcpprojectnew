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
                    <h3 class="card-title">Rent Master
                        <a href="{{ route('rent_create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> Batch ID </th>
                                <th> Brand Name </th>

                                <th> Invoice # </th>
                                <th> Invoice Date</th>
                                <th> Duration</th>
                                <th> Days</th>
                                <th> Rent Per Day</th>
                                <th> Amount</th>
                                <th>Tax</th>
                                <th> Net Total</th>
                                <th> Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if(count($utility))

                            @foreach($utility as $c)

                            <tr>
                                <td>{{ $c->ui_tran_no }}</td>
                                <td>{{ $c->ui_brand_name }}</td>

                                <td class="text-leftt">{{ date('d-m-Y', strtotime($c->ui_from_date)) }} to
                                    {{ date('d-m-Y', strtotime($c->ui_to_date)) }}
                                </td>
                                <td class="text-left">{{ $c->ui_inv_no}}</td>
                                <td class="text-left">{{ date('d-m-Y', strtotime($c->created_at))}}</td>

                                <td class="text-right">{{ $c->ui_rent_days }}</td>
                                <td class="text-right">{{ number_format($c->ui_rent_per_day,3) }}</td>
                                <td class="text-right">{{ number_format($c->ui_amount,3) }}</td>




                                <td class="text-right">{{ number_format($c->ui_vat,3) }}</td>


                                <td class="text-right">{{ number_format($c->ui_netamount,3) }}</td>








                                <td>

                                    <a href="{{ route('mall.utility.rentshow',$c->id) }}">
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
                                <td colspan="11">No Record Found</td>
                            </tr>
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th> Batch ID </th>
                                <th> Brand Name </th>

                                <th> Invoice # </th>
                                <th> Invoice Date</th>
                                <th> Duration</th>
                                <th> Days</th>
                                <th> Rent Per Day</th>
                                <th> Amount</th>
                                <th>Tax</th>
                                <th> Net Amount</th>
                                <th> Action</th>

                            </tr>
                        </tfoot>

                        <div class="row">
                            <div class="col text-right">
                                <a href="{{route('mall.utility.ebindexexport')}}">
                                    <i class="far fa-file-excel fa-2x text-green"></i>


                                </a>
                            </div>
                        </div>


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