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

@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Bill</h1>
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
  <div class="container-fluid">
    <form class="needs-validation" novalidate method="post"
      action="{{ route('admin.accounts.update',  $account->th_tran_no) }}">
      @method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="row">
          <label class="col-lg-1" for="">Supplier Name *</label>
          <div class="col-lg-5">
            <input class="form-control" data-error="Please enter name field." type="text" name="th_supp_name"
              value="{{ $account->th_supp_name}}" class="form-control" placeholder="Enter Supplier name" required>
            <div class="clear-fix"></div>
          </div>
        </div>


        <div class="form-group">
          <div class="row">
            <label class="col-lg-1" for="">Bill Date *</label>
            <div class="col-lg-2">
              <input class="form-control" id="datepicker" name="th_bill_dt"
                value="{{ $account->th_bill_dt->format('d-m-Y') }}" placeholder="Enter bill date" required>
              <script>
                $('#datepicker').datepicker({
          format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap4'
        });
              </script>



            </div>






            <label class="col-lg-1" for="">Bill Number *</label>
            <div class="col-lg-2">
              <input type="text" name="th_bill_no" value="{{ $account->th_bill_no}}" class="form-control"
                placeholder="Enter bill number" required>
              <div class="clear-fix"></div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-1" for="">Bill Amount *</label>
              <div class="col-lg-2">
                <input type="text" name="th_bill_amt" value="{{ $account->th_bill_amt}}" class="form-control"
                  placeholder="Enter bill amount" required> </div>



              <label class="col-lg-1" for="">Payment Mode</label>
              <div class="col-lg-2">
                <input type="text" name="th_pay_mode" value="{{ $account->th_pay_mode}}" class="form-control"
                  placeholder="Enter Cash / Card">
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
                       @foreach($item as $item)
                <tr>
                  <td> {{ $loop->iteration }}</td>
                  <td> {{ $item-> td_item_desc }}</td>
                  <td> {{ $item-> td_qty }}</td>
                  <td> {{number_format($item->td_unit_price,3)}}</td>
                  <td> {{ number_format($item->td_unit_price * $item->td_qty,3) }}</td>
                </tr>
                @endforeach

                      </tr>

                       
                   
              </tbody>
                </table>



                       
             


            <div class="form-group">
              <div class="row">

                <label class="col-lg-1" for="">Attach Bill</label>
                <div class="col-md-6">

                  <input type="file" name="file">

                </div>
              </div>
            </div>
             
             
            <div class="form-group">
              <label for="comment">Justification:</label>

              <input type="text" name="th_purpose" value="{{ $account->th_purpose}}" class="form-control" required>

            </div>


          </div>


          <div class="form-group">
            <input type="submit" class="btn btn-info" Value="Save">
            <a href="{{route('admin.accounts.index')}}" class="btn btn-warning" role="button">Cancel</a>
          </div>



    </form>
  </div>



</section>
@endsection