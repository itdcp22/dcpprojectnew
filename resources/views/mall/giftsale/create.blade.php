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


<script>
  function calc1() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
  document.getElementById('student_amount').value = textValue1 * textValue2;   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

 

      document.getElementById('tb_total').value = textValue1 * textValue2 + textValue3 * textValue4 
      + textValue5 * textValue6 + textValue7 * textValue8;
 
  }

   function calc2() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  
  var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

    
  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

  document.getElementById('teacher_amount').value = textValue3 * textValue4; 

  

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }   

  function calc3() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;


  document.getElementById('adult_amount').value = textValue5 * textValue6; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }

  function calc4() 
  {
    var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;



    var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

  document.getElementById('addon1_amount').value = textValue7 * textValue8; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }  
</script>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Booking Form</h1>
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
    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('foh.booking.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Kids</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="tb_kids"
              placeholder="Enter number of kids">
          </div>
          <label class="col-lg-2" for="">Adult</label>
          <div class="col-lg-3">
            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
              placeholder="Enter number of adults">
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-lg-2" for="">Comments</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="validationCustom02" name="tb_comment"
              placeholder="Enter comments">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>


            <th class="text-center"> Voucher Type</th>
            <th class="text-center"> Quantity</th>
            <th class="text-center"> Unit Price </th>
            <th class="text-center"> Amount</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              Five Riyal Gift Voucher
            </td>
            <td>
              <input type="text" class="form-control text-center" id="tb_student_qty" name="tb_student_qty"
                onkeypress="return isNumberKey(event)" onkeyup="calc1()" placeholder="">
            </td>
            <td>
              <input type="text" class="form-control text-center" id="tb_student_price" name="tb_student_price"
                onkeypress="return isNumberKey(event)" onkeyup="calc1()" value="4" placeholder="4">
            </td>
            <td>
              <input type="text" class="form-control text-right" id="student_amount" name="student_amount"
                placeholder="" disabled>
            </td>
          </tr>

          <tr>
            <td>
              Ten Riyal Gift Voucher
            </td>
            <td>
              <input type="text" class="form-control text-center" id="tb_teacher_qty" name="tb_teacher_qty"
                onkeypress="return isNumberKey(event)" onkeyup="calc2()" placeholder="">
            </td>
            <td>
              <input type="text" class="form-control text-center" id="tb_teacher_price" name="tb_teacher_price"
                onkeypress="return isNumberKey(event)" onkeyup="calc2()" value="7.5" placeholder="7.5">
            </td>
            <td>
              <input type="text" class="form-control text-right" id="teacher_amount" name="teacher_amount"
                onkeypress="return isNumberKey(event)" onkeyup="calc2()" placeholder="" disabled>
            </td>
          </tr>

          <tr>
            <td>
              Twenty Riyal Gift Voucher
            </td>
            <td>
              <input type="text" class="form-control text-center" id="tb_adult_qty" name="tb_adult_qty"
                onkeypress="return isNumberKey(event)" onkeyup="calc3()" placeholder="">
            </td>
            <td>
              <input type="text" class="form-control text-center" id="tb_adult_price" name="tb_adult_price"
                onkeypress="return isNumberKey(event)" onkeyup="calc3()" value="7.5" placeholder="">
            </td>
            <td>
              <input type="text" class="form-control text-right" id="adult_amount" name="adult_amount"
                onkeypress="return isNumberKey(event)" onkeyup="calc3()" placeholder="" disabled>
            </td>
          </tr>




          <tr>
            <td>

            </td>
            <td></td>
            <td class="font-weight-bold text-right">
              Total OMR
            </td>
            <td>
              <input type="text" class="form-control font-weight-bold  text-right" id="tb_total" name="tb_total"
                placeholder="" disabled>
            </td>
          </tr>


        </tbody>



      </table>







      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('foh.booking.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection