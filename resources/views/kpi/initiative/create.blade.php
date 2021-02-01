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
        <h1 class="m-0 text-dark">KPI Documentation Form</h1>
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
      action="{{ route('kpi.info.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


      <div class="form-group">
        <div class="row">
          <div class="col-1 text-danger">
            <label for="">OBJECTIVE</label>
          </div>
          <div class=" col-9">
            <select class="custom-select" name="id" id="id" required>
              <option value="" selected disabled hidden>Please select</option>

              @foreach($info as $o)
              <option value="{{ $o->id}}">{{ $o->info_obj_des}}</option>
              @endforeach

            </select>

            <input type="hidden" id="obj_desc" name="obj_desc">

            <script>
              $('#id').on('change', function() 
                                           {
                                             var selectedName = $('#id option:selected').text();
                                            $('#obj_desc').val(selectedName);
                                                      }
                                            )
            </script>
          </div>
        </div>
      </div>








      <div class="form-group">
        <div class="row">
          <div class="col-1">
            <label for="">KPI Title</label>
          </div>
          <div class="col-9">
            <input type="text" class="form-control" id="kpi_title" name="kpi_title"
              placeholder="Enter your UNIT/DEPARTMENT KPI" required>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Initiative Code</label>
          <div class="col-9">
            <input type="text" class="form-control" id="kpi_defi" name="kpi_defi"
              placeholder="Explain exactly what does this KPI mean so everyone can understand it" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Description
          </label>
          <div class="col-9">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Scope
          </label>
          <div class="col-9">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Measurement
          </label>
          <div class="col-9">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Current Result
          </label>
          <div class="col-4">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
          </div>
          <label class="col-1" for="">Owner
          </label>
          <div class="col-4">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
          </div>

        </div>
      </div>




      <div class="form-group">
        <div class="row">

          <label class="col-1" for="">Budget
          </label>
          <div class="col-4">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
          </div>
          <label class="col-1" for="">Priority
          </label>
          <div class="col-4">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Start Date
          </label>
          <div class="col-4">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
          </div>
          <label class="col-1" for="">End Date
          </label>
          <div class="col-4">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Risk</label>
          <div class="col-9">
            <input type="text" class="form-control" id="kpi_owner" name="kpi_owner" placeholder="Enter owner name"
              required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>












      <div class="form-group">
        <div class="row">
          <label class="col-1" for="">Comments</label>
          <div class="col-9">
            <textarea class="form-control" rows="2" name="kpi_comments" id="kpi_comments"></textarea>
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