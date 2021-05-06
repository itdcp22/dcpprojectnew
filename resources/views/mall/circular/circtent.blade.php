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
                    <h3 class="card-title">Circular Details
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> Date </th>
                                <th> Circular No </th>

                                <th>Subject</th>
                                <th> Document </th>
                                <th> Created By </th>

                            </tr>
                        </thead>
                        <tbody>





                            @if(count($circular))

                            @foreach($circular as $c)


                            <?php $dt = date("d-m-Y");
           
      
              $fdate = $c->created_at;
             $tdate = $dt;
             $datetime1 = new DateTime($fdate);
             $datetime2 = new DateTime($tdate);
             $interval = $datetime1->diff($datetime2);
             $days = $interval->format('%a');//now do whatever you like with $days
              // echo $days;
 
               ?>




                            <tr>


                                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                                <td> {{ $c->ci_circular_no }} </td>

                                @if($days > 2 )

                                <td>{{ $c->ci_subject}}


                                </td>
                                @else
                                <td>{{ $c->ci_subject}}
                                    <span class="right badge badge-success">New</span>
                                </td>
                                @endif


                                <td>



                                    <a href="{{ url('storage/categories/'.$c->ci_document) }}" target="popup"
                                        onclick="window.open('{{ url('storage/categories/'.$c->ci_document) }}','popup','width=800,height=800'); return false;">
                                        PDF
                                    </a>


                                </td>


                                <td> {{ $c->ci_user_name }} </td>


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
                                <th> Date </th>
                                <th> Circular No </th>

                                <th>Subject</th>
                                <th> Document </th>
                                <th> Created By </th>


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