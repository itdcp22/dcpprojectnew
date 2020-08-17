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
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

          <li class="breadcrumb-item"><a href="{{route('foh.booking.index')}}">Booking</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">


    <form class="needs-validation" novalidate method="POST"
      action="{{ route('mall.workpermitapp.update', $workpermit->id) }}">
      @method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">



      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Applicant</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="validationCustom02" name="wp_applicant"
              value="{{ $workpermit->wp_applicant}}" placeholder="Enter name of applicant" tabindex="1" required>
          </div>
          <label class="col-lg-1" for="">Designation</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="validationCustom02" name="wp_designation"
              value="{{ $workpermit->wp_designation}}" placeholder="Enter designation name" tabindex="2" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Mobile</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="validationCustom02" name="wp_mobile"
              value="{{ $workpermit->wp_mobile}}" placeholder="Enter mobile number" tabindex="3" required>

          </div>
          <label class="col-lg-1" for="">Email</label>
          <div class="col-lg-5">
            <input type="email" class="form-control" id="validationCustom02" name="wp_email"
              value="{{ $workpermit->wp_email}}" placeholder="Enter email address" tabindex="4" required>


          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Company</label>
          <div class="col-lg-5">



            <input type="text" class="form-control" id="validationCustom02" name="wp_comp_name"
              value="{{ $workpermit->wp_comp_name}}" placeholder="Enter company name" readonly>
          </div>
          <label class="col-lg-1" for="">Brand</label>
          <div class="col-lg-5">

            <input type="text" class="form-control" id="validationCustom02" name="wp_brand_name"
              value="{{ $workpermit->wp_brand_name}}" placeholder="Enter brand name" readonly>


          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Manager</label>
          <div class="col-lg-5">
            <input type="text" class="form-control" id="validationCustom02" name="wp_manager"
              value="{{ $workpermit->wp_manager}}" placeholder="Enter manager name" readonly>
          </div>
          <label class="col-lg-1" for="">Contact</label>
          <div class="col-lg-5">



            <input type="text" class="form-control" id="validationCustom02" name="wp_manager"
              value="{{ $workpermit->wp_manager_contact}}" placeholder="Enter manager contact" readonly>


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
              value="{{ date('d-m-Y', strtotime($workpermit->wp_from_date)) }}" required>

            <script>
              $('#datepicker').datepicker({
                 format: 'dd-mm-yyyy',
                   uiLibrary: 'bootstrap4'
               });
            </script>


          </div>
          <label class="col-lg-1" for="">Date To</label>
          <div class="col-lg-2">


            <input class="form-control datepicker" id="datepicker1" name="wp_to_date"
              value="{{ date('d-m-Y', strtotime($workpermit->wp_to_date)) }}" placeholder="dd-mm-yyyy" required>



            <script>
              $('#datepicker1').datepicker({
                 format: 'dd-mm-yyyy',
                   uiLibrary: 'bootstrap4'
               });
            </script>


          </div>

          <label class="col-lg-1" for="">Time From</label>
          <div class="col-lg-2">
            <input type="time" class="form-control timepicker" id="validationCustom02" name="wp_from_time"
              value="{{ $workpermit->wp_from_time}}" placeholder="Enter time to">

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
            <input type="time" class="form-control" id="validationCustom02" name="wp_to_time"
              value="{{ $workpermit->wp_to_time}}" placeholder="Enter time to">
          </div>
        </div>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Work Category</strong>


          <input type="text" class="form-control" id="wp_category" name="wp_category"
            value="{{ $workpermit->wp_category}}" placeholder="Work Category">

        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Description of Work</strong>

          <input type="text" class="form-control" id="wp_description" name="wp_description"
            value="{{ $workpermit->wp_description}}" placeholder="Enter work description in detail">



        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Contractor Details </strong>
        </p>

        <div class="row">

          <label class="col-lg-1" for="">Company</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="wp_cont_comp"
              value="{{ $workpermit->wp_cont_comp}}" placeholder="Enter company name">
          </div>
          <label class="col-lg-1" for="">Person Name</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="wp_cont_person"
              value="{{ $workpermit->wp_cont_person}}" placeholder="Enter person name">
          </div>

          <label class="col-lg-1" for="">Mobile Number</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="wp_cont_mobile"
              value="{{ $workpermit->wp_cont_mobile}}" placeholder="Enter mobile number">
          </div>

          <label class="col-lg-1" for="">No. Workers</label>
          <div class="col-lg-2">
            <input type="text" class="form-control" id="validationCustom02" name="wp_no_workers"
              value="{{ $workpermit->wp_no_workers}}" placeholder="Enter number of workers">
          </div>
        </div>
      </div>

      <div class="form-group">
        <p class="bg-primary text-white"><strong>Approval / Reject </strong>
        </p>

        <div class="row">

          <label class="col-lg-1" for="">Action</label>
          <div class="col-lg-2">

            <select class="custom-select" name="wp_status" id="wp_status" required>
              <option value="" selected disabled hidden>Please select</option>
              <option value="Approved">Approve</option>
              <option value="Rejected">Reject</option>


            </select>

          </div>
          <label class="col-lg-1" for="">Comments</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="wp_approved_remark"
              placeholder="Enter comments">
          </div>



        </div>
      </div>

























      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('foh.booking.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>





</section>
@endsection