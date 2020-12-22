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

  <div class="row">
    <div class="col text-center">
      <img src={{asset('dist/img/printjarwani2.png')}}>
    </div>
    <div class="col">
      <h1 class="m-0 text-dark text-center">Al Jarwani Group</h1>
      <h2 class="m-0 text-dark text-center">Mall Of Muscat</h2>

    </div>
    <div class="col text-center">

      <img src={{asset('dist/img/printmall.png')}}>





    </div>
  </div>


  <div class="container-fluid border border-primary">
    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.workpermit.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <p class="bg-warning" align="center"><strong>Work Permit Form</strong></p>

      <div class="form-group">
        <div class="row">
          <label class="col" for="">Work Permit ID</label>
          <div class="col">
            <label for="">: {{ $workpermit->wp_request_id}}</label>

          </div>
          <label class="col" for="">Date</label>
          <div class="col">
            <label for="">: {{ date('d-m-Y', strtotime($workpermit->created_at)) }}</label>

          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col" for="">Applicant</label>
          <div class="col">
            <label for="">: {{ $workpermit->wp_applicant}}</label>

          </div>
          <label class="col" for="">Designation</label>
          <div class="col">
            <label for="">: {{ $workpermit->wp_designation}}</label>

          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col" for="">Mobile</label>
          <div class="col">
            <label for="">: {{ $workpermit->wp_mobile}}</label>


          </div>
          <label class="col" for="">Email</label>
          <div class="col">
            <label for="">: {{ $workpermit->wp_email}}</label>



          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col" for="">Company</label>
          <div class="col">


            <label for="">: {{ $workpermit->wp_comp_name}}</label>

          </div>
          <label class="col" for="">Brand</label>
          <div class="col">

            <label for="">: {{ $workpermit->wp_brand_name}}</label>




          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col" for="">Manager</label>
          <div class="col">
            <label for="">: {{ $workpermit->wp_manager}}</label>

          </div>
          <label class="col" for="">Contact</label>
          <div class="col">


            <label for="">: {{ $workpermit->wp_manager_contact}}</label>



          </div>
        </div>
      </div>

      <p class="bg-warning text-white"><strong>Work Duration</strong></p>

      <div class="form-group">
        <div class="row">
          <label class="col" for="">Date From</label>
          <div class="col border-bottom">
            <label for=""> : {{ date('d-m-Y', strtotime($workpermit->wp_from_date)) }} </label>
          </div>
          <label class="col" for="">Date To</label>
          <div class="col border-bottom">
            <label for=""> : {{ date('d-m-Y', strtotime($workpermit->wp_to_date)) }} </label>
          </div>
          <label class="col" for="">Time From</label>
          <div class="col border-bottom">
            <label for=""> : {{ date('h:i A', strtotime($workpermit->wp_from_time)) }} </label>
          </div>
          <label class="col" for="">Time To</label>
          <div class="col border-bottom">
            <label for=""> : {{ date('h:i A', strtotime($workpermit->wp_to_time)) }} </label>
          </div>
        </div>
      </div>



      <div class="form-group">
        <p class="bg-warning text-white"><strong>Work Category</strong>
          <textarea class="form-control" name="wp_category" rows="3" id="comment" placeholder="Work Category"
            readonly>{{$workpermit->wp_category}}</textarea>
        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Description of Work</strong>
          <textarea class="form-control" name="wp_description" rows="3" id="comment"
            placeholder="Enter work description in detail" readonly>{{$workpermit->wp_description}}</textarea>
        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Contractor Details </strong>
        </p>

        <div class="row">

          <label class="col" for="">Company</label>
          <div class="col border-bottom">
            <label for=""> : {{ $workpermit->wp_cont_comp}}</label>

          </div>
          <label class="col" for="">Person Name</label>
          <div class="col border-bottom">
            <label for=""> : {{ $workpermit->wp_cont_person}} </label>

          </div>

          <label class="col" for="">Mobile Number</label>
          <div class="col border-bottom">
            <label for=""> : {{ $workpermit->wp_cont_mobile}}</label>

          </div>

          <label class="col" for="">No. Workers</label>
          <div class="col border-bottom">
            <label for=""> : {{ $workpermit->wp_no_workers}}</label>

          </div>
        </div>
      </div>

      <div class="form-group">
        <strong>  Terms & Conditions:</strong> 

        <ol>
          <li>Work permit requests should be submitted to the Mall Management at least 24 hours prior to
            the
            commencement of the work.</li>
          <li>Work ID copy should be submitted to the security department to get access into the mall</li>
          <li>Delivery of materials and all noisy works should be carried out after the mall trading hours
            only.</li>
          <li>No material and shop fixtures to be left in the mall common areas.</li>
          <li>All workers must follow the safety and security rules and regulations.</li>
          <li>Please report to the security if any incident/damage to the property.</li>
        </ol>
         <p align="center"> I understand & accept all the responsibilities as explained in work permit terms and
          Conditions. </p>


        <div class="form-group">
          <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>

        </div>



    </form>
  </div>
</section>
@endsection