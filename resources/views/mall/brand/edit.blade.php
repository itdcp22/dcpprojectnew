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


          <li class="breadcrumb-item"><a href="{{route('mall.brand.index')}}">Brands</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.brand.update',$brand->id) }}" enctype="multipart/form-data" autocomplete="off"
      autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @method('PUT')


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Name</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_name"
              placeholder="Enter brand name" value="{{ $brand->bm_name}}" required>
          </div>
          <label class="col-lg-2" for="">Location</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_location"
              placeholder="Enter location details" value="{{ $brand->bm_location}}" required>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Unit Number</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_unit_no"
              value="{{ $brand->bm_unit_no}}" required>
          </div>
          <label class="col-lg-2" for="">Area</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_size" value="{{ $brand->bm_size}}">
          </div>
        </div>
      </div>





      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Contact Person</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_contact"
              value="{{ $brand->bm_contact}}" placeholder="Enter contact person" required>
          </div>
          <label class="col-lg-2" for="">Designation</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_designation"
              value="{{ $brand->bm_designation}}" placeholder="Enter designation">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Telephone Number</label>
          <div class="col-lg-3">
            <input type="number" class="form-control" id="validationCustom02" name="bm_tel" value="{{ $brand->bm_tel}}"
              placeholder="Enter telephone Number">
          </div>
          <label class="col-lg-2" for="">Mobile Number</label>
          <div class="col-lg-3">
            <input type="number" class="form-control" id="validationCustom02" name="bm_mobile"
              value="{{ $brand->bm_mobile}}" placeholder="Enter mobile number">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_email"
              value="{{ $brand->bm_email}}" placeholder="Enter general email">
          </div>
          <label class="col-lg-2" for="">VAT #</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_vat" value="{{ $brand->bm_vat}}"
              placeholder="Enter VAT number">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Finance Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_fina_email"
              value="{{ $brand->bm_fina_email}}" placeholder="Enter finance email">
          </div>
          <label class="col-lg-2" for="">Operation Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_oper_email"
              value="{{ $brand->bm_oper_email}}" placeholder="Enter operation email">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Date Of Opening</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_open_date"
              value="{{ date('d-m-Y', strtotime($brand->bm_open_date)) }}" placeholder="Enter date of opening">
          </div>
          <label class="col-lg-2" for="">Company Name</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" value="{{$brand->bm_tm_name}}" readonly>



          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Type</label>
          <div class="col-lg-3">

            <select class="custom-select select2" name="bm_type" id="bm_type" required>
              <option value="{{ $brand->bm_type}}">{{ $brand->bm_type}}</option>

              <option value="Showroom">Showroom</option>
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
              <div class="p-2 flex-fill" options>




                <input name="bm_eb" type="checkbox" class="form-check-input" value="Electricity"
                  {{ ($brand->bm_eb == "Electricity" ? 'checked' : '')}}>


                Electricty
              </div>

              <div class="p-2 flex-fill ">
                <input name="bm_cwater" type="checkbox" class="form-check-input" value="Cwater"
                  {{ ($brand->bm_cwater == "Cwater" ? 'checked' : '')}}>
                Chill Water
              </div>

              <div class="p-2 flex-fill ">
                <input name="bm_water" type="checkbox" class="form-check-input" value="Water"
                  {{ ($brand->bm_water == "Water" ? 'checked' : '')}}>
                Water
              </div>


              <div class="p-2 flex-fill ">

                <input name="bm_sewage" type="checkbox" class="form-check-input" value="Sewage"
                  {{ ($brand->bm_sewage == "Sewage" ? 'checked' : '')}}>
                Sewage


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
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_eb_meter1_no}}"
              name="bm_eb_meter1_no">
          </div>
          <label class="col-lg-1" for="">C.Water Meter #</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_cwater_meter_no}}"
              name="bm_cwater_meter_no">
          </div>
          <label class="col-lg-1" for="">Water Meter #</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_water_meter_no}}"
              name="bm_water_meter_no">
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec Rate</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_eb_rate}}"
              name="bm_eb_rate">
          </div>
          <label class="col-lg-1" for="">C.Water Rate</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_cwater_rate}}"
              name="bm_cwater_rate">
          </div>
          <label class="col-lg-1" for="">Water Rate</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_water_rate}}"
              name="bm_water_rate">
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec OB</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_eb_ob}}"
              name="bm_eb_ob">
          </div>
          <label class="col-lg-1" for="">C.Water OB</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_cwater_ob}}"
              name="bm_cwater_ob">
          </div>
          <label class="col-lg-1" for="">Water OB</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" value="{{ $brand->bm_water_ob}}"
              name="bm_water_ob">
          </div>

        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Elec Type</label>
          <div class="col-lg-2">




            <select class="custom-select select2" name="bm_eb_bill_type" id="bm_eb_bill_type" required>
              <option value="{{ $brand->bm_eb_bill_type}}">{{ $brand->bm_eb_bill_type}}
              </option>

              <option value="Reading">Reading</option>

            </select>


          </div>
          <label class="col-lg-1" for="">C.Water Type</label>
          <div class="col-lg-2">

            <select class="custom-select select2" name="bm_cwater_bill_type" id="bm_cwater_bill_type" required>
              <option value="{{ $brand->bm_cwater_bill_type}}">{{ $brand->bm_cwater_bill_type}}
              </option>

              <option value="Reading">Reading</option>
              <option value="Area">Area</option>

            </select>


          </div>
          <label class="col-lg-1" for="">Water Type</label>
          <div class="col-lg-2">

            <select class="custom-select select2" name="bm_water_bill_type" id="bm_water_bill_type" required>
              <option value="{{ $brand->bm_water_bill_type}}">{{ $brand->bm_water_bill_type}}
              </option>

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
            <input type="text" class="form-control" id="validationCustom02" name="bm_comments"
              placeholder="Enter comments" value="{{ $brand->bm_flex1}}">
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