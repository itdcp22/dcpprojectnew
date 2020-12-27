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
        <h1 class="m-0 text-dark">Work Permit Form</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('mallwp')}}">Dashboard</a></li>

          <li class="breadcrumb-item"><a href="{{route('mall.workpermit.index')}}">Pending</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.workpermit.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Applicant</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="validationCustom02" name="wp_applicant" value="{{ $user->name}}"
              placeholder="Enter name of applicant" tabindex="1" required>
          </div>
          <label class="col-lg-1" for="">Designation</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="wp_designation" name="wp_designation"
              placeholder="Enter designation" tabindex="2" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Mobile</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="wp_mobile" name="wp_mobile" placeholder="Enter mobile number"
              value="{{ $user->mobile}}" tabindex="3" required>

          </div>
          <label class="col-lg-1" for="">Email</label>
          <div class="col-lg-5">
            <input type="email" class="form-control" id="wp_email" name="wp_email" placeholder="Enter email address"
              value="{{ $user->email}}" tabindex="4" required>


          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Company</label>
          <div class="col-lg-5">



            <input type="text" class="form-control" id="wp_comp_name" name="wp_comp_name" value="{{ $tenant->tm_name}}"
              placeholder="Enter company name" readonly>
          </div>
          <label class="col-lg-1" for="">Brand</label>
          <div class="col-lg-5">

            <select class="custom-select" name="wp_brand_name" id="wp_brand_name" tabindex="5" required>
              <option value="" selected disabled hidden>Please select</option>
              @foreach($brand as $c)
              <option value="{{ $c->bm_name}}">{{ $c->bm_name}}</option>
              @endforeach

            </select>


          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Manager</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="wp_manager" name="wp_manager" value="{{ $tenant->tm_contact}}"
              placeholder="Enter manager name">
          </div>
          <label class="col-lg-1" for="">Contact</label>
          <div class="col-lg-5">



            <input type="text" class="form-control" id="wp_manager_contact" name="wp_manager_contact"
              value="{{ $tenant->tm_mobile}}" placeholder="Enter manager name">


          </div>
        </div>
      </div>

      <p class="bg-warning text-white"><strong>Work Duration</strong>
      </p>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Date From</label>
          <div class="col-lg-2">


            <input class="form-control datepicker" id="datepicker" name="wp_from_date" placeholder="dd-mm-yyyy"
              tabindex="6" value="{{ old('wp_from_date') }}" required>

            <script>
              $('#datepicker').datepicker({
                 format: 'dd-mm-yyyy',
                   uiLibrary: 'bootstrap4'
               });
            </script>


          </div>
          <label class="col-lg-1" for="">Date To</label>
          <div class="col-lg-2">


            <input class="form-control datepicker" id="datepicker1" name="wp_to_date" placeholder="dd-mm-yyyy"
              tabindex="7" value="{{ old('wp_to_date') }}" required>


            <script>
              $('#datepicker1').datepicker({
                 format: 'dd-mm-yyyy',
                   uiLibrary: 'bootstrap4'
               });
            </script>


          </div>

          <label class="col-lg-1" for="">Time From</label>
          <div class="col-lg-2">
            <input type="time" class="form-control timepicker" id="wp_from_time" name="wp_from_time" tabindex="8"
              placeholder="Enter time to" value="{{ old('wp_from_time') }}">

          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $('.timepicker').timepicker({
                     timeFormat: 'HH:mm',
                     interval: 60,
                     defaultTime: '10',
                   });
            });
          </script>


          <label class="col-lg-1" for="">Time To</label>
          <div class="col-lg-2">
            <input type="time" class="form-control" id="wp_to_time" name="wp_to_time" placeholder="Enter time to"
              value="{{ old('wp_to_time') }}" tabindex="9">
          </div>
        </div>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Work Category</strong>
        </p>
        <div class="col-sm-12">
          <div class="d-flex mb-3">


            <div class="p-2 flex-fill" options><input type="checkbox" value="Carpentry" name="wp_category[]">Carpentry
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Fit-Out" name="wp_category[]">Fit-Out
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Painting" name="wp_category[]">Painting
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Promotion" name="wp_category[]">Promotion
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Plumbing" name="wp_category[]">Plumbing
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Hot Work" name="wp_category[]">Hot Work
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Electrical / HVAC" name="wp_category[]">Electrical
              /
              HVAC</div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Stock Taking" name="wp_category[]">Stock
              Taking
            </div>
            <div class="p-2 flex-fill "><input type="checkbox" value="Others" name="wp_category[]">Others
            </div>
          </div>
        </div>
      </div>


      <script>
        $(function(){
var requiredCheckboxes = $('.options :checkbox[required]');
requiredCheckboxes.change(function(){
    if(requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
    } else {
        requiredCheckboxes.attr('required', 'required');
    }
});
});
  
      </script>

      @error('wp_category')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror



      <div class="form-group">
        <p class="bg-warning text-white"><strong>Description of Work</strong>
          <textarea class="form-control" name="wp_description" rows="3" id="wp_description"
            placeholder="Enter work description in detail" tabindex="10" value="{{ old('wp_description') }}"
            required></textarea>
        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Contractor Details </strong>
        </p>

        <div class="row">

          <label class="col-lg-1" for="">Company</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="wp_cont_comp" name="wp_cont_comp" tabindex="11"
              placeholder="Enter company name" value="{{ old('wp_cont_comp') }}">
          </div>
          <label class="col-lg-1" for="">Person Name</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="wp_cont_person" name="wp_cont_person" tabindex="12"
              placeholder="Enter person name" value="{{ old('wp_cont_person') }}">
          </div>

          <label class="col-lg-1" for="">Mobile Number</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="wp_cont_mobile" name="wp_cont_mobile" tabindex="13"
              placeholder="Enter mobile number" value="{{ old('wp_cont_mobile') }}">
          </div>

          <label class="col-lg-1" for="">No. Workers</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="wp_no_workers" name="wp_no_workers" tabindex="14"
              placeholder="Enter number of workers" value="{{ old('wp_no_workers') }}">
          </div>
        </div>
      </div>

      <div class="form-group">
        <strong>  Terms & Conditions:</strong> 

        <ol>
          <li>Work permit requests should be submitted to the Mall Management at least 24 hours prior to
            the
            commencement of the work.</li>
          <li>Work ID copy should be submitted to the security department to get access into the mall</li>
          <li>Delivery of materials and all noisy works should be carried out after the mall trading hours
            only.</li>
          <li>No material and shop fixtures to be left in the mall common areas.</li>
          <li>All workers must follow the safety and security rules and regulations.</li>
          <li>Please report to the security if any incident/damage to the property.</li>
        </ol>
         <p align="center"> I understand & accept all the responsibilities as explained in work permit terms and
          Conditions. </p>

























        <div class="form-group">
          <input type="submit" class="btn btn-primary" Value="Save">
          <a href="{{route('mall.workpermit.index')}}" class="btn btn-warning" role="button">Cancel</a>
        </div>
    </form>
  </div>



</section>
@endsection