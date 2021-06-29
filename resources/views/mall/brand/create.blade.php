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




<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Brand Master</h1>
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
      action="{{ route('mall.brand.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">



      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Name</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_name"
              placeholder="Enter brand name" required>
          </div>
          <label class="col-lg-2" for="">Location</label>
          <div class="col-lg-3">


            <select class="custom-select" name="bm_location" id="bm_location" required>
              <option value="" selected disabled hidden>Please select</option>
              <option value="Lower Ground">Lower Ground</option>
              <option value="Ground Floor">Ground Floor</option>
              <option value="First Floor">First Floor</option>
              <option value="Second Floor">Second Floor</option>

            </select>


          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Unit Number</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_unit_no"
              placeholder="Enter unit number" required>
          </div>
          <label class="col-lg-2" for="">Area</label>
          <div class="col-lg-3">
            <input type="number" class="form-control" id="validationCustom02" name="bm_size"
              placeholder="Enter the area in SQM">
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Category</label>
          <div class="col-lg-3">
            <select class="custom-select" name="bm_category" id="bm_categor" required>
              <option value="" selected disabled hidden>Please select</option>
              <option value="Services">Services</option>
              <option value="F and B">F&B</option>
              <option value="First Floor">First Floor</option>
              <option value="Fashion">Fashion</option>

            </select>
          </div>
          <label class="col-lg-2" for="">Sub Category</label>
          <div class="col-lg-3">
            <select class="custom-select" name="bm_sub_categor" id="bm_sub_categor" required>
              <option value="" selected disabled hidden>Please select</option>
              <option value="Lower Ground">Lower Ground</option>
              <option value="Ground Floor">Ground Floor</option>
              <option value="First Floor">First Floor</option>
              <option value="Second Floor">Second Floor</option>

            </select>
          </div>
        </div>
      </div>






      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Contact Person</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_contact"
              placeholder="Enter contact person" required>
          </div>
          <label class="col-lg-2" for="">Designation</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_designation"
              placeholder="Enter designation">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Telephone Number</label>
          <div class="col-lg-3">
            <input type="number" class="form-control" id="validationCustom02" name="bm_tel"
              placeholder="Enter telephone Number">
          </div>
          <label class="col-lg-2" for="">Mobile Number</label>
          <div class="col-lg-3">
            <input type="number" class="form-control" id="validationCustom02" name="bm_mobile"
              placeholder="Enter mobile number">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_email"
              placeholder="Enter general email">
          </div>
          <label class="col-lg-2" for="">VAT #</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_vat"
              placeholder="Enter VAT number">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Finance Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_fina_email"
              placeholder="Enter finance email">
          </div>
          <label class="col-lg-2" for="">Operation Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_oper_email"
              placeholder="Enter operation email">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Date Of Opening</label>
          <div class="col-lg-3">


            <input class="form-control datepicker" tabindex="3" id="datepicker2" name="bm_open_date"
              placeholder="dd-mm-yyyy" required>

            <script>
              $('#datepicker2').datepicker({
        format: 'dd-mm-yyyy',
          uiLibrary: 'bootstrap4'
      });
            </script>




          </div>
          <label class="col-lg-2" for="">Company Name</label>
          <div class="col-lg-3">
            <select class="custom-select" name="bm_tm_id" id="bm_tm_id" required>
              <option value="" selected disabled hidden>Please select</option>
              @foreach($tenant as $t)
              <option value="{{ $t->id}}">{{ $t->tm_name}}</option>
              @endforeach
            </select>
            <input type="hidden" id="bm_tm_name" name="bm_tm_name">
            <script>
              $('#bm_tm_id').on('change', function() 
                                           {
                                             var selectedName = $('#bm_tm_id option:selected').text();
                                            $('#bm_tm_name').val(selectedName);
                                                      }
                                            )
            </script>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Type</label>
          <div class="col-lg-3">

            <select class="custom-select" name="bm_type" id="bm_type" required>
              <option value="" selected disabled hidden>Please select</option>

              <option value="Showroom">Showroom</option>
              <option value="Outlet">Outlet</option>
              <option value="Office">Office</option>
              <option value="Kiosk">Kiosk</option>

            </select>


          </div>
          <label class="col-lg-2" for="">Status</label>
          <div class="col-lg-3">

            <select class="custom-select" name="bm_status" id="bm_status">
              <option value="" selected disabled hidden>Active</option>

              <option value="1">Active</option>
              <option value="0">Inactive</option>

            </select>

          </div>
        </div>
      </div>





      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Select services</label>
          <div class="col-sm-6">
            <div class="d-flex mb-3">
              <div class="p-2 flex-fill" options><input type="checkbox" value="Electricity" name="bm_eb"
                  checked>Electricty
              </div>

              <div class="p-2 flex-fill "><input type="checkbox" value="Cwater" name="bm_cwater" checked>Chill Water
              </div>
              <div class="p-2 flex-fill "><input type="checkbox" value="Water" name="bm_water">Water</div>
              <div class="p-2 flex-fill ">
                <input type="checkbox" value="Promotion" name="Sewage">Sewage
              </div>
              <div class="p-2 flex-fill "><input type="checkbox" value="Plumbing" name="bm_service">Service
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec Meter #</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_eb_meter1_no">
          </div>
          <label class="col-lg-1" for="">C.Water Meter #</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_cwater_meter_no">
          </div>
          <label class="col-lg-1" for="">Water Meter #</label>
          <div class="col-lg-2  ">
            <input type="text" class="form-control" id="validationCustom02" name="bm_water_meter_no">
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec Rate</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_eb_rate">
          </div>
          <label class="col-lg-1" for="">C.Water Rate</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_cwater_rate">
          </div>
          <label class="col-lg-1" for="">Water Rate</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_water_rate">
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec OB</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_eb_ob">
          </div>
          <label class="col-lg-1" for="">C.Water OB</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_cwater_ob">
          </div>
          <label class="col-lg-1" for="">Water OB</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="bm_water_ob">
          </div>

        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec Type</label>
          <div class="col-lg-2">

            <select class="custom-select" name="bm_eb_bill_type" id="bm_eb_bill_type" required>
              <option value="" selected disabled hidden>Please select</option>

              <option value="Reading">Reading</option>

            </select>


          </div>
          <label class="col-lg-1" for="">C.Water Type</label>
          <div class="col-lg-2">

            <select class="custom-select" name="bm_cwater_bill_type" id="bm_cwater_bill_type">
              <option value="" selected disabled hidden>Please select</option>

              <option value="Reading">Reading</option>
              <option value="Area">Area</option>

            </select>


          </div>
          <label class="col-lg-1" for="">Water Type</label>
          <div class="col-lg-2">

            <select class="custom-select" name="bm_water_bill_type" id="bm_water_bill_type">
              <option value="" selected disabled hidden>Please select</option>

              <option value="Reading">Reading</option>
              <option value="Reading">Flat</option>

            </select>


          </div>

        </div>
      </div>









      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Comments</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="tm_comments"
              placeholder="Enter comments">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>









      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('mall.brand.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection