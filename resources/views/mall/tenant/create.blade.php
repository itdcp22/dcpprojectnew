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
        <h1 class="m-0 text-dark">Tenant Master</h1>
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
      action="{{ route('mall.tenant.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom01" name="tm_name"
              placeholder="Enter company name" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Address</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="tm_address"
              placeholder="Enter address details">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Contact Person</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="tm_contact"
              placeholder="Enter contact person name" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Email</label>
          <div class="col-lg-8">
            <input type="email" class="form-control" id="validationCustom02" name="tm_email"
              placeholder="Enter email address" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Telephone Number</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="tm_tel"
              placeholder="Enter telephone Number">
          </div>
          <label class="col-lg-2" for="">Mobile Number</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="tm_mobile"
              placeholder="Enter mobile number">
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
        <a href="{{route('mall.tenant.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection