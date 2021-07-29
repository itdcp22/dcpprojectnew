@extends('layouts.admin')
@section('content')




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
     <form  class="needs-validation" novalidate method = "post" action="{{ route('foh.booking.store') }}" 
     enctype="multipart/form-data" autocomplete="off">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">

  

        <div class="form-group">
        <div class = "row">
            <label class = "col" for="">School / Company Name</label>
        <div class = "col">    
            <input type="text" class="form-control" id="validationCustom01" name="tb_cust_name" value="{{ $booking->tb_cust_name }}" disabled  >
        </div>
        <label class = "col" for="">School / Company Address</label>
        <div class = "col">    
        <input type="text" class="form-control" id="validationCustom02" name="tb_cust_addr" value="{{ $booking->tb_cust_addr }}" disabled>           
        </div>     
        </div>
        </div>

    
        <div class="form-group">
            <div class = "row">
                <label class = "col" for="">Mobile Number</label>
            <div class = "col">    
                <input type="text" class="form-control" id="validationCustom01" name="tb_cust_mobile" value="{{ $booking->tb_cust_mobile}}" disabled  >
            </div>
            <label class = "col" for="">Email</label>
            <div class = "col">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_email" value="{{ $booking->tb_cust_email }}" disabled>           
            </div>     
            </div>
            </div>


            <div class="form-group">
            <div class = "row">
            <label class = "col" for="">Contact Person</label>
            <div class = "col">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_mobile" value="{{ $booking->tb_cust_contact }}" disabled>
            </div>
            <label class = "col" for="">Booking Date</label>
            <div class = "col">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_email" value="{{ date('d-m-Y', strtotime($booking->created_at)) }}" disabled>           
            </div>     
            </div>
            </div>

             

                
                <div class="form-group">
                <div class = "row">
                <label class = "col" for="">Date of Visit</label>
                <div class = "col">    
                
                    <input class = "form-control datepicker" id="datepicker" name = "tb_date" value="{{ date('d-m-Y', strtotime($booking->tb_date)) }}"  disabled>  
             


                </div>
                <label class = "col" for="">Arrival Time</label>
                <div class = "col">    
                <input type="text" class="form-control" id="validationCustom02" name="tb_time" value="{{ $booking->tb_time }}" disabled>     
                
                
             
                  
                </div>     
                </div>
                </div>

                    <div class="form-group">
                    <div class = "row">
                    <label class = "col" for="">Kids</label>
                    <div class = "col">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_kids" value="{{ $booking->tb_kids }}" disabled>
                    </div>
                    <label class = "col" for="">Adult</label>
                    <div class = "col">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_adult" value="{{ $booking->tb_adult }}" disabled>           
                    </div>    
                    </div>
                    </div>

                    <div class="form-group">
                      <div class = "row">
                      <label class = "col" for="">Age</label>
                      <div class = "col">                              
                          <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $booking->tb_age }}" disabled>                              
                     

                      </div>
                      <label class = "col" for="">Tour Language</label>
                      <div class = "col">    
                          <input type="text" class="form-control" id="validationCustom02" name="tb_reference" value="{{ $booking->tb_language }}" disabled>                                                    
                     
                      </div>    
                      </div>
                      </div>


                    <div class="form-group">
                        <div class = "row">
                        <label class = "col" for="">Mode of Payment</label>
                        <div class = "col">                              
                            <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $booking->tb_pay_mode }}" disabled>                              
                       

                        </div>
                        <label class = "col" for="">Reference</label>
                        <div class = "col">    
                            <input type="text" class="form-control" id="validationCustom02" name="tb_reference" value="{{ $booking->tb_reference }}" disabled>                                                    
                       
                        </div>    
                        </div>
                        </div>

                       
                          <div class="form-group">
                            <div class = "row">
                            <label class = "col" for="">Category</label>
                            <div class = "col">                              
                                <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $booking->tb_category }}" disabled>                              
                           
    
                            </div>
                            <label class = "col" for="">Type</label>
                            <div class = "col">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_reference" value="{{ $booking->tb_type }}" disabled>                                                    
                           
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
                                          <input type="text" class="form-control text-center" id="validationCustom02" name="tb_student_qty" value="{{ $booking->tb_student_qty}}" disabled >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="validationCustom02" name="tb_student_price" value="{{ number_format($booking->tb_student_price,3)}}" disabled >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="validationCustom02" name="" placeholder="" value="{{ number_format($booking->tb_student_qty * $booking->tb_student_price,3)}}" disabled>
                                        </td>
                                    </tr>
                
                                    <tr>
                                        <td>
                                            Teachers
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" id="validationCustom02" name="tb_teacher_qty" value="{{ $booking->tb_teacher_qty}}" disabled>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="validationCustom02" name="tb_teacher_price" value="{{ number_format($booking->tb_teacher_price,3)}}" disabled>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="validationCustom02" name="" value="{{ number_format($booking->tb_teacher_qty * $booking->tb_teacher_price,3)}}" disabled>
                                        </td>
                                    </tr>
                
                                    <tr>
                                        <td>
                                            Adult
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" id="validationCustom02" name="tb_adult_qty" value="{{ $booking->tb_adult_qty}}" disabled>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="validationCustom02" name="tb_adult_price" value="{{ number_format($booking->tb_adult_price,3)}}" disabled>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-right" id="validationCustom02" name="exp_group_desc" value="{{ number_format($booking->tb_adult_qty * $booking->tb_adult_price,3)}}" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        {{ $booking->tb_addon1_name}}
                                      </td>
                                      <td>
                                        <input type="text" class="form-control text-center" id="validationCustom02" name="tb_addon1_qty" value="{{ $booking->tb_addon1_qty}}" disabled>
                                      </td>
                                      <td>
                                        <input type="text" class="form-control text-right" id="validationCustom02" name="tb_addon1_price" value="{{ number_format($booking->tb_addon1_price,3)}}" disabled>
                                      </td>
                                      <td>
                                        <input type="text" class="form-control text-right" id="validationCustom02" name="exp_group_desc" value="{{ number_format($booking->tb_addon1_qty * $booking->tb_addon1_price,3)}}" disabled>
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
                                        <input type="text" class="form-control text-right font-weight-bold" id="validationCustom02" name="tb_total"  
                                        value="{{ number_format($booking->tb_total,3)}}" disabled>
                                      </td>
                                  </tr>
                
                             
                              </tbody>
                
                              
                 
                            </table>

     

     




     <div class="form-group">
      <div class = "row">
      <label class = "col" for="">Prepared by: {{ $booking->tb_user_name }}</label>
     
      <label class = "col" for="">Approved by: _____________________________</label>
       
      </div>
      </div>

      <div class="form-group">
     
        <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
        
        </div>
   


     </form>
      </div>
    </section>
@endsection