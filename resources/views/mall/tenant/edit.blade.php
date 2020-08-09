@extends('layouts.admin')
@section('content')

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

      document.getElementById('tb_total').value = textValue1 * textValue2 + textValue3 * textValue4 
      + textValue5 * textValue6;
 
  }

   function calc2() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  document.getElementById('teacher_amount').value = textValue3 * textValue4; 


    var textValue5 = document.getElementById('qty3').value;
  var textValue6 = document.getElementById('price3').value;

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 
 
  }   

  function calc3() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  document.getElementById('adult_amount').value = textValue5 * textValue6; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 
 
  }  
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
    function myFunction() {
      window.print();

      
    }
    </script>

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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

    <div class = "row">
        <div class = "col text-center">
          <img src={{asset('dist/img/printjarwani.png')}}>
        </div>
        <div class = "col">
        <h1 class="m-0 text-dark text-center">Al Jarwani Group</h1>
        <h2 class="m-0 text-dark text-center">Oman Aquarium</h2>
        
        </div>
        <div class = "col text-center">
          
          
          
          <img src={{asset('dist/img/printaqua.png')}}>
          
        </div>
      </div>  

      <div class="p-1 bg-secondary text-center"> 

        <h4 class="m-0  text-center">Booking Form</h4>
     
    </div> 

    <section class="content">
      <div class="container-fluid">

    

     <form  class="needs-validation" novalidate method = "POST" 
     action="{{ route('foh.booking.update', $booking->id) }}">
     @method('PUT')


     
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">

  

        <div class="form-group">
        <div class = "row">
            <label class = "col" for="">School / Company Name</label>
        <div class = "col">    
            <input type="text" class="form-control" id="validationCustom01" name="tb_cust_name" value="{{ $booking->tb_cust_name }}"   >
        </div>
        <label class = "col" for="">School / Company Address</label>
        <div class = "col">    
        <input type="text" class="form-control" id="validationCustom02" name="tb_cust_addr" value="{{ $booking->tb_cust_addr }}" >           
        </div>     
        </div>
        </div>

    
        <div class="form-group">
            <div class = "row">
                <label class = "col" for="">Mobile Number</label>
            <div class = "col">    
                <input type="text" class="form-control" id="validationCustom01" name="tb_cust_mobile" value="{{ $booking->tb_cust_mobile}}"   >
            </div>
            <label class = "col" for="">Email</label>
            <div class = "col">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_email" value="{{ $booking->tb_cust_email }}" >           
            </div>     
            </div>
            </div>


            <div class="form-group">
            <div class = "row">
            <label class = "col" for="">Contact Person</label>
            <div class = "col">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_contact" value="{{ $booking->tb_cust_contact }}" >
            </div>
            <label class = "col" for="">Category</label>
            <div class = "col">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_category" value="{{ $booking->tb_category}}" >           
            </div>     
            </div>
            </div>

             

                
                <div class="form-group">
                <div class = "row">
                <label class = "col" for="">Date of Visit</label>
                <div class = "col">    
                
                    <input class = "form-control datepicker" id="datepicker" name = "tb_date" value="{{ date('d-m-Y', strtotime($booking->tb_date)) }}"  >  

                    <script>
                      $('#datepicker').datepicker({
                        format: 'dd-mm-yyyy',
                          uiLibrary: 'bootstrap4'
                      });
                  </script>
 
             


                </div>
                <label class = "col" for="">Arrival Time</label>
                <div class = "col">    
                <input type="text" class="form-control" id="validationCustom02" name="tb_time" value="{{ $booking->tb_time }}" >     
                
                
             
                  
                </div>     
                </div>
                </div>

                    <div class="form-group">
                    <div class = "row">
                    <label class = "col" for="">Kids</label>
                    <div class = "col">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_kids" value="{{ $booking->tb_kids }}" >
                    </div>
                    <label class = "col" for="">Adult</label>
                    <div class = "col">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_adult" value="{{ $booking->tb_adult }}" >           
                    </div>    
                    </div>
                    </div>

                    <div class="form-group">
                        <div class = "row">
                        <label class = "col" for="">Mode of Payment</label>
                        <div class = "col">                              
                            <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $booking->tb_pay_mode }}" >                              
                       

                        </div>
                        <label class = "col" for="">Reference</label>
                        <div class = "col">    
                            <input type="text" class="form-control" id="validationCustom02" name="tb_reference" value="{{ $booking->tb_reference }}" >                                                    
                       
                        </div>    
                        </div>
                        </div>

                        <div class="form-group">
                            <div class = "row">
                            <label class = "col" for="">Booking Date</label>
                            <div class = "col">                              
                                <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ date('d-m-Y', strtotime($booking->created_at)) }}" disabled>                              
                           
    
                            </div>
                            <label class = "col" for="">User</label>
                            <div class = "col">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_reference" value="{{ $booking->tb_user_name }}" disabled>                                                    
                           
                            </div>    
                            </div>
                            </div>
   
                      

                            <div class="form-group">
                              <div class = "row">
                              <label class = "col" for="">Comments  : {{ $booking->tb_comment}}</label>
                              <div class = "col">    
                                
                              <div class = "clear-fix"></div>
                              </div>     
                              </div>
                              </div>

                            <table class="table table-bordered">
                              <thead>
                              <tr>
                                                 
                                         
                                <th class="text-center"> Name</th>            
                                <th class="text-center"> Quantity</th> 
                                <th class="text-center"> Unit Price </th> 
                                <th class="text-center"> Amount</th>
                              
                              </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                        <td>
                                            Students
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" onkeypress="return isNumberKey(event)" onkeyup="calc1()"
                                          id="tb_student_qty" name="tb_student_qty" value="{{ $booking->tb_student_qty}}"  >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" onkeypress="return isNumberKey(event)" onkeyup="calc1()"
                                          id="tb_student_price" name="tb_student_price" value="{{ number_format($booking->tb_student_price,3)}}"  >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" onkeypress="return isNumberKey(event)" onkeyup="calc1()"
                                          id="student_amount" name="student_amount" placeholder="" value="{{ number_format($booking->tb_student_qty * $booking->tb_student_price,3)}}" disabled >
                                        </td>
                                    </tr>
                
                                    <tr>
                                        <td>
                                            Teachers
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" onkeypress="return isNumberKey(event)" onkeyup="calc2()"
                                          id="tb_teacher_qty" name="tb_teacher_qty" value="{{ $booking->tb_teacher_qty}}" >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" onkeypress="return isNumberKey(event)" onkeyup="calc2()"
                                          id="tb_teacher_price" name="tb_teacher_price" value="{{ number_format($booking->tb_teacher_price,3)}}" >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="teacher_amount" name="teacher_amount" value="{{ number_format($booking->tb_teacher_qty * $booking->tb_teacher_price,3)}}" disabled>
                                        </td>
                                    </tr>
                
                                    <tr>
                                        <td>
                                            Adult
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" onkeypress="return isNumberKey(event)" onkeyup="calc3()"
                                          id="tb_adult_qty" name="tb_adult_qty" value="{{ $booking->tb_adult_qty}}" >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" onkeypress="return isNumberKey(event)" onkeyup="calc3()"
                                          id="tb_adult_price" name="tb_adult_price" value="{{ number_format($booking->tb_adult_price,3)}}" >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="adult_amount" name="adult_amount" value="{{ number_format($booking->tb_adult_qty * $booking->tb_adult_price,3)}}" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                      <td>
                                          
                                      </td>
                                      <td></td>
                                      <td class="font-weight-bold text-right">
                                        Total 
                                      </td>
                                      <td>
                                        <input type="text" class="form-control text-right font-weight-bold" id="tb_total" name="tb_total"  
                                        value="{{ number_format($booking->tb_total,3)}}" disabled>
                                      </td>
                                  </tr>
                
                             
                              </tbody>               
                              
                 
                            </table>

                           
     

     

                               <div class="form-group">
                                <input type="submit" class = "btn btn-info" Value ="Save">
                                <a href="{{route('foh.booking.index')}}" class="btn btn-warning" role="button">Cancel</a>
                                </div>

   
     </form>
      </div>
    </section>
@endsection