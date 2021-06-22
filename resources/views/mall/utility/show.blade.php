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

@extends('layouts.adminwp')
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
  function myFunction() {
    window.print();

    
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





<section class="content">




  <div class="container-fluid border border-secondary">

    <div class="row text-center">
      <div class="col text-center">
        <img src={{asset('dist/img/printmall.png')}}>
        <h1 text-center>Tamani Global Development and Investment L.L.C</h1>
      </div>
    </div>

    <div class="row border ">
      <div class="col text-center">
        <p>P.O. Box No: 148, P C No.102, Muscat, Sultanate of Oman</br>
          Telephone: 2401 4015, Email: accounts@mallofmuscat.com</br>
          <B>VAT Number: OM1100034041</B></p>

        <h2><u>PERFORMA INVOICE </u></h2>
      </div>
    </div>

    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.workpermit.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row border">
        <div class="col border text-center">
          <div class="form-group">
            <div class="row">

              <div class="col text-left">
                <label class="col-lg-1 text-left" for="">Bill To :</label>
                <P>{{ $utility->ui_brand_name }},{{ $utility->ui_comp_name }} <br>
                  VAT: {{ $utility->ui_vat_no}}</P>

              </div>
            </div>
          </div>

        </div>

        <div class="col text-center">

          <div class="form-group">
            <div class="row">
              <label class="col text-left" for="">Invoice Date</label>
              <div class="col text-left">
                : {{ date('d-m-Y', strtotime($utility->created_at)) }}
              </div>
            </div>
            <div class="row">
              <label class="col text-left" for="">Invoice Number</label>
              <div class="col text-left">
                : {{ $utility->ui_tran_no }}
              </div>
            </div>
          </div>
        </div>


      </div>

      <div class="row border">
        <div class="col text-center">
          <div class="form-group">
            <div class="row">
              <div class="col text-left align-text-bottom">
                <p class="align-text-bottom"><b>Service: Being charges for {{ $utility->ui_type }} consumed from
                    {{ date('d-m-Y', strtotime($utility->ui_from_date))  }} to
                    {{ date('d-m-Y', strtotime($utility->ui_to_date)) }}</b></p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row border">
        <div class="col text-center">
          <div class="form-group">
            <div class="row">

              <div class="col text-left">

                <div class="row border">
                  <div class="col text-center">
                    <div class="form-group">
                      <div class="row">

                        <div class="col text-left">

                          <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w-10 text-center">S.No</th>
                                        <th class="w-50 text-left">Description</th>
                                        <th class="w-20 text-center">Opening Reading</th>
                                        <th class="w-20 text-center">Closing Reading</th>
                                        <th class="w-20 text-center">Consumption</th>
                                        <th class="w-20 text-center">Unit Rate</th>
                                        <th class="w-20 text-center">Amount</th>
                                       

                                      </tr>
                                  </thead>
                                <tbody>    
                                    <tr>     
                                   
                              <tr>
                                <td class="text-center">1 </td>
                                <td class="text-left"> {{ $utility->ui_type }}</td>


                                <td class="text-right"> {{ $utility->ui_omr }}</td>
                                <td class="text-right"> {{ $utility->ui_cmr }}</td>
                                <td class="text-right">{{ $utility->ui_consumed }}</td>
                                <td class="text-right"> {{number_format($utility->ui_rate,3) }}</td>
                                <td class="text-right"> {{number_format($utility->ui_amount,3) }}</td>


                              </tr>





                                    </tr>
                              <tr>
                                <td colspan="6" class="text-right">VAT</td>
                                <td class="text-right">{{number_format($utility->ui_vat,3) }}</td>
                              </tr>

                              <tr>
                                <td colspan="6" class="font-weight-bold text-right">Grand Total</td>
                                <td class="font-weight-bold text-right">{{number_format($utility->ui_netamount,3) }}
                                </td>
                              </tr>


                              <tr>
                                <td colspan="9" class="font-weight-bold text-left">Amount in Words: <?php
                                  $total = $utility->ui_netamount;
                                  $obj = new toWords($total);
                                  echo $obj->words;
                                  ?>
                                </td>
                              </tr>

                              <tr>
                                <td colspan="9" class="font-weight-bold text-left">Narration: </td>
                              </tr>




                                     
                                 
                            </tbody>
                              </table>

                        </div>
                      </div>
                    </div>

                  </div>





                </div>

              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="row border">
        <div class="col text-center">
          <div class="form-group">
            <div class="row">

              <div class="col text-left my-auto">
                <p><b>For, Tamani Global Development and Investment L.L.C</b></p>
                <img src={{asset('dist/img/stamp.png')}}>


              </div>
            </div>
          </div>

        </div>
      </div>



      <div class="row border">
        <div class="col text-center">
          <div class="form-group">
            <div class="row">

              <div class="col text-left">
                <label class="col text-center" for="">Prepared By: {{ $utility->ui_created_name }}</label>
              </div>

              <div class="col text-left">
                <label class="col text-center" for="">Checked By: Sharifa Al Balushi </label>
              </div>

              <div class="col text-left">
                <label class="col text-center" for="">Approved By: Rajumon</label>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row border">
        <div class="col text-center">
          <div class="form-group">
            <div class="row">
              <div class="col text-left">
                <label class="col text-left" for="">Company Bank Details:</label>
                <p>Bank Name &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: Sohar Islamic Bank <br>
                  Account Number &nbsp;: 70801001900001 <br>
                  Branch &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;: Ghala Branch <br>
                </p>
                <a onclick="myFunction()" class="btn btn-secondary btn-sm">Print</a>
              </div>



            </div>
          </div>

        </div>
      </div>






    </form>

  </div>
</section>
@endsection