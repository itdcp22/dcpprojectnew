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
        <h1 class="m-0 text-dark">Circular - Edit</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>




        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">


    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.circular.update',$circular->id) }}" enctype="multipart/form-data" autocomplete="off"
      autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      @method('PUT')


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Circular No</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom01" name="ci_circular_no"
              placeholder="Enter company name" value="{{ $circular->ci_circular_no}}" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Subject</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="ci_subject"
              placeholder="Enter address details" value="{{ $circular->ci_subject}}">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>










      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Comments</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="ci_comments"
              value="{{ $circular->ci_comments}}" placeholder="Enter comments">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">

          <label class="col-lg-2" for="">Attach Document</label>
          <div class="col-lg-8">
            <input type="file" id="validationCustom01" name="th_attach">
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