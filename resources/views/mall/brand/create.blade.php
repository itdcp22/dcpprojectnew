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

          <li class="breadcrumb-item"><a href="{{route('mall.workpermit.index')}}">Booking</a></li>


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
            <input type="text" class="form-control" id="validationCustom02" name="bm_location"
              placeholder="Enter location details" required>
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
              placeholder="Enter designation" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Telephone Number</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_tel"
              placeholder="Enter telephone Number" required>
          </div>
          <label class="col-lg-2" for="">Mobile Number</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="bm_mobile"
              placeholder="Enter mobile number" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Email</label>
          <div class="col-lg-3">
            <input type="email" class="form-control" id="validationCustom02" name="bm_email"
              placeholder="Enter email address" required>
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