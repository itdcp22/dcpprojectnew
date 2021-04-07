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
    $(function(){
                  $('#cost_aed, #tax_per,#profit_perc,#profit_perc,#courier').keyup(function()
                  {
                     var cost_aed = parseFloat($('#cost_aed').val()) || 0;
                     var tax_per = 5;
               var tax_amount = (cost_aed*tax_per)/100;
                     $('#tax_amount').val(tax_amount);
               var cost_aed_tax = cost_aed + tax_amount;
               $('#cost_aed_tax').val(cost_aed_tax);
                  
      
      var cost_omr = parseFloat(Number(cost_aed_tax / 9.5).toFixed(3));  
      
      
                  $('#cost_omr').val(cost_omr);			   
                      var profit_perc = parseFloat($('#profit_perc').val()) || 0;				
          
            
      var profit_amount = parseFloat(Number((cost_omr * profit_perc)/100).toFixed(3));  
            
      
                 $('#profit_amount').val(profit_amount);	
                       var courier = parseFloat($('#courier').val()) || 0;					 
                
      
      var selling_price = parseFloat(Number(cost_omr + profit_amount + courier).toFixed(3));  
      
                    
            var profit_perc_val = $("#profit_perc").val();
      if(jQuery.trim(profit_perc_val).length > 0)
      {
           $('#selling_price').val(selling_price);	
         
         
      }                     
                      
                  });
               });
</script>

<!-- This below code is used to calculate the amount field  -->





<script>
    function calc1() 
        {
    
    
        var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
        var line1 = textValue1 * textValue2;
        document.getElementById('amount1').value = line1.toFixed(3);   
    
        var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
        var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
        var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
        var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
          
            var total1 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
    
            document.getElementById('total').value = total1.toFixed(3);   
        }   
    
        function calc2() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
        var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
        var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
        var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
        var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
          var line2 = textValue3 * textValue4;
        document.getElementById('amount2').value = line2.toFixed(3);
        
        var total2 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
     
     
        document.getElementById('total').value = total2.toFixed(3);
    
    
        }   
    
        function calc3() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
        var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
        var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
        var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
          var line3 = textValue5 * textValue6;
         document.getElementById('amount3').value = line3.toFixed(3);

         var total3 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
    
         document.getElementById('total').value = total3.toFixed(3);
        } 
    
        function calc4() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
          var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
        var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
        var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
          var line4 = textValue7 * textValue8;
         document.getElementById('amount4').value = line4.toFixed(3);

         var total4 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
         
         document.getElementById('total').value = total4.toFixed(3);
        } 
    
        function calc5() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
          var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
          var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
        var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
          var line5 = textValue9 * textValue10;
         document.getElementById('amount5').value = line5.toFixed(3);

         var total5 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
    
         document.getElementById('total').value = total5.toFixed(3);
        } 
    
        function calc6() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
          var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
          var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
          var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
    
          var line6 = textValue11 * textValue12;
         document.getElementById('amount6').value = line6.toFixed(3);

         var total6 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
    
         document.getElementById('total').value = total6.toFixed(3);
    
        } 
    
        function calc7() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
          var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
          var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
          var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
          var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
          var line7 = textValue13 * textValue14;
         document.getElementById('amount7').value = line7.toFixed(3);

         var total7 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
    
         document.getElementById('total').value = total7.toFixed(3);
    
    
        } 
    
        function calc8() 
        {
    
          var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
    
    
          var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
    
    
          var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
    
          var textValue7 = document.getElementById('qty4').value;
        var textValue8 = document.getElementById('price4').value;
    
          var textValue9 = document.getElementById('qty5').value;
        var textValue10 = document.getElementById('price5').value;
    
          var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
          var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
        
          var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;

          var line8 = textValue15 * textValue16;
         document.getElementById('amount8').value = line8.toFixed(3);

         var total8 = textValue1 * textValue2 
        + textValue3 * textValue4 + textValue5 * textValue6 
        + textValue7 * textValue8 + textValue9 * textValue10 
        + textValue11 * textValue12 + textValue13 * textValue14  + textValue15 * textValue16;
    
         document.getElementById('total').value = total8.toFixed(3);
    
    
        } 
    
        function calc9() 
        {
        
          var textValue17 = document.getElementById('qty9').value;
            var textValue18 = document.getElementById('price9').value;
         document.getElementById('amount9').value = textValue17 * textValue18;
        } 
    
</script>
<!-- End -->
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
<!-- End -->

