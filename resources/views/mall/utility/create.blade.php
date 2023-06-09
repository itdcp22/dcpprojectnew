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
{
	var eb_rate = document.getElementById('bm_eb_rate_' + rowNo).value;

	document.getElementById('ui_consumed_' + rowNo).value = consumed;
}



</script>

<script>
  function calBMI5(id) {
      let rate = document.getElementById('bm_eb_rate' + id).value;
      let open = document.getElementById('bm_eb_ob' + id).value;
      let close = document.getElementById('bm_eb_cb' + id).value;
      var consumed = open - close;      
      document.getElementById('consumed' + id).value = consumed;
  }
</script>

<script>
  function calBMI(id) {
    let rt = document.getElementById('rate_' + id).value;
      let ob = document.getElementById('ob_' + id).value;
      let cb = document.getElementById('cb_' + id).value;
   
      let cons = cb - ob;
      document.getElementById('cons_' + id).value = cons;

      let amt = rt * cons;
      document.getElementById('amt_' + id).value = amt.toFixed(3); ;

      let vt = amt * .05;
      document.getElementById('vt_' + id).value = vt.toFixed(3); ;

      let net = amt + vt;
      document.getElementById('net_' + id).value = net.toFixed(3); ;
  }
</script>




<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Electricity Master</h1>
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

            <input class="form-control datepicker" tabindex="1" id="datepicker" name="ui_from_date" value=""
              placeholder="dd-mm-yyyy" required readonly>

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
              placeholder="mm-dd-yyyy" required readonly>

            <script>
              $('#datepicker2').datepicker({
        format: 'mm-dd-yyyy',
          uiLibrary: 'bootstrap4'
      });
            </script>


            <div class="clear-fix"></div>



          </div>



          <label class="col-lg-1" for="">Type</label>
          <div class="col-lg-2">
            <select class="custom-select" name="ui_type" id="ui_type" required>
              <option value="Electricity" selected>Electricity</option>

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
              <th>Unit Rate</th>
              <th> OMR </th>
              <th> CMR </th>
              <th> Consumed </th>
              <th>Amount</th>
              <th>VAT 5%</th>
              <th>Net Amount</th>
            </tr>
          </thead>
          <tbody>

            @if (count($errors) > 0)
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  @foreach($errors->all() as $error)
                  {{ $error }} <br>
                  @endforeach
                </div>
              </div>
            </div>
            @endif

            @if(count($brand))




            @foreach($brand as $brand)
            <tr>

              <td>
                <input class="form-control" type="text" name="ui_brand_name[]" value="{{ $brand->bm_name}}"
                  tabindex="-1" readonly>
                <input class="form-control" type="hidden" name="ui_brand_id[]" value="{{ $brand->id}}">
                <input class="form-control" type="hidden" name="ui_comp_id[]" value="{{ $brand->bm_tm_id}}">
                <input class="form-control" type="hidden" name="ui_comp_name[]" value="{{ $brand->bm_tm_name}}">
                <input class="form-control" type="hidden" name="ui_vat_no[]" value="{{ $brand->bm_vat}}">
                <input class="form-control" type="hidden" name="ui_unit_no[]" value="{{ $brand->bm_unit_no}}">
              </td>

              <td>
                <input class="form-control" id="{{ 'rate_' . ($brand->id+1) }}" type="number" name="ui_rate[]"
                  value="{{ $brand->bm_eb_rate}}" tabindex="-1" readonly>
              </td>

              <td>
                <input class="form-control" oninput="calBMI({{ $brand->id + 1 }})" name="ui_omr[]"
                  id="{{ 'ob_' . ($brand->id+1) }}" type="number" value="{{ $brand->bm_eb_ob}}" tabindex="-1" readonly>
              </td>
              <td>
                <input class="form-control" oninput="calBMI({{ $brand->id + 1 }})" name="ui_cmr[]"
                  id="{{ 'cb_' . ($brand->id+1) }}" type="number">
              </td>
              <td>
                <input class="form-control" name="ui_consumed[]" id="{{ 'cons_' . ($brand->id+1) }}" tabindex="-1"
                  readonly>
              </td>
              <td>
                <input class="form-control text-right" type="text" tabindex="-1" name="ui_amount[]"
                  id="{{ 'amt_' . ($brand->id+1) }}" readonly>
              </td>
              <td>
                <input class="form-control text-right" type="text" tabindex="-1" name="ui_vat[]"
                  id="{{ 'vt_' . ($brand->id+1) }}" readonly>
              </td>
              <td>
                <input class="form-control text-right" type="text" tabindex="-1" name="ui_netamount[]"
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
            <input class="form-control" name="ui_remarks" type="text">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col text-right">
          <a href="{{route('mall.utility.ebcreateexport')}}">
            <i class="far fa-file-excel fa-2x text-green"></i>


          </a>
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