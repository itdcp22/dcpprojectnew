<?php
// Create a function for converting the amount in words
function numberTowords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
  $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
  while( $x < $count_length ) {
       $get_divider = ($x == 2) ? 10 : 100;
       $amount = floor($num % $get_divider);
       $num = floor($num / $get_divider);
       $x += $get_divider == 10 ? 1 : 2;
       if ($amount) {
         $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
         $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
         $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
         '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
         '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
         }else $string[] = null;
       }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . '' : '') . $get_paise;
}
 
?>

@extends('layouts.admin')
@section('content')

<style>
    div.a {
        font-size: 20px;
    }

    div.b {
        font-size: large;
    }

    div.c {
        font-size: 150%;
    }
</style>


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

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">



                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">

    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>

    <div class="a">
        Date :{{date('d-m-Y', strtotime($payment->created_at))}}<br>
        Transaction Number :{{$payment->pay_tran_no}}


    </div>

    <h1>&nbsp;</h1>


    <div class="form-group">
        <div class="row">
            <div class="col">
                <div class="a">
                    <p>To,</br>
                        The Manager </br>
                        {{$payment->bank_name}} </br>
                        Sultanate Of Oman
                    </p>
                </div>

            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col a">
                <p class="font-weight-bold">Subject: Account No: {{$payment->bank_acc_no}}
                </p>

            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col">
                <div class="a">I hereby request you to transfer an amount of <b>
                        {{$payment->pay_supp_currency}}. {{number_format($payment->pay_supp_amount) }} </b> (<?php
            
                          $get_amount= numberTowords($payment->pay_supp_amount);
                          echo $get_amount;
            
                      ?>
                    ) from the above mentioned
                    account to the details given below.</div>



            </div>

        </div>
    </div>

    <h1>&nbsp;</h1>


    <div class="container-fluid">
        <form class="needs-validation" name="myform" id="myform" novalidate method="post"
            action="{{ route('mall.tenant.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-left">
                        <label>Name</label>
                    </div>
                    <div class="col-4">
                        <label>: {{$payment->pay_supp_acc_name}}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-left">
                        <label>Account Number</label>
                    </div>
                    <div class="col-4">
                        <label>: {{$payment->pay_supp_acc_no}}</label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-left">
                        <label>Bank Number</label>
                    </div>
                    <div class="col-4">
                        <label>: {{$payment->pay_supp_bank_name}}</label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-2 text-left">
                        <label>Swift Code</label>
                    </div>
                    <div class="col-4">
                        <label>: {{$payment->pay_supp_swift_code}}</label>
                    </div>
                </div>
            </div>




            <div class="form-group">
                <div class="row">


                    <div class="col-2 text-left">
                        <label>IBAN</label>
                    </div>
                    <div class="col-4">
                        <label>: {{$payment->pay_supp_iban}}</label>
                    </div>
                </div>
            </div>

            <h1>&nbsp;</h1>

            <div class="form-group">
                <div class="row">
                    <div class="col a">
                        <p>Thank you for your cooperation and assistance.</p></br>

                        <p>Best Regards,</p> </br>
                        <h1>&nbsp;</h1>


                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col a">

                        <h1>&nbsp;</h1>

                        <label>

                            @if($payment->pay_comp_code =='92')
                            For TAMANI GLOBAL DEVELOPMENT & INVESTMENT L.L.C
                            @else
                            For TAMANI TRADING AND ENTERTAINMENT L.L.C
                            @endif
                        </label>
                    </div>

                </div>
            </div>


            <h1>&nbsp;</h1>
            <h1>&nbsp;</h1>








        </form>
    </div>
</section>
@endsection