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

    <div class="row border">

      <div class="col text-center">
        <img src={{asset('dist/img/printmall.png')}}>

      </div>

    </div>



    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.workpermit.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">


      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <p class="bg-warning" align="center"><strong>Purchase Request
        </strong></p>

      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Document No:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{$purchaserequest->pr_req_no}} </label>


          </div>
          <label class="col-md-2 text-right" for="">:رقم المستند
          </label>
          <label class="col-md-2" for="">Date:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ date('d-m-Y', strtotime($purchaserequest->created_at)) }}</label>
          </div>
          <label class="col-md-2 text-right" for="">:تاريخ</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Name:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $purchaserequest->pr_req_name}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:اسم مقدم الطلب</label>
          <label class="col-md-2" for="">Designation:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $purchaserequest->pr_req_desi}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:الوظيفة</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Mobile:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $purchaserequest->pr_req_mobile}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:رقم الهاتف</label>
          <label class="col-md-1" for="">Email:</label>
          <div class="col-md-4 text-center text-danger">
            <label for=""> {{ $purchaserequest->pr_req_email}}</label>
          </div>
          <label class="col-md-1 text-right" for="">:بريد</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-1" for="">Company:</label>
          <div class="col-md-4 text-center text-danger">
            <label for=""> {{ $purchaserequest->pr_req_comp_name}}</label>
          </div>
          <label class="col-md-1 text-right" for="">:الشركة</label>
          <label class="col-md-2" for="">Date Required:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $purchaserequest->wp_brand_name}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:اسم المحل</label>
        </div>
      </div>




      <p class="bg-warning text-white"><strong>Item Details</strong></p>


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
                 @foreach($purchaserequestitems as $purchaserequestitem)
          <tr>
            <td class="text-center"> {{ $loop->iteration }}</td>
            <td> {{ $purchaserequestitem->pri_item}}</td>
            <td class="text-center"> {{ $purchaserequestitem-> pri_qty }}</td>
            <td class="text-right"> {{number_format($purchaserequestitem->pri_price,3)}}</td>
            <td class="text-right"> {{number_format($purchaserequestitem->pri_amount,3)}}</td>

          </tr>

          @endforeach
                </tr>
          <tr>


            <td colspan="4" class="font-weight-bold text-right">Total</td>
            <td class="font-weight-bold text-right"></td>
          </tr>



                 
             
        </tbody>
          </table>


      <div class="form-group">
        <p class="bg-warning text-white"><strong>Justification</strong>
          <textarea class="form-control" name="wp_category" rows="2" id="comment" placeholder="Justification"
            readonly>{{$purchaserequest->wp_category}}</textarea>
        </p>
      </div>










      <div class="form-group">
        <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
      </div>





    </form>
  </div>
</section>
@endsection