<script>
    function bill_total()
                {
                    var textValue1 = document.getElementById('qty1').value;
            var textValue2 = document.getElementById('price1').value;
            var textValue3 = document.getElementById('qty2').value;
            var textValue4 = document.getElementById('price2').value;
            var textValue5 = document.getElementById('qty3').value;
            var textValue6 = document.getElementById('price3').value;
    
            var textValue7 = document.getElementById('qty4').value;
            var textValue8 = document.getElementById('price4').value;
    
            var textValue9 = document.getElementById('qty5').value;
            var textValue10 = document.getElementById('price5').value;
    
            var textValue11 = document.getElementById('qty6').value;
            var textValue12 = document.getElementById('price6').value;
    
            var textValue13 = document.getElementById('qty7').value;
            var textValue14 = document.getElementById('price7').value;
    
            var textValue15 = document.getElementById('qty8').value;
            var textValue16 = document.getElementById('price8').value;
    
            var textValue17 = document.getElementById('qty9').value;
            var textValue18 = document.getElementById('price9').value;
    
            var textValue19 = document.getElementById('qty10').value;
            var textValue20 = document.getElementById('price10').value;
            
            var one = textValue1 * textValue2;  
            var two = textValue3 * textValue4;
            var three = textValue5 * textValue6;
            var four = textValue7 * textValue8;
            var five = textValue9 * textValue10;
            var six = textValue11 * textValue12;
            var seven = textValue13 * textValue14;
            var eight = textValue15 * textValue16;
            var nine = textValue17 * textValue18;
            var ten = textValue19 * textValue20;
            var total = one ;
            document.getElementById('td_total').value = one;
                }  
</script>

<!-- End -->


@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Bill</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.paidbills.index')}}">Paid Bills</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.accounts.index')}}">Unpaid Bills</a></li>



                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <form class="needs-validation" novalidate method="post" action="{{ route('admin.accounts.store') }}"
            enctype="multipart/form-data" autocomplete="off">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">



            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1" for="">Supplier Name *</label>
                    <div class="col-lg-2">
                        <input class="form-control" data-error="Please enter name field." type="text"
                            name="th_supp_name" class="form-control" tabindex="1" autofocus="autofocus"
                            placeholder="Enter Supplier name" required>



                    </div>


                    <label class="col-lg-1" for="">Contact Number</label>
                    <div class="col-lg-2">
                        <input type="text" name="th_supp_contact" tabindex="2" class="form-control"
                            placeholder="Enter supplier contact number">
                        <div class="clear-fix"></div>
                    </div>
                </div>





                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Bill Date *</label>
                        <div class="col-lg-2">
                            <input class="form-control datepicker" tabindex="3" id="datepicker" name="th_bill_dt"
                                placeholder="dd-mm-yyyy" required>

                            <script>
                                $('#datepicker').datepicker({
            format: 'dd-mm-yyyy',
              uiLibrary: 'bootstrap4'
          });
                            </script>

                        </div>


                        <label class="col-lg-1" for="">Bill Number *</label>
                        <div class="col-lg-2">
                            <input type="text" name="th_bill_no" tabindex="4" class="form-control"
                                placeholder="Enter bill number" required>
                            <div class="clear-fix"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-1" for="">Bill Amount *</label>
                            <div class="col-lg-2">

                                <input type="text" name="th_bill_amt" tabindex="5"
                                    onkeypress="return isNumberKey(event)" class="form-control "
                                    placeholder="Enter bill amount" required> </div>


                            <label class="col-lg-1" for="">Payment Mode</label>
                            <div class="col-lg-2">
                                <select class="custom-select" name="th_pay_mode" tabindex="6">
                                    <option>Cash</option>
                                    <option>Card</option>
                                    <option>Others</option>
                                </select>
                                <div class="clear-fix"></div>
                            </div>
                        </div>


                                   
                          <table class="table table-bordered">
                                <thead>
                                      <tr>
                                            <th>S.No</th>
                                            <th class="w-50">Item Description</th>
                                            <th class="w-20">Quantity</th>
                                            <th class="w-20">Unit Price</th>
                                            <th class="w-20">Amount</th>
                                          </tr>
                                    </thead>
                                <tbody>   
                                      <tr>       
                                            <td class="text-center">1</td>        
                                            <td><input type="text" tabindex="7" class="form-control"
                                            name="td_item_desc[]" id="row1" required></td>
                                            <td><input class="form-control text-center" tabindex="8" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty1"
                                            onkeyup="calc1()" value="" required></td>
                                            <td><input class="form-control text-right" tabindex="9" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price1"
                                            onkeyup="calc1()" value="" required></td>
                                            <td> <input class="form-control text-right" type="text" name="amount"
                                            id="amount1" disabled>
                                    </td>
                                          </tr> 
                                       <tr>
                                    <td class="text-center">2</td>        
                                            <td><input type="text" class="form-control" tabindex="10"
                                            name="td_item_desc[]" id="row2">
                                    </td>
                                            <td><input class="form-control text-center" type="text" tabindex="11"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty2"
                                            onkeyup="calc2()" value=""></td>
                                            <td><input class="form-control text-right" type="text" tabindex="12"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price2"
                                            onkeyup="calc2()" value=""></td>
                                            <td> <input class="form-control text-right" type="text" name="amount"
                                            id="amount2" value="" disabled></td>
                                         
                                </tr>
                                       <tr>
                                           <td class="text-center">3</td>        
                                            <td><input type="text" class="form-control" name="td_item_desc[]" id="row3">
                                    </td>
                                            <td><input class="form-control text-center" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty3"
                                            onkeyup="calc3()" value=""></td>
                                            <td><input class="form-control text-right" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price3"
                                            onkeyup="calc3()" value=""></td>
                                    <td> <input class="form-control text-right" type="text" name="amount" id="amount3"
                                            value="" disabled>
                                    </td>
                                         
                                </tr>

                                <tr>
                                           <td class="text-center">4</td>        
                                            <td><input type="text" class="form-control" name="td_item_desc[]" id="row4">
                                    </td>
                                            <td><input class="form-control text-center" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty4"
                                            onkeyup="calc4()" value=""></td>
                                            <td><input class="form-control text-right" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price4"
                                            onkeyup="calc4()" value=""></td>
                                    <td> <input class="form-control text-right" type="text" name="amount" id="amount4"
                                            value="" disabled>
                                    </td>
                                         
                                </tr>

                                <tr>
                                           <td class="text-center">5</td>        
                                            <td><input type="text" class="form-control" name="td_item_desc[]" id="row5">
                                    </td>
                                            <td><input class="form-control text-center" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty5"
                                            onkeyup="calc5()" value=""></td>
                                            <td><input class="form-control text-right" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price5"
                                            onkeyup="calc5()" value=""></td>
                                    <td> <input class="form-control text-right" type="text" name="amount" id="amount5"
                                            value="" disabled>
                                    </td>
                                         
                                </tr>

                                <tr>
                                           <td class="text-center">6</td>        
                                            <td><input type="text" class="form-control" name="td_item_desc[]" id="row6">
                                    </td>
                                            <td><input class="form-control text-center" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty6"
                                            onkeyup="calc6()" value=""></td>
                                            <td><input class="form-control text-right" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price6"
                                            onkeyup="calc6()" value=""></td>
                                    <td> <input class="form-control text-right" type="text" name="amount" id="amount6"
                                            value="" disabled>
                                    </td>
                                         
                                </tr>

                                <tr>
                                           <td class="text-center">7</td>        
                                            <td><input type="text" class="form-control" name="td_item_desc[]" id="row7">
                                    </td>
                                            <td><input class="form-control text-center" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty7"
                                            onkeyup="calc7()" value=""></td>
                                            <td><input class="form-control text-right" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price7"
                                            onkeyup="calc7()" value=""></td>
                                    <td> <input class="form-control text-right" type="text" name="amount" id="amount7"
                                            value="" disabled>
                                    </td>
                                         
                                </tr>
                                        
                                <tr>
                                           <td class="text-center">8</td>        
                                            <td><input type="text" class="form-control" name="td_item_desc[]" id="row8">
                                    </td>
                                            <td><input class="form-control text-center" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty8"
                                            onkeyup="calc8()" value=""></td>
                                            <td><input class="form-control text-right" type="text"
                                            onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price8"
                                            onkeyup="calc8()" value=""></td>
                                    <td> <input class="form-control text-right" type="text" name="amount" id="amount8"
                                            value="" disabled>
                                    </td>
                                         
                                </tr>
                                        

                                <tr>
                                            <td class="text-center"></td>
                                            <td class="text-right" colspan="3"><label>Total</label></td>
                                            <td><input type="text" class="form-control text-right"
                                            onkeypress="return isNumberKey(event)" name="th_bill_total"
                                            onkeyup="bill_total()" id="total" disabled></td>       
                                          </tr>

                                   
                            </tbody>
                              </table>

                        <div class="form-group">
                            <div class="row">

                                <label class="col-lg-1" for="">Attach Bill</label>
                                <div class="col-md-6">
                                    <input type="file" id="validationCustom01" name="th_attach">
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label for="comment">Justification:</label>
                            <textarea name="th_purpose" class="form-control" rows="2" id="comment"
                                placeholder="Enter the purpose of the purchase" required></textarea>
                        </div>


                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" Value="Save">
                        <a href="{{route('admin.accounts.index')}}" class="btn btn-warning" role="button">Cancel</a>
                    </div>



        </form>
    </div>



</section>
@endsection