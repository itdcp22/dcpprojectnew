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
        <h1 class="m-0 text-dark">Purchase Request Form</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('mallwp')}}">Dashboard</a></li>

          <li class="breadcrumb-item"><a href="{{route('mall.workpermit.index')}}">Pending</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.workpermit.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">



      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Name</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="validationCustom02" name="wp_applicant" value="{{ $user->name}}"
              placeholder="Enter name of applicant" tabindex="1" readonly>
          </div>
          <label class="col-lg-1" for="">:اسم مقدم الطلب</label>
          <label class="col-lg-1" for="">Designation</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="wp_designation" name="wp_designation" value="{{ $user->dept}}"
              placeholder="Enter designation" tabindex="2" readonly>
          </div>
          <label class="col-lg-1" for="">:الوظيفة</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Mobile</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="wp_mobile" name="wp_mobile" placeholder="Enter mobile number"
              value="{{ $user->mobile}}" tabindex="3" readonly>
          </div>
          <label class="col-lg-1" for="">:رقم الهاتف</label>
          <label class="col-lg-1" for="">Email</label>
          <div class="col-lg-4">
            <input type="email" class="form-control" id="wp_email" name="wp_email" placeholder="Enter email address"
              value="{{ $user->email}}" tabindex="4" readonly>
          </div>
          <label class="col-lg-1" for="">:بريدالالكتروني</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Company</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="wp_comp_name" name="wp_comp_name" value="{{ $tenant->tm_name}}"
              placeholder="Enter company name" readonly>
          </div>
          <label class="col-lg-1" for="">:الشركة</label>
          <label class="col-lg-1" for="">Brand</label>
          <div class="col-lg-4">
            @foreach($brand as $c)


            <input type="text" class="form-control" id="wp_comp_name" name="wp_comp_name" value="{{ $c->bm_name}}"
              placeholder="Enter company name" readonly>


            @endforeach
          </div>
          <label class="col-lg-1" for="">:علامة تجارية
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Date</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="wp_comp_name" name="wp_comp_name" value="{{ date('d-m-Y')}}"
              placeholder="Enter company name" readonly>
          </div>
          <label class="col-lg-1" for="">:تاريخ</label>
          <label class="col-lg-1" for="">Date of Required</label>
          <div class="col-lg-4">
            @foreach($brand as $c)





            <input class="form-control datepicker" id="datepicker2" name="wp_from_date" placeholder="dd-mm-yyyy"
              tabindex="6" value="{{ old('wp_from_date') }}" readonly required>

            <script>
              var date = new Date();            
                           
              var hour = date.getHours();              
              if(parseInt(hour) > 15) {
                minDate = 1;                
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
              $('#datepicker2').datepicker({
                 format: 'dd-mm-yyyy',
                   uiLibrary: 'bootstrap4',                   
                   minDate:new Date(),
      disabledDates: [new Date()]
               });       
                }
                else
                {                  
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
              $('#datepicker2').datepicker({
                 format: 'dd-mm-yyyy',
                   uiLibrary: 'bootstrap4',
                   minDate: today,
                  });  
                }                        
            </script>




            @endforeach
          </div>
          <label class="col-lg-1" for="">: تاريخ الطلب
          </label>
        </div>
      </div>





      <div class="form-group">
        <div class="row">

          <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th class="w-50">Goods / Services Description</th>
                        <th class="w-10">Quantity</th>
                        <th class="w-40"> Reason for Requisition</th>

                      </tr>
                  </thead>
                <tbody>   
                    <tr>       
                        <td class="text-center">1</td>        
                        <td><input type="text" tabindex="7" class="form-control" name="td_item_desc[]" id="row1"
                    required></td>
                        <td><input class="form-control text-center" tabindex="8" type="text" name="td_qty[]" id="qty1"
                    onkeyup="calc1()" value="" required></td>
                        <td><input class="form-control text-left" tabindex="9" type="text" name="td_unit_price[]"
                    id="price1" onkeyup="calc1()" value="" required></td>
                   
                      </tr> 
                     <tr>
                <td class="text-center">2</td>        
                        <td><input type="text" class="form-control" tabindex="10" name="td_item_desc[]" id="row2">
                </td>
                        <td><input class="form-control text-center" type="text" tabindex="11" name="td_qty[]" id="qty2"
                    onkeyup="calc2()" value=""></td>
                        <td><input class="form-control text-left" type="text" tabindex="12" name="td_unit_price[]"
                    id="price2" onkeyup="calc2()" value=""></td>
                   
                     
              </tr>
                     <tr>
                       <td class="text-center">3</td>        
                        <td><input type="text" class="form-control" name="td_item_desc[]" id="row3"></td>
                        <td><input class="form-control text-center" type="text" name="td_qty[]" id="qty3"
                    onkeyup="calc3()" value=""></td>
                        <td><input class="form-control text-left" type="text" name="td_unit_price[]" id="price3"
                    onkeyup="calc3()" value=""></td>

                     
              </tr>

              <tr>
                       <td class="text-center">4</td>        
                        <td><input type="text" class="form-control" name="td_item_desc[]" id="row4"></td>
                        <td><input class="form-control text-center" type="text" name="td_qty[]" id="qty4"
                    onkeyup="calc4()" value=""></td>
                        <td><input class="form-control text-left" type="text" name="td_unit_price[]" id="price4"
                    onkeyup="calc4()" value=""></td>

              </tr>

              <tr>
                       <td class="text-center">5</td>        
                        <td><input type="text" class="form-control" name="td_item_desc[]" id="row5"></td>
                        <td><input class="form-control text-center" type="text" name="td_qty[]" id="qty5"
                    onkeyup="calc5()" value=""></td>
                        <td><input class="form-control text-left" type="text" name="td_unit_price[]" id="price5"
                    onkeyup="calc5()" value=""></td>

              </tr>

              <tr>
                       <td class="text-center">6</td>        
                        <td><input type="text" class="form-control" name="td_item_desc[]" id="row6"></td>
                        <td><input class="form-control text-center" type="text" name="td_qty[]" id="qty6"
                    onkeyup="calc6()" value=""></td>
                        <td><input class="form-control text-left" type="text" name="td_unit_price[]" id="price6"
                    onkeyup="calc6()" value=""></td>

                     
              </tr>

              <tr>
                       <td class="text-center">7</td>        
                        <td><input type="text" class="form-control" name="td_item_desc[]" id="row7"></td>
                        <td><input class="form-control text-center" type="text" name="td_qty[]" id="qty7"
                    onkeyup="calc7()" value=""></td>
                        <td><input class="form-control text-left" type="text" name="td_unit_price[]" id="price7"
                    onkeyup="calc7()" value=""></td>

              </tr>
                      
              <tr>
                       <td class="text-center">8</td>        
                        <td><input type="text" class="form-control" name="td_item_desc[]" id="row8"></td>
                        <td><input class="form-control text-center" type="text" name="td_qty[]" id="qty8"
                    onkeyup="calc8()" value=""></td>
                        <td><input class="form-control text-left" type="text" name="td_unit_price[]" id="price8"
                    onkeyup="calc8()" value=""></td>

              </tr>
                      



                 
            </tbody>
              </table>

        </div>
      </div>




      <div class="form-group">
        <p class="bg-warning text-white"><strong>Remarks - وصف العمل</strong>
          <textarea class="form-control" name="wp_description" rows="2" id="wp_description" placeholder="Enter remarks"
            tabindex="10" value="{{ old('wp_description') }}" required></textarea>
        </p>
      </div>



























      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('mall.workpermit.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>



</section>
@endsection