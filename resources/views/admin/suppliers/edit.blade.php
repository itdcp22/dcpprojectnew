@extends('layouts.admin')
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
        <h1 class="m-0 text-dark">Edit Supplier</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

          <li class="breadcrumb-item"><a href="{{route('admin.suppliers.index')}}">Suppliers</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <form class="needs-validation" novalidate method="POST"
      action="{{ route('admin.suppliers.update', $supplier->id) }}">
      @method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Company Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom01" name="supp_comp_name"
              value="{{ $supplier->supp_comp_name}}" placeholder="Enter company name" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Account Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="supp_account_name"
              value="{{ $supplier->supp_account_name}}" placeholder="Enter account name" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Account Number</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="supp_acc_no"
              value="{{ $supplier->supp_acc_no}}" placeholder="Enter account number" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Bank</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="supp_bank_name"
              value="{{ $supplier->supp_bank_name}}" placeholder="Enter bank name" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">SWIFT</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="supp_swift"
              value="{{ $supplier->supp_swift}}" placeholder="Enter SWIFT">
          </div>
          <label class="col-lg-2" for="">IBAN</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="supp_iban"
              value="{{ $supplier->supp_iban}}" placeholder="Enter IBAN">
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Contact Details</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="supp_contact"
              placeholder="Enter contact details">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>









      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('admin.suppliers.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection