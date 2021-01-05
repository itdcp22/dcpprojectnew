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
  function myFunction() {
    window.print();

    
  }
</script>



<script>
  function calc1() 
  {
  var fifty_qty = document.getElementById('fifty_qty').value * 50;
  document.getElementById('fifty_amount').value = fifty_qty.toFixed(3) ;   

  var twenty_qty = document.getElementById('twenty_qty').value * 20;
  document.getElementById('twenty_amount').value = twenty_qty.toFixed(3) ;   

  var ten_qty = document.getElementById('ten_qty').value * 10;
  document.getElementById('ten_amount').value = ten_qty.toFixed(3) ;   

  var five_qty = document.getElementById('five_qty').value * 5;
  document.getElementById('five_amount').value = five_qty.toFixed(3) ;   

  var one_qty = document.getElementById('one_qty').value * 1;
  document.getElementById('one_amount').value = one_qty.toFixed(3) ;  

  var fivebaisa_qty = document.getElementById('fivebaisa_qty').value * .500;
  document.getElementById('fivebaisa_amount').value = fivebaisa_qty.toFixed(3) ;  

  var baisa_qty = document.getElementById('baisa_qty').value * .100;  
  document.getElementById('baisa_amount').value = baisa_qty.toFixed(3);  

  var cash_total = fifty_qty  + twenty_qty  + ten_qty  + five_qty + one_qty + fivebaisa_qty + baisa_qty;  
  document.getElementById('total').value = cash_total.toFixed(3);
 


 
  }

  

  
</script>

<!-- End -->

@extends('layouts.admin')

@section('content')






<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <!-- /.card-header -->

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">

            <div style="text-align:center" class="font-weight-bold">

              @if(auth()->user()->company =='1')
              Al Jarwani
              @elseif(auth()->user()->company =='92')
              Muscat Mall
              @elseif(auth()->user()->company =='34')
              Oman Aquarium
              @endif


            </div>

            <div style="text-align:center">
              Cash On Hand Report
            </div>

            <div style="text-align:center">
              {{$ldate = date('d-m-Y')}}

            </div>


          </h3>




        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>


                <th> Detail</th>
                <th> Debit </th>
                <th> Credit </th>
                <th> Balance</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Cash Topup - Opening Balance
                </td>
                <td class="font-weight-bold text-right">
                  {{ number_format($topup_ob,3) }}
                </td>
                <td>

                </td>
                <td></td>
              </tr>

              <tr>
                <td>
                  Cash Topup - Current Month
                </td>
                <td class="font-weight-bold text-right">
                  {{ number_format($topup_cm,3) }}
                </td>
                <td>

                </td>
                <td></td>
              </tr>

              <tr>
                <td>
                  Paid Bills - Opening Balance
                </td>
                <td></td>
                <td class="font-weight-bold text-right">
                  {{ number_format($paid_ob,3) }}
                </td>
                <td></td>
              </tr>


              <tr>
                <td>
                  Paid Bills - Current Month
                </td>
                <td></td>
                <td class="font-weight-bold text-right">
                  {{ number_format($paid_cm,3) }}
                </td>
                <td></td>
              </tr>

              <tr>
                <td>
                  Advance Paid - Opening Balance
                </td>
                <td></td>
                <td class="font-weight-bold text-right">
                  {{ number_format($advancepaid_ob,3) }}
                </td>
                <td></td>
              </tr>

              <tr>
                <td>
                  Advance Paid - Current Month
                </td>
                <td></td>
                <td class="font-weight-bold text-right">
                  {{ number_format($advancepaid_cm,3) }}
                </td>
                <td></td>
              </tr>


            </tbody>

            <tfoot>
              <tr>
                <th>Total</th>
                <th class="font-weight-bold text-right"> {{ number_format($topup_ob + $topup_cm,3) }} </th>
                <th class="font-weight-bold text-right"> {{ number_format($paid + $advancepaid,3) }}</th>
                <th class="font-weight-bold text-right"> {{ number_format($topup - $paid - $advancepaid,3) }} </th>


              </tr>
            </tfoot>

          </table>



        </div>
        <!-- /.card-body -->
      </div>

      <div class="card">
        <div class="card-header">

          <h3 class="card-title">
            <div style="text-align:center">
              Cash Denomination
            </div>
          </h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>


                <th class="text-center">Currency</th>
                <th class="text-center"> Quantity </th>
                <th class="text-center"> Amount </th>


              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-bold text-center">
                  50.000
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="fifty_qty" id="fifty_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="fifty_amount"
                    id="fifty_amount" disabled>
                </td>

              </tr>

              <tr>
                <td class="font-weight-bold text-center">
                  20.000
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="twenty_qty" id="twenty_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="twenty_amount"
                    id="twenty_amount" disabled>
                </td>

              </tr>

              <tr>
                <td class="font-weight-bold text-center">
                  10.000
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="ten_qty" id="ten_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="ten_amount" id="ten_amount"
                    disabled>
                </td>

              </tr>

              <tr>
                <td class="font-weight-bold text-center">
                  5.000
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="five_qty" id="five_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="five_amount"
                    id="five_amount" disabled>
                </td>

              </tr>

              <tr>
                <td class="font-weight-bold text-center">
                  1.000
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="one_qty" id="one_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="one_amount" id="one_amount"
                    disabled>
                </td>

              </tr>

              <tr>
                <td class="font-weight-bold text-center">
                  500 (Baisa)
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="fivebaisa_qty" id="fivebaisa_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="fivebaisa_amount"
                    id="fivebaisa_amount" disabled>
                </td>

              </tr>


              <tr>
                <td class="font-weight-bold text-center">
                  100 (Baisa)
                </td>
                <td>
                  <input class="form-control text-center" type="text" name="baisa_qty" id="baisa_qty"
                    onkeypress="return isNumberKey(event)" onkeyup="calc1()">
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="baisa_amount"
                    id="baisa_amount" disabled>
                </td>

              </tr>


            </tbody>

            <tfoot>
              <tr>
                <th></th>
                <th class="text-right">Total</th>
                <th class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name="total" id="total" disabled>
                </th>




              </tr>
            </tfoot>

          </table>



        </div>
        <!-- /.card-body -->
      </div>
      <div class="row form-group">


        <div>
          <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
        </div>


        <div class="col" style="text-align:right">
          Printed By: {{ Auth::user()->name }}
        </div>




      </div>

      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>



@endsection