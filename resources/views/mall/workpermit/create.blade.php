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

    




                         <div class="card card-primary">
                          <div class="card-header">
                            <h4 class="card-title">Workpermit Form</h4>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form role="form">
                            <div class="card-body">

                              <div class="form-group">
                                <div class = "row">
                                <label class = "col-lg-1" for="">Applicant</label>
                                <div class = "col-lg-5">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_cust_mobile" placeholder="Enter name of applicant" required>
                                </div>
                                <label class = "col-lg-1" for="">Shop Name</label>
                                <div class = "col-lg-5">    
                                <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email" placeholder="Enter shop name" required>           
                                </div>     
                                </div>
                                </div>


                              <div class="form-group">
                                <div class = "row">
                                <label class = "col-lg-1" for="">Designation</label>
                                <div class = "col-lg-5">    
                                  <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email" placeholder="Enter store manager" required>           
                                       
                                </div>
                                <label class = "col-lg-1" for="">Store Manager</label>
                                <div class = "col-lg-5">    
                                  <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email" placeholder="Enter store manager" required>                                        
                               
                                                              
                                </div>     
                                </div>
                                </div>

                             


                                <div class="form-group">
                                <div class = "row">
                                <label class = "col-lg-1" for="">Company</label>
                                <div class = "col-lg-5">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_kids" placeholder="Enter designation">
                                </div>
                                <label class = "col-lg-1" for="">Mobile Number</label>
                                <div class = "col-lg-5">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter mobile number">           
                                </div>    
                                </div>
                                </div>

                                <p class="bg-warning text-white"><strong>Work Duration</strong>              
                                </p>
                              

                                
                                <div class="form-group">
                                  <div class = "row">
                                  <label class = "col-lg-1" for="">Date From</label>
                                  <div class = "col-lg-2">    
                                  <input type="text" class="form-control" id="validationCustom02" name="tb_kids" placeholder="Enter date from">
                                  </div>
                                  <label class = "col-lg-1" for="">Date To</label>
                                  <div class = "col-lg-2">    
                                  <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter date to">           
                                  </div>    

                                  <label class = "col-lg-1" for="">Time From</label>
                                  <div class = "col-lg-2">    
                                  <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter time from">           
                                  </div>    

                                  <label class = "col-lg-1" for="">Time To</label>
                                  <div class = "col-lg-2">    
                                  <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter time to">           
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
                                  <textarea class="form-control" rows="3" id="comment" placeholder="Enter description in detail"></textarea>             
                                  </p>
                               </div>

                              

                               <div class="form-group">
                                <p class="bg-warning text-white"><strong>Contractor Details    </strong>                                 
                                </p>
                                
                                <div class = "row">
                                  
                                <label class = "col-lg-1" for="">Company</label>
                                <div class = "col-lg-2">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_kids" placeholder="Enter company name">
                                </div>
                                <label class = "col-lg-1" for="">Person Name</label>
                                <div class = "col-lg-2">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter person name">           
                                </div>    

                                <label class = "col-lg-1" for="">Mobile Number</label>
                                <div class = "col-lg-2">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter mobile number">           
                                </div>    

                                <label class = "col-lg-1" for="">No. Workers</label>
                                <div class = "col-lg-2">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter number of workers">           
                                </div>    
                                </div>
                                </div>
                                  



                        
                            
                            
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>


                        
                         
                                        
                          
                     
                    




                         

                         


                  
                   

     

     



     
    </section>
@endsection