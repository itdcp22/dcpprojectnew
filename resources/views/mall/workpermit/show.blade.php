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

    <div class="row border">

      <div class="col text-center">
        <img src={{asset('dist/img/printmall.png')}}>

      </div>

    </div>


    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('mall.workpermit.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <p class="bg-warning" align="center"><strong>Work Permit Form - استمارة تصريح العمل
        </strong></p>

      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Document No:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_request_id}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:رقم المستند
          </label>
          <label class="col-md-2" for="">Date:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ date('d-m-Y', strtotime($workpermit->created_at)) }}</label>
          </div>
          <label class="col-md-2 text-right" for="">:تاريخ</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Applicant:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_applicant}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:اسم مقدم الطلب</label>
          <label class="col-md-2" for="">Designation:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_designation}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:الوظيفة</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Mobile:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_mobile}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:رقم الهاتف</label>
          <label class="col-md-1" for="">Email:</label>
          <div class="col-md-4 text-center text-danger">
            <label for=""> {{ $workpermit->wp_email}}</label>
          </div>
          <label class="col-md-1 text-right" for="">:بريد</label>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-1" for="">Company:</label>
          <div class="col-md-4 text-center text-danger">
            <label for=""> {{ $workpermit->wp_comp_name}}</label>
          </div>
          <label class="col-md-1 text-right" for="">:الشركة</label>
          <label class="col-md-2" for="">Brand:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_brand_name}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:اسم المحل</label>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-md-2" for="">Manager:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_manager}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:مدير المحل</label>
          <label class="col-md-2" for="">Contact:</label>
          <div class="col-md-2 text-center text-danger">
            <label for=""> {{ $workpermit->wp_manager_contact}}</label>
          </div>
          <label class="col-md-2 text-right" for="">:اتصل</label>
        </div>
      </div>

      <p class="bg-warning text-white"><strong>Work Duration - مدة العمل</strong></p>

      <div class="form-group">
        <div class="row">
          <label class="col" for="">Date From</label>
          <div class="col border-bottom text-danger">

            <label for=""> : {{ date('d-m-Y', strtotime($workpermit->wp_from_date)) }} </label>


          </div>
          <label class="col" for="">Date To</label>
          <div class="col border-bottom text-danger">

            <label for=""> : {{ date('d-m-Y', strtotime($workpermit->wp_to_date)) }} </label>




          </div>

          <label class="col" for="">Start Time</label>
          <div class="col border-bottom text-danger">

            <label for=""> : {{ date('h:i A', strtotime($workpermit->wp_from_time)) }} </label>

          </div>

          <label class="col" for="">End Time</label>
          <div class="col border-bottom text-danger">
            <label for=""> : {{ date('h:i A', strtotime($workpermit->wp_to_time)) }} </label>

          </div>
        </div>
      </div>



      <div class="form-group">
        <p class="bg-warning text-white"><strong>Work Category - تصنيف العمل</strong>
          <textarea class="form-control" name="wp_category" rows="2" id="comment" placeholder="Work Category"
            readonly>{{$workpermit->wp_category}}</textarea>
        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Description of Work - وصف العمل</strong>
          <textarea class="form-control" name="wp_description" rows="2" id="comment"
            placeholder="Enter work description in detail" readonly>{{$workpermit->wp_description}}</textarea>
        </p>
      </div>

      <div class="form-group">
        <p class="bg-warning text-white"><strong>Contractor Details - بيانات المقاول </strong>
        </p>

        <div class="row">

          <label class="col-md-1" for="">Company:</label>
          <div class="col-md-3 border-bottom text-danger">
            <label for=""> {{ $workpermit->wp_cont_comp}}</label>

          </div>
          <label class="col-md-1" for="">Name:</label>
          <div class="col-md-3 border-bottom text-danger">
            <label for=""> {{ $workpermit->wp_cont_person}} </label>

          </div>

          <label class="col-md-1" for="">Mobile:</label>
          <div class="col-md-1 border-bottom text-danger">
            <label for=""> {{ $workpermit->wp_cont_mobile}}</label>

          </div>

          <label class="col-md-1" for="">Workers:</label>
          <div class="col-md-1 border-bottom text-danger">
            <label for=""> {{ $workpermit->wp_no_workers}}</label>

          </div>
        </div>
      </div>

      <div class="form-group">
        <p class="bg-primary text-white"><strong>Mall Status</strong>
        </p>

        <div class="row">

          <label class="col" for="">Status</label>
          <div class="col border-bottom text-danger">
            <label for=""> : {{ $workpermit->wp_status}}</label>
          </div>


          @if($workpermit->wp_status =='Approved')
          <label class="col" for="">Approved Date: </label>
          @elseif($workpermit->wp_status =='Not_Approved')
          <label class="col" for="">Not Approved Date:</label>
          @else
          <label class="col" for=""></label>
          @endif



          <div class="col border-bottom text-danger">
            <label for="">
              @if ( !empty ( $workpermit->wp_approved_date ) )
              {{ date('d-m-Y', strtotime($workpermit->wp_approved_date)) }}
              @endif
            </label>
          </div>

          @if($workpermit->wp_status =='Approved')
          <label class="col" for="">Approved By : </label>
          @elseif($workpermit->wp_status =='Not_Approved')
          <label class="col" for="">Not Approved By: </label>
          @else
          <label class="col" for=""></label>
          @endif



          <div class="col border-bottom text-danger">
            <label for=""> {{ $workpermit->wp_approved_name}} </label>
          </div>



          @if($workpermit->wp_status =='Approved')
          <label class="col" for="">Signature:</label>
          @elseif($workpermit->wp_status =='Rejected')
          <label class="col" for="">Signature:</label>
          @else
          <label class="col" for=""></label>
          @endif


          <div class="col border-bottom text-danger">

            @if($workpermit->wp_approved_uid =='38')
            <img src={{asset('dist/img/cheatannewbgsmall.png')}}>

            @elseif($workpermit->wp_approved_uid =='37')

            <img src={{asset('dist/img/hussainjamal1.png')}}>



            @elseif($workpermit->wp_approved_uid =='45')

            <img src={{asset('dist/img/vikash.png')}}>

            @elseif($workpermit->wp_approved_uid =='36')

            <img src={{asset('dist/img/abdu1.PNG')}}>

            @endif




          </div>

        </div>



        <div class="form-group">
          <p class="bg-primary text-white"><strong>Mall Remarks:</strong>
            <textarea class="form-control" name="wp_approved_remark" rows="2" id="comment" placeholder="Mall Remarks"
              readonly>{{$workpermit->wp_approved_remark}}</textarea>
          </p>
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
            <li>Responsible if in case of any damage in surrounding area.</li>
            <li>For HOT work permits, valid fire extingusher and first aid kit has to be stored at work place</li>
          </ol>
           <p align="center"> I understand & accept all the responsibilities as explained in work permit terms and
            conditions. </p>



          <div class="col text-center">
            <img src={{asset('dist/img/qr.png')}}>

          </div>








          <div class="form-group">
            <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
          </div>





    </form>
  </div>
</section>
@endsection