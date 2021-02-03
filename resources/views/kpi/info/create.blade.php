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
          <div class="col-2 text-danger">
            <label for="">OBJECTIVE</label>
          </div>
          <div class=" col-8">
            <select class="custom-select" name="id" id="id" required>
              <option value="" selected disabled hidden>Please select</option>

              @foreach($objective as $o)
              <option value="{{ $o->id}}">{{ $o->obj_desc}}</option>
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

      @php

      if (!empty($lastRecord->kpi_code))
      {
      $myStr = $lastRecord->kpi_code;
      $result = substr ($lastRecord->kpi_code, -4);
      $resultfinal = $result + 1;
      }
      else {
      $resultfinal = 1001;
      }

      @endphp

      <div class="form-group">
        <div class="row">
          <div class="col-2">
            <label for="">KPI Code</label>
          </div>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_code" name="kpi_code" value={{$resultfinal}} required
              readonly>
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <div class="col-2">
            <label for="">KPI Title</label>
          </div>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_title" name="kpi_title" required>

          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Definition</label>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_defi" name="kpi_defi"
              placeholder="Explain exactly what does this KPI mean so everyone can understand it" required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Goal
          </label>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" onkeyup="calc2()"
              placeholder="Enter the goal (objective) from the business plan (strategy) that your KPI is aligned with"
              required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Data</label>
          <div class="col-8">
            <select class="custom-select" name="kpi_data_desc" id="kpi_data_desc">
              <option value="" selected disabled hidden>Please select</option>
              <option value="Monthly">Daily</option>
              <option value="Monthly">Monthly</option>
              <option value="Quarterly">Quarterly</option>
              <option value="Half_Yearly">Half Yearly</option>
              <option value="Yearly">Yearly</option>

            </select>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Target</label>
          <div class="col-8">
            <div class="row">
              <div class="col text-center">
                <p class="text-primary font-weight-bold">Existing Figure</p>
                <div class="text-center">
                  <input type="number" class="form-control text-center" name="kpi_exist" id="kpi_exist"
                    onkeyup="calc2()" placeholder="Enter existing figure" required>
                </div>

              </div>

              <div class="col text-center">
                <p class="text-primary font-weight-bold">Level</p>
                <div class="text-center ">
                  <select class="custom-select" name="kpi_level" id="level" onkeyup="calc2()" required>
                    <option value="" selected disabled hidden>Please select</option>
                    <option value="Increase">Increase</option>
                    <option value="Decrease">Decrease</option>
                    <option value="Neutral">Neutral</option>


                  </select>
                </div>

              </div>

              <div class="col text-center">
                <p class="text-primary font-weight-bold">Target %</p>
                <div class="text-center ">
                  <input type="number" class="form-control text-center" placeholder="Enter target percentage"
                    name="kpi_tarperc" id="kpi_tarperc" onkeyup="calc2()" required>
                </div>

              </div>




              <div class="col text-center">
                <p class="text-primary font-weight-bold">Target Figure</p>
                <div class="text-center ">
                  <input type="number" class="form-control text-center" name="kpi_tar_fig" id="targetfinal"
                    onkeyup="calc2()" readonly>
                </div>

              </div>


            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row align-middle">

          <label class="col-2 align-middle" for="">Threshold</label>
          <div class="col-8 align-middle">
            <div class="row">



              <div class="col text-center mt-2">
                <p class="text-primary font-weight-bold">Range From</p>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" onkeyup="percalc()" id="kpi_per_gf"
                    name="kpi_per_gf" value="76">
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" id="kpi_per_yf" onkeyup="percalc()"
                    name="kpi_per_yf" value="50">
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" id="kpi_per_rf" name="kpi_per_rf" value="1"
                    readonly>
                </div>
              </div>
              <div class="col text-center mt-2">
                <p class="text-primary font-weight-bold">Range To</p>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_gt" readonly value="100">
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" onkeyup="percalc()" name="kpi_per_yt"
                    id="kpi_per_yt" value="75" readonly>
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_rt" id="kpi_per_rt" value="49"
                    readonly>
                </div>
              </div>

              <div class="col text-center mt-2">
                <p class="text-primary font-weight-bold">Result</p>
                <div class="text-center mt-2 border">
                  <h4 class="bg-success text-white">Green</h4>
                </div>
                <div class="text-center mt-2 border">

                  <h4 class="bg-warning text-white">Yellow</h4>
                </div>
                <div class="text-center mt-2 border">

                  <h4 class="bg-danger text-white">Red</h4>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Owner</label>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_owner" name="kpi_owner" placeholder="Enter owner name"
              required>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>












      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Comments</label>
          <div class="col-8">
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