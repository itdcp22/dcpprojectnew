@extends('layouts.admin')
@section('content')

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


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
  function calc2() 
        {   
          var x = document.getElementById('kpi_exist').value;
          var y = document.getElementById('kpi_tarperc').value;
          var z = document.getElementById('level').value;    
    
      
          
        if (z == 'Increase') {             
          var target = x * y;
          var threshold = target / 100;
          var targetfinal = +x + +threshold;             
     
        document.getElementById('targetfinal').value = targetfinal.toFixed(0);
        document.getElementById('threshold').value = threshold.toFixed(0);
  } else if (z == 'Decrease') {             
    var target = x * y;
          var threshold = target / 100;
          var targetfinal = +x - +threshold;             
     
        document.getElementById('targetfinal').value = targetfinal.toFixed(0);
        document.getElementById('threshold').value = document.getElementById('kpi_exist').value;
  } else {   
     
     
    var target = x * y;
              var threshold = target / 100;
          var targetfinal = +x ;             
     
        document.getElementById('targetfinal').value = targetfinal.toFixed(0);
        document.getElementById('threshold').value = document.getElementById('base').value;
  
    
  }


        }
        
</script>


<script>
  function percalc() 
        {   
          var xx = document.getElementById('kpi_per_gf').value;    
          var yy = document.getElementById('kpi_per_yf').value;    

          document.getElementById('kpi_per_yt').value = xx-1;
          document.getElementById('kpi_per_rt').value = yy-1;
    
      
          
      


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




<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Initiative Description Form</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

          <li class="breadcrumb-item"><a href="{{route('foh.booking.index')}}">Initiative</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('kpi.initiative.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">

      @csrf








      <div class="form-group">
        <div class="row">
          <div class="col-2 text-danger">
            <label for="">KPI Title</label>
          </div>
          <div class="col-8">
            <select class="custom-select" id="companyID" name="ini_kpi_id" onchange="getCompanyName();" tabindex="2"
              required>
              <option value="" selected disabled hidden>Please select</option>
              @foreach($info as $i)
              <option value="{{ $i->id}}">{{ $i->kpi_title}}</option>
              @endforeach
            </select>

            <input type="hidden" id="ini_kpi_title" name="ini_kpi_title">

            <script>
              $('#companyID').on('change', function() 
                                           {
                                             var selectedName = $('#companyID option:selected').text();
                                            $('#ini_kpi_title').val(selectedName);
                                                      }
                                            )
            </script>


          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <div class="col-2 text-danger">
            <label for="">Objective</label>
          </div>
          <div class="col-8">
            <input type="text" class="form-control" id="info_obj_des" tabindex="2" name="info_obj_des" readonly>

          </div>
        </div>
      </div>

      @php

      if (!empty($lastRecord->ini_code))
      {
      $myStr = $lastRecord->ini_code;
      $result = substr ($lastRecord->ini_code, -4);
      $resultfinal = $result + 1;
      }
      else {
      $resultfinal = 1001;
      }

      @endphp



      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Initiative Code</label>
          <div class="col-8">
            <input type="text" class="form-control" id="ini_code" tabindex="3" name="ini_code" value={{$resultfinal}}
              required readonly>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Initiative Title</label>
          <div class="col-8">
            <input type="text" class="form-control" id="ini_title" tabindex="3" name="ini_title"
              placeholder="Enter title of the initiative" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Description
          </label>
          <div class="col-8">
            <input type="text" class="form-control" id="ini_desc" tabindex="4" name="ini_desc"
              placeholder="Explain the initiative so everyone can understand" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Scope
          </label>
          <div class="col-8">
            <input type="text" class="form-control" id="ini_scope" tabindex="5" name="ini_scope"
              placeholder="Enter scope of this initiative">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Measurement
          </label>
          <div class="col-8">
            <input type="text" class="form-control" id="ini_msr" name="ini_msr" tabindex="6">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Current Result
          </label>
          <div class="col-3">
            <input type="text" class="form-control" id="ini_cur_result" name="ini_cur_result" tabindex="7">
          </div>
          <label class="col-2 text-center" for="">Owner
          </label>
          <div class="col-3">
            <input type="text" class="form-control" id="ini_owner" name="ini_owner" tabindex="8" placeholder=""
              required>
          </div>

        </div>
      </div>




      <div class="form-group">
        <div class="row">

          <label class="col-2" for="">Budget
          </label>
          <div class="col-3">
            <input type="text" class="form-control" id="ini_budget" tabindex="9" name="ini_budget"
              placeholder="Enter the funds required for initiative, if any">
          </div>
          <label class="col-2 text-center" for="">Priority
          </label>
          <div class="col-3">
            <select class="custom-select" name="ini_priority" id="ini_priority" tabindex="10" required>
              <option value="" selected disabled hidden>Please select</option>


              <option value="Top">High</option>
              <option value="Medium">Medium</option>
              <option value="Low">Low</option>


            </select>

          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Start Date
          </label>
          <div class="col-3">

            <input class="form-control datepicker" tabindex="11" id="datepicker" name="ini_start_date"
              placeholder="dd-mm-yyyy" required readonly>

            <script>
              $('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
          uiLibrary: 'bootstrap4'
      });
            </script>


          </div>
          <label class="col-2 text-center" for="">End Date
          </label>
          <div class="col-3">

            <input class="form-control datepicker" tabindex="12" id="datepickere" name="ini_end_date"
              placeholder="dd-mm-yyyy" required readonly>

            <script>
              $('#datepickere').datepicker({
      format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4'
    });
            </script>


          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Risk</label>
          <div class="col-8">
            <input type="text" class="form-control" id="ini_risk" tabindex="13" name="ini_risk"
              placeholder="Enter any anticipated risks">
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>






      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Major Activity</label>
          <div class="col-8">
            <textarea class="form-control" rows="2" name="ini_maj_acti" tabindex="14" id="ini_maj_acti"></textarea>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>







      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Comments</label>
          <div class="col-8">
            <textarea class="form-control" rows="2" name="ini_comments" tabindex="15" id="ini_comments"></textarea>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>









      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('foh.booking.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>



</section>
@endsection

<script type="text/javascript">
  function getCompanyName()
  {
  var companyID = document.getElementById("companyID").value;
  $.ajax({
  headers:{
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
  },
  method: "POST",
  url: "{{URL::to('supplierdetails')}}",
  data: {
  'id': companyID
  },
  success:function(data){
    $('#info_obj_des').val(data.info_obj_des);
    
  }
  });
  }
</script>