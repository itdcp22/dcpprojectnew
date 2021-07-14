@extends('layouts.adminwp')
@section('content')

<!-- This script is used to allow only number in the bill amount field -->
<script>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  
</script>



<script>
    function calc1() 
        {
            var $dtf = document.getElementById('datepicker').value;
            var $dtt = document.getElementById('datepicker2').value;
            
            var dateFirst = new Date($dtf);
         var dateSecond = new Date($dtt);

         // time difference
         var timeDiff = Math.abs(dateSecond.getTime() - dateFirst.getTime());

         // days difference
         var $diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

         var $days = $diffDays +1 

         // difference
        // alert(diffDays);

        document.getElementById('rentdays').value = $days;   

        //document.getElementById('rentdays_' + id).value = $days; 

        } 
</script>



<script>
    function calBMI(id) {
     

       
        var $dtf = document.getElementById('datepicker').value;
            var $dtt = document.getElementById('datepicker2').value;

            var $dayrent = document.getElementById('rday_' + id).value;
            
            var dateFirst = new Date($dtf);
         var dateSecond = new Date($dtt);

         // time difference
         var timeDiff = Math.abs(dateSecond.getTime() - dateFirst.getTime());

         // days difference
         var $diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

         var $days = $diffDays +1 

         var $rentamt = $dayrent * $days;

         document.getElementById('amt_' + id).value = $rentamt.toFixed(3); 

      var $vt = $rentamt * .05;
      document.getElementById('vt_' + id).value = $vt.toFixed(3); 

      var $net = $rentamt + $vt;
     
      document.getElementById('net_' + id).value = $net.toFixed(3); 
     


    }
</script>



<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>




<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Rent Master</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('mall.utility.index')}}">Electricity</a></li>

                    <li class="breadcrumb-item"><a href="{{route('cwater')}}">Chilled Water</a></li>


                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <form class="needs-validation" name="myform" id="myform" novalidate method="post"
            action="{{ route('mall.utility.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1" for="">From</label>
                    <div class="col-lg-2">

                        <input class="form-control datepicker" onchange="calc1()" tabindex="1" id="datepicker"
                            name="ui_from_date" placeholder="mm-dd-yyyy">

                        <script>
                            $('#datepicker').datepicker({
        format: 'mm-dd-yyyy',
          uiLibrary: 'bootstrap4'
      });
                        </script>


                        <div class="clear-fix"></div>
                    </div>

                    <label class="col-lg-1" for="">To</label>
                    <div class="col-lg-2">

                        <input class="form-control datepicker" tabindex="2" id="datepicker2" name="ui_to_date"
                            placeholder="mm-dd-yyyy" tabindex="1" onchange="calc1()" required>

                        <script>
                            $('#datepicker2').datepicker({
        format: 'mm-dd-yyyy',
          uiLibrary: 'bootstrap4'
      });
                        </script>


                        <div class="clear-fix"></div>
                    </div>

                    <label class="col-lg-1" for="">Days</label>
                    <div class="col-lg-1">
                        <input class="form-control datepicker" tabindex="2" id="rentdays" name="ui_rent_days" readonly>

                        <div class="clear-fix"></div>
                    </div>

                    <label class="col-lg-1" for="">Type</label>
                    <div class="col-lg-1">
                        <select class="custom-select" name="ui_type" id="ui_type" required>
                            <option value="Rent" selected>Rent</option>

                        </select>
                        <div class="clear-fix"></div>
                    </div>




                </div>
            </div>



            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>



                            <th> Brand </th>
                            <th> Area </th>
                            <th> Base Rent </th>
                            <th> Service Charge </th>
                            <th>Chilled Water </th>
                            <th> Maketing Fees </th>


                            <th> Rent per day </th>
                            <th>Amount</th>
                            <th>VAT 5%</th>
                            <th>Net Amount</th>


                        </tr>
                    </thead>
                    <tbody>

                        @if(count($brand))

                        @foreach($brand as $brand)

                        <tr>



                            <td>
                                <input class="form-control" type="text" name="ui_brand_name[]" tabindex="-1"
                                    value="{{ $brand->bm_name}}" readonly>
                                <input class="form-control" type="hidden" name="ui_brand_id[]" value="{{ $brand->id}}">
                                <input class="form-control" type="hidden" name="ui_comp_id[]"
                                    value="{{ $brand->bm_tm_id}}">
                                <input class="form-control" type="hidden" name="ui_comp_name[]"
                                    value="{{ $brand->bm_tm_name}}">
                                <input class="form-control" type="hidden" name="ui_vat_no[]"
                                    value="{{ $brand->bm_vat}}">
                            </td>

                            <td>
                                <input class="form-control text-right" type="number" value="{{(($brand->bm_size ) )
                                                                    }}" onkeyup="calBMI({{ $brand->id + 1 }})"
                                    tabindex="-1" readonly>
                            </td>

                            <td>
                                <input class="form-control text-right" type="number" value="{{(($brand->bm_base_rent) )
                                                                    }}" onkeyup="calBMI({{ $brand->id + 1 }})"
                                    tabindex="-1" readonly>
                            </td>

                            <td>
                                <input class="form-control text-right" type="number" value="{{(( $brand->bm_fixed_service) )
                                                                    }}" onkeyup="calBMI({{ $brand->id + 1 }})"
                                    tabindex="-1" readonly>
                            </td>
                            <td>
                                <input class="form-control text-right" type="number" value="{{(( $brand->bm_fixed_cwater) )
                                                                    }}" onkeyup="calBMI({{ $brand->id + 1 }})"
                                    tabindex="-1" readonly>
                            </td>
                            <td>
                                <input class="form-control text-right" type="number" value="{{(( $brand->bm_fixed_marketing) )
                                                                    }}" onkeyup="calBMI({{ $brand->id + 1 }})"
                                    tabindex="-1" readonly>
                            </td>


                            <td>
                                <input class="form-control text-right" type="number" name="ui_rent_per_day[]" value="{{((($brand->bm_size * $brand->bm_base_rent) * 12)
                                 + (($brand->bm_size * $brand->bm_fixed_service) * 12)
                                    + (($brand->bm_size * $brand->bm_fixed_cwater) * 12) + (($brand->bm_size * $brand->bm_fixed_marketing) * 12))/365
                                    }}" id="{{ 'rday_' . ($brand->id+1) }}" onkeyup="calBMI({{ $brand->id + 1 }})">
                            </td>



                            <td>

                                <input class="form-control text-right" type="text"
                                    onkeyup="calBMI({{ $brand->id + 1 }})" id="{{ 'amt_' . ($brand->id+1) }}"
                                    name="ui_amount[]" readonly>


                            </td>

                            <td>


                                <input class="form-control text-right" type="text" name="ui_vat[]" value=""
                                    tabindex="-1" id="{{ 'vt_' . ($brand->id+1) }}" readonly>



                            </td>

                            <td>


                                <input class="form-control text-right" type="text" name="ui_netamount[]" tabindex="-1"
                                    id="{{ 'net_' . ($brand->id+1) }}" readonly>
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



                            <th class="col-md-2"> Brand </th>
                            <th> Area </th>
                            <th> Base Rent </th>
                            <th> Service Charge </th>
                            <th>Chilled Water </th>
                            <th> Maketing Fees </th>


                            <th> Rent per day </th>
                            <th>Amount</th>
                            <th>VAT 5%</th>
                            <th>Net Amount</th>



                        </tr>
                    </tfoot>
                </table>

            </div>









            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1">Narration:</label>
                    <div class="col">
                        <input class="form-control" name="ui_remarks" tabindex="3" type="text">
                    </div>
                </div>
            </div>





            <div class="form-group">
                <input type="submit" class="btn btn-primary" tabindex="4" Value="Save">
                <a href="{{route('mall.tenant.index')}}" class="btn btn-warning" role="button">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection