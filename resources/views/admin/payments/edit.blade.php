@extends('layouts.admin')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>



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
        <h1 class="m-0 text-dark">Edit Payment</h1>
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

    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('admin.payments.update',$payment->id) }}" enctype="multipart/form-data" autocomplete="off"
      autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      @method('PUT')



      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Payment From</label>
          <div class="col-lg-8">

            <select class="custom-select" name="bank_acc_no" id="bank_acc_no" required>
              <option value="{{ $payment->bank_acc_no}}" selected disabled hidden>{{ $payment->bank_acc_no}}
              </option>

              @foreach($bank as $t)
              <option value="{{ $t->bank_acc_no}}">{{ $t->bank_name}}</option>
              @endforeach

            </select>

            <input type="hidden" id="bank_name" name="bank_name">

            <script>
              $('#bank_acc_no').on('change', function() 
                                           {
                                             var selectedName = $('#bank_acc_no option:selected').text();
                                            $('#bank_name').val(selectedName);
                                                      }
                                            )
            </script>


            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Account Name</label>
          <div class="col-lg-8">

            <select class="custom-select select2" id="companyID" name="pay_supp_acc_name" onchange="getCompanyName();"
              required>
              <option value="{{ $payment->pay_supp_acc_name}}" selected disabled hidden>{{ $payment->pay_supp_acc_name}}
              </option>
              @foreach($supplier as $s)
              <option value="{{ $s->id}}">{{ $s->supp_comp_name}}</option>
              @endforeach
            </select>

            <input type="hidden" id="pay_supp_acc_name" name="pay_supp_acc_name">

            <script>
              $('#companyID').on('change', function() 
                                           {
                                             var selectedName = $('#companyID option:selected').text();
                                            $('#pay_supp_acc_name').val(selectedName);
                                                      }
                                            )
            </script>

            <script>
              $('.select2').select2();
            </script>


            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div></div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Account Number</label>
          <div class="col-lg-8">
            <input type="text" id="supp_acc_no" class="form-control" name="pay_supp_acc_no"
              value="{{ $payment->pay_supp_acc_no}}" placeholder="Enter account number" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Bank Name</label>
          <div class="col-lg-8">
            <input type="text" id="supp_bank_name" class="form-control" name="pay_supp_bank_name"
              value="{{ $payment->pay_supp_bank_name}}" placeholder="Enter bank name" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">SWIFT</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="pay_supp_swift_code" name="pay_supp_swift_code"
              value="{{ $payment->pay_supp_swift_code}}" placeholder="Enter SWIFT">
          </div>
          <label class="col-lg-2" for="">IBAN</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="pay_supp_iban" name="pay_supp_iban"
              value="{{ $payment->pay_supp_iban}}" placeholder="Enter IBAN">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Currency</label>
          <div class="col-lg-3">
            <select class="custom-select" name="pay_supp_currency" id="pay_supp_currency" required>
              <option value="{{ $payment->pay_supp_currency}}">{{ $payment->pay_supp_currency}}
              </option>
              <option value="OMR">OMR</option>
              <option value="AED">AED</option>
              <option value="USD">USD</option>
            </select>
          </div>
          <label class="col-lg-2" for="">Amount</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" name="pay_supp_amount" placeholder="Enter amount"
              value="{{ $payment->pay_supp_amount}}" required>
          </div>
        </div>
      </div>





      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Reference No</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" name="pay_supp_ref_no" value="{{ $payment->pay_supp_ref_no}}"
              placeholder="Enter reference number">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>








      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Comments</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" name="remarks" value="{{ $payment->remarks}}"
              placeholder="Enter remarks">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>









      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('admin.payments.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection

<script type="text/javascript">
  function getCompanyName()
  {
  var companyID = document.getElementById("companyID").value;
  $.ajax({
  headers:{
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
  },
  method: "POST",
  url: "{{URL::to('supplierdetails')}}",
  data: {
  'id': companyID
  },
  success:function(data){
    $('#supp_acc_no').val(data.supp_acc_no);
    $('#supp_bank_name').val(data.supp_bank_name);
    $('#pay_supp_iban').val(data.supp_iban);
    $('#pay_supp_swift_code').val(data.supp_swift);
  }
  });
  }
</script>