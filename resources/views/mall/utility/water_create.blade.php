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
    $(function()
{
    $("#myform").validate(
      {
        rules: 
        {
          item: 
          {
            required: true
          }
        }
      });	
});
</script>

<script>
    function calBMI(id) {
      let rt = document.getElementById('rate_' + id).value;
        let ob = document.getElementById('ob_' + id).value;
        let cb = document.getElementById('cb_' + id).value;
     
        let cons = cb - ob;
        document.getElementById('cons_' + id).value = cons;
  
        let amt = ( 264.172 * rt ) * cons;
        document.getElementById('amt_' + id).value = amt.toFixed(3); 

        let samt = amt * .30;
        document.getElementById('samt_' + id).value = samt.toFixed(3); 

        var water_sewage = amt + samt;
  
        let vt = water_sewage  *.05;
        document.getElementById('vt_' + id).value = vt.toFixed(3); 
  
        let net = water_sewage + vt;
        document.getElementById('net_' + id).value = net.toFixed(3); 

        
    }
</script>


<script>
    function calc() 
        {
    
        var eb_rate = document.getElementById('bm_eb_rate[]').value;
        var eb_cb = document.getElementById('bm_eb_cb[]').value;
        var eb_ob = document.getElementById('bm_eb_ob[]').value;

        var consumed = eb_cb - eb_ob;
        document.getElementById('ui_consumed[]').value = consumed;  

        var amount = consumed * eb_rate; 
        document.getElementById('ui_amount[]').value = amount.toFixed(3);  

        var vat = amount * .05;
        document.getElementById('ui_vat[]').value = vat.toFixed(3);  

        var netamount = amount + vat;
        document.getElementById('ui_netamount[]').value = netamount.toFixed(3);            
            
        }   

        function calc1(rowNo)

     
var eb_rate = document.getElementById('bm_eb_rate[]').value;
var fruitsnew = ["apple", "orange", "cherry"];
fruits.forEach(myFunction);
fruitsnew.forEach(myFunction);

var eb_cb = document.getElementById('bm_eb_cb[]').value;
        var eb_ob = document.getElementById('bm_eb_ob[]').value;

        var consumed = eb_cb - eb_ob;
        document.getElementById('ui_consumed[]').value = consumed; 

        

function myFunction(item, index) {
  document.getElementById("demo").innerHTML += index + ":" + item + "<br>"; 
}



{
	var eb_rate = document.getElementById('bm_eb_rate_' + rowNo).value;
	...
	document.getElementById('ui_consumed_' + rowNo).value = consumed;
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
                <h1 class="m-0 text-dark">Water Master</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="{{route('mall.workpermit.index')}}">Workpermit</a></li>


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

                        <input class="form-control datepicker" tabindex="1" id="datepicker" name="ui_from_date"
                            value="{{ date('d-m-Y', strtotime($utility. ' + 1 days'))  }}" placeholder="dd-mm-yyyy"
                            required readonly>

                        <script>
                            $('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
          uiLibrary: 'bootstrap4'
      });
                        </script>


                        <div class="clear-fix"></div>
                    </div>

                    <label class="col-lg-1" for="">To</label>
                    <div class="col-lg-2">

                        <input class="form-control datepicker" tabindex="2" id="datepicker2" name="ui_to_date"
                            placeholder="dd-mm-yyyy" required readonly>

                        <script>
                            $('#datepicker2').datepicker({
        format: 'dd-mm-yyyy',
          uiLibrary: 'bootstrap4'
      });
                        </script>
                        <div class="clear-fix"></div>
                    </div>

                    <label class="col-lg-2" for="">Type</label>
                    <div class="col-lg-2">
                        <select class="custom-select" name="ui_type" id="ui_type" required>
                            <option value="Water" selected>Water</option>
                        </select>
                        <div class="clear-fix"></div>
                    </div>




                </div>
            </div>



            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th class="col-md-2"> Brand </th>
                            <th class="col-md-1">Unit Rate</th>
                            <th class="col-md-1"> OMR </th>
                            <th class="col-md-1"> CMR </th>
                            <th class="col-md-1"> Consumed </th>
                            <th class="col-md-1">Water Amount</th>
                            <th class="col-md-1">Sewage Amount</th>
                            <th class="col-md-1">VAT 5%</th>
                            <th class="col-md-1">Net Amount</th>

                        </tr>
                    </thead>
                    <tbody>

                        @if(count($brand))

                        @foreach($brand as $brand)

                        <tr>



                            <td>
                                <input class="form-control" type="text" name="ui_brand_name[]"
                                    value="{{ $brand->bm_name}}" readonly>
                                <input class="form-control" type="hidden" name="ui_brand_id[]" value="{{ $brand->id}}">
                                <input class="form-control" type="hidden" name="ui_comp_id[]"
                                    value="{{ $brand->bm_tm_id}}">
                                <input class="form-control" type="hidden" name="ui_comp_name[]"
                                    value="{{ $brand->bm_tm_name}}">
                                <input class="form-control" type="hidden" name="ui_vat_no[]"
                                    value="{{ $brand->bm_vat}}">
                                <input class="form-control" type="hidden" name="ui_unit_no[]"
                                    value="{{ $brand->bm_unit_no}}">
                            </td>







                            <td>
                                <input class="form-control" id="{{ 'rate_' . ($brand->id+1) }}" type="number"
                                    name="ui_rate[]" value="{{ $brand->bm_water_rate}}" readonly>

                            </td>
                            <td> <input class="form-control" oninput="calBMI({{ $brand->id + 1 }})" name="ui_omr[]"
                                    id="{{ 'ob_' . ($brand->id+1) }}" type="number" value="{{ $brand->bm_water_ob}}"
                                    readonly>
                            </td>
                            <td> <input class="form-control" oninput="calBMI({{ $brand->id + 1 }})" name="ui_cmr[]"
                                    id="{{ 'cb_' . ($brand->id+1) }}" type="number">
                            </td>

                            <td> <input class="form-control" name="ui_consumed[]" id="{{ 'cons_' . ($brand->id+1) }}"
                                    readonly>
                            </td>

                            <td> <input class="form-control text-right" type="text" name="ui_amount[]"
                                    id="{{ 'amt_' . ($brand->id+1) }}" readonly>
                            </td>

                            <td> <input class="form-control text-right" type="text" name="ui_sewage[]"
                                    id="{{ 'samt_' . ($brand->id+1) }}" readonly>
                            </td>

                            <td> <input class="form-control text-right" type="text" name="ui_vat[]"
                                    id="{{ 'vt_' . ($brand->id+1) }}" readonly>
                            </td>

                            <td> <input class="form-control text-right" type="text" name="ui_netamount[]"
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



                            <th> Brand </th>

                            <th>Unit Rate</th>
                            <th> OMR </th>
                            <th> CMR </th>
                            <th> Consumed </th>
                            <th>Water Amount</th>
                            <th>Sewage Amount</th>

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
                        <input class="form-control" name="ui_remarks" type="text">
                    </div>
                </div>
            </div>










            <div class="form-group">
                <input type="submit" class="btn btn-primary" Value="Save">
                <a href="{{route('mall.tenant.index')}}" class="btn btn-warning" role="button">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection