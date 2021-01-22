<?php


define("MAJOR", 'And');
define("MINOR", ' Baisa Only');
class toWords{
           var $pounds;
           var $pence;
           var $major;
           var $minor;
           var $words = '';
           var $number;
           var $magind;
           var $units = array('','One','Two','Three','Four','Five','Six','Seven','Eight','Nine');
           var $teens = array('Ten','Eleven','Twelve','Thirteen','Fourteen','Fifteen','Sixteen','Seventeen','Eighteen','Nineteen');
           var $tens = array('','Ten','Twenty','Thirty','Forty','Fifty','Sixty','Seventy','Eighty','Ninety');
           var $mag = array('','Thousand','Million','Billion','Trillion');
   public function __construct($amount, $major=MAJOR, $minor=MINOR) {
             $this->major = $major;
             $this->minor = $minor;
             $this->number = number_format($amount,3);
             list($this->pounds,$this->pence) = explode('.',$this->number);
             $this->words = " $this->major $this->pence$this->minor";
             if ($this->pounds==0)
                 $this->words = "Zero $this->words";
             else {
                 $groups = explode(',',$this->pounds);
                 $groups = array_reverse($groups);
                 for ($this->magind=0; $this->magind<count($groups); $this->magind++) {
                      if (($this->magind==1)&&(strpos($this->words,'Hundred') === false)&&($groups[0]!='000'))
                           $this->words = ' And ' . $this->words;
                      $this->words = $this->_build($groups[$this->magind]).$this->words;
                 }
             }
    }
    function _build($n) {
             $res = '';
             $na = str_pad("$n",3,"0",STR_PAD_LEFT);
             if ($na == '000') return '';
             if ($na[0] != 0)
                 $res = ' '.$this->units[$na[0]] . ' Hundred';
             if (($na[1]=='0')&&($na[2]=='0'))
                  return $res . ' ' . $this->mag[$this->magind];
             $res .= $res==''? '' : '';
             $t = (int)$na[1]; $u = (int)$na[2];
             switch ($t) {
                     case 0: $res .= ' ' . $this->units[$u]; break;
                     case 1: $res .= ' ' . $this->teens[$u]; break;
                     default:$res .= ' ' . $this->tens[$t] . ' ' . $this->units[$u] ; break;
             }
             $res .= ' ' . $this->mag[$this->magind];
             return $res;
    }
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

<section class="content ml-4">

    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>

    <div class="a">
        Date :{{date('d-m-Y', strtotime($payment->created_at))}}<br>
        Transaction Number :{{$payment->pay_tran_no}}<br>
        Reference Number :{{$payment->pay_supp_ref_no}}


    </div>

    <h1>&nbsp;</h1>


    <div class="form-group">
        <div class="row">
            <div class="col">
                <div class="a">
                    <p>To,</br>
                        The Manager </br>
                        {{$payment->bank_name}} </br>
                        Sultanate Of Oman.
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
                        {{$payment->pay_supp_currency}}. {{number_format($payment->pay_supp_amount) }} </b> (

                    <?php
                            $total = $payment->pay_supp_amount;
                            $obj = new toWords($total);
                            echo $obj->words;
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
                    <div class="col-3 text-left c">

                        <label>Name</label>
                    </div>
                    <div class="col-6 c">
                        <label>: {{$payment->pay_supp_acc_name}}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3 text-left c">
                        <label>Account Number</label>
                    </div>
                    <div class="col-6 c">
                        <label>: {{$payment->pay_supp_acc_no}}</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-3 text-left c">
                        <label>Bank Name</label>
                    </div>
                    <div class="col-6 c">
                        <label>: {{$payment->pay_supp_bank_name}}</label>
                    </div>
                </div>
            </div>


            @if(!empty($payment->pay_supp_iban))

            <div class="form-group">
                <div class="row">
                    <div class="col-3 text-left c">
                        <label>Swift Code</label>
                    </div>
                    <div class="col-6 c">
                        <label>: {{$payment->pay_supp_swift_code}}</label>
                    </div>
                </div>
            </div>





            <div class="form-group">
                <div class="row">
                    <div class="col-3 text-left c">
                        <label>IBAN</label>
                    </div>
                    <div class="col-6 c">
                        <label>: {{$payment->pay_supp_iban}}</label>
                    </div>
                </div>
            </div>
            @endif

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