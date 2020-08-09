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

            <div class="card-body">

                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Applicant</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_mobile"
                                placeholder="Enter name of applicant" required>
                        </div>
                        <label class="col-lg-1" for="">Designation</label>
                        <div class="col-lg-5">
                            <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email"
                                placeholder="Enter designation name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Mobile</label>
                        <div class="col-lg-5">
                            <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email"
                                placeholder="Enter mobile number" required>

                        </div>
                        <label class="col-lg-1" for="">Email</label>
                        <div class="col-lg-5">
                            <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email"
                                placeholder="Enter email address" required>


                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Company</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_kids"
                                placeholder="Enter company name">
                        </div>
                        <label class="col-lg-1" for="">Brand</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter brand name">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Manager</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_kids"
                                placeholder="Enter manager name">
                        </div>
                        <label class="col-lg-1" for="">Contact</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter contact number">
                        </div>
                    </div>
                </div>


                <p class="bg-warning text-white"><strong>Work Duration</strong>
                </p>

                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Date From</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_kids"
                                placeholder="Enter date from">
                        </div>
                        <label class="col-lg-1" for="">Date To</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter date to">
                        </div>

                        <label class="col-lg-1" for="">Time From</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter time from">
                        </div>

                        <label class="col-lg-1" for="">Time To</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter time to">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <p class="bg-warning text-white"><strong>Work Category</strong>
                    </p>
                    <div class="col-sm-12">
                        <div class="d-flex mb-3">
                            <div class="p-2 flex-fill"><input type="checkbox" value="">Carpentry</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Fit-Out</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Painting</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Promotion</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Plumbing</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Hot Work</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Electrical / HVAC</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Stock Taking</div>
                            <div class="p-2 flex-fill "><input type="checkbox" value="">Others</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <p class="bg-warning text-white"><strong>Description of Work</strong>
                        <textarea class="form-control" rows="3" id="comment"
                            placeholder="Enter description in detail"></textarea>
                    </p>
                </div>

                <div class="form-group">
                    <p class="bg-warning text-white"><strong>Contractor Details </strong>
                    </p>

                    <div class="row">

                        <label class="col-lg-1" for="">Company</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_kids"
                                placeholder="Enter company name">
                        </div>
                        <label class="col-lg-1" for="">Person Name</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter person name">
                        </div>

                        <label class="col-lg-1" for="">Mobile Number</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter mobile number">
                        </div>

                        <label class="col-lg-1" for="">No. Workers</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="validationCustom02" name="tb_adult"
                                placeholder="Enter number of workers">
                        </div>
                    </div>
                </div>
                <hr>

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
                     <p align="center"> Above said terms and conditions agreed. </p>
                </div>


            </div>







            <div class="card-footer">

                <input type="submit" class="btn btn-primary" Value="Save">
                <a href="{{route('foh.booking.index')}}" class="btn btn-warning" role="button">Cancel</a>

            </div>





        </form>
    </div>
</section>
@endsection