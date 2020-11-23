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

@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">


      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.accounts.index')}}">Unpaid Bills</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="row">
    <div class="col text-center">
      <img src={{asset('dist/img/printjarwani.png')}}>
    </div>
    <div class="col">
      <h1 class="m-0 text-dark text-center">Al Jarwani Group</h1>
      <h2 class="m-0 text-dark text-center">{{ $account->th_comp_name}}</h2>
      <h4 class="m-0 text-dark text-center">Claim Form</h4>
    </div>
    <div class="col text-center">
      @if($account->th_comp_code =='2')
      <img src={{asset('dist/img/printmall.png')}}>
      @elseif($account->th_comp_code =='3')
      <img src={{asset('dist/img/printaqua.png')}}>
      @else
      <img src={{asset('dist/img/printjarwani.png class=img-circle elevation-2 alt=Logo')}}>
      @endif
    </div>
  </div>

  <div class="container-fluid">
    <form class="needs-validation" novalidate method="post">
      @method('GET')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


      <div class="form-group">
        <div class="row">
          <label class="col" for="">Supplier Name </label>
          <div class="col">
            <input class="form-control" id="datepicker" name="bill_date" value="{{ $account->th_supp_name}}" readonly>
          </div>



          <label class="col" for="">Contact Number </label>
          <div class="col">
            <input type="text" name="th_bill_no" value="{{ $account->th_supp_contact}}" class="form-control" readonly>

          </div>
        </div>


        <div class="form-group">
          <div class="row">
            <label class="col" for="">Bill Date </label>
            <div class="col">
              <input class="form-control" id="datepicker" name="bill_date"
                value="{{ date('d-m-Y', strtotime($account->th_bill_dt))}}" readonly>
            </div>



            <label class="col" for="">Bill Number </label>
            <div class="col">
              <input type="text" name="th_bill_no" value="{{ $account->th_bill_no}}" class="form-control" readonly>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col" for="">Bill Amount </label>
              <div class="col">
                <input type="text" name="th_bill_amt" value="{{ number_format($account->th_bill_amt,3)}}"
                  class="form-control" readonly> </div>



              <label class="col" for="">Payment Mode</label>
              <div class="col">
                <input type="text" name="th_pay_mode" value="{{ $account->th_pay_mode}}" class="form-control" readonly>
                <div class="clear-fix"></div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label class="col" for="">Transaction Date </label>
                <div class="col">
                  <input type="text" name="th_emp_name" value="{{ date('d-m-Y', strtotime($account->created_at)) }}"
                    class="form-control" readonly> </div>




                <label class="col" for="">Transaction Number</label>
                <div class="col">
                  <input type="text" name="th_item_type" value="{{ $account->th_tran_no }}" class="form-control"
                    readonly>
                  <div class="clear-fix"></div>
                </div>
              </div>









                         
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="w-10 text-center">S.No</th>
                            <th class="w-50 text-center">Item Description</th>
                            <th class="w-20 text-center">Quantity</th>
                            <th class="w-20 text-center">Unit Price</th>
                            <th class="w-20 text-center">Amount</th>
                          </tr>
                      </thead>
                    <tbody>    
                        <tr>     
                         @foreach($item as $item)
                  <tr>
                    <td class="text-center"> {{ $loop->iteration }}</td>
                    <td> {{ $item-> td_item_desc }}</td>
                    <td class="text-center"> {{ $item-> td_qty }}</td>
                    <td class="text-right"> {{number_format($item->td_unit_price,3)}}</td>
                    <td class="text-right"> {{ number_format($item->td_unit_price * $item->td_qty,3) }}</td>
                  </tr>

                  @endforeach
                        </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="font-weight-bold text-right">Total</td>
                    <td class="font-weight-bold text-right">{{ number_format($items_total,3) }}</td>
                  </tr>



                         
                     
                </tbody>
                  </table>
               
              <div class="form-group">
                <div class="row">
                  <label class="col" for="">Justification: {{ $account->th_purpose}} </label>

                </div>



              </div>


              <div class="form-group">
                <div class="row">
                  <label class="col" for="">Employee Name </label>
                  <div class="col">
                    <input type="text" name="th_emp_name" value="{{ $account->th_emp_name }}" class="form-control"
                      readonly> </div>




                  <label class="col" for="">Employee Signature</label>
                  <div class="col">
                    <input type="text" name="th_item_type" class="form-control" readonly>
                    <div class="clear-fix"></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <label class="col" for="">Line Manager Name </label>
                    <div class="col">
                      <input type="text" name="th_emp_name" class="form-control" readonly> </div>




                    <label class="col" for="">Line Manager Signature </label>
                    <div class="col">
                      <input type="text" name="th_item_type" class="form-control" readonly>
                      <div class="clear-fix"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <label class="col" for="">Accountant Name </label>
                      <div class="col">
                        <input type="text" name="th_emp_name" class="form-control" readonly> </div>




                      <label class="col" for="">Accountant Signature </label>
                      <div class="col">
                        <input type="text" name="th_item_type" class="form-control" readonly>
                        <div class="clear-fix"></div>
                      </div>
                    </div>


                  </div>


                  <div class="form-group">



                    <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>




                  </div>



    </form>
  </div>



</section>
@endsection