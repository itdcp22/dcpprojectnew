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
      action="{{ route('kpi.info.update',$info->id) }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      @method('PUT')


      <div class="form-group">
        <div class="row">
          <div class="col-2 text-danger">
            <label for="">OBJECTIVE</label>
          </div>
          <div class=" col-8">


            <input type="text" class="form-control" id="info_obj_des" name="info_obj_des"
              value="{{ $info->info_obj_des}}" placeholder="Enter your UNIT/DEPARTMENT KPI" readonly>



          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <div class="col-2">
            <label for="">KPI Code</label>
          </div>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_code" name="kpi_code" value="{{ $info->kpi_code}}"
              placeholder="Enter KPI Code Ex- KPI/AJG/OA/FOH/001 Or KPI/AJG/MOM/OPS/001" readonly required>
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="row">
          <div class="col-2">
            <label for="">KPI Title</label>
          </div>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_title" name="kpi_title" value="{{ $info->kpi_title}}"
              placeholder="Enter your UNIT/DEPARTMENT KPI" required>
          </div>
        </div>
      </div>



      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Definition</label>
          <div class="col-8">
            <input type="text" class="form-control" id="kpi_defi" name="kpi_defi" value="{{ $info->kpi_defi}}"
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
            <input type="text" class="form-control" id="kpi_goal" name="kpi_goal" value="{{ $info->kpi_goal}}"
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

            <input type="text" class="form-control text-left" name="kpi_data_desc" id="kpi_data_desc"
              value="{{ $info->kpi_data_desc}}" placeholder="Enter existing figure" readonly>



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
                  <input type="text" class="form-control text-center" name="kpi_exist" id="kpi_exist"
                    value="{{ number_format($info->kpi_exist)}}" placeholder="Enter existing figure" readonly>
                </div>

              </div>

              <div class="col text-center">
                <p class="text-primary font-weight-bold">Level</p>
                <div class="text-center ">
                  <input type="text" class="form-control text-center" name="kpi_level" id="kpi_level"
                    value="{{ $info->kpi_level}}" onkeyup="calc2()" placeholder="Enter existing figure" readonly>
                </div>

              </div>

              <div class="col text-center">
                <p class="text-primary font-weight-bold">Target %</p>
                <div class="text-center ">
                  <input type="text" class="form-control text-center" placeholder="Enter target percentage"
                    value="{{ number_format($info->kpi_tarperc,0)}}" name="kpi_tarperc" id="kpi_tarperc"
                    onkeyup="calc2()" readonly>
                </div>

              </div>




              <div class="col text-center">
                <p class="text-primary font-weight-bold">Target Figure</p>
                <div class="text-center ">
                  <input type="number" class="form-control text-center" name="kpi_tar_fig" id="targetfinal"
                    value="{{ $info->kpi_tar_fig}}" onkeyup="calc2()" readonly>
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
                <p class="text-primary font-weight-bold">Percentage From</p>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" id="kpi_per_gf" name="kpi_per_gf"
                    value="{{ number_format($info->kpi_per_gf,0)}}" readonly>
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" id="kpi_per_yf" name="kpi_per_yf"
                    value="{{ number_format($info->kpi_per_yf,0)}}" readonly>
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" id="kpi_per_rf" name="kpi_per_rf"
                    value="{{ number_format($info->kpi_per_rf,0)}}" readonly>
                </div>
              </div>
              <div class="col text-center mt-2">
                <p class="text-primary font-weight-bold">Percentage To</p>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_gt" readonly
                    value="{{ number_format($info->kpi_per_gt,0)}}">
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_yt"
                    value="{{ number_format($info->kpi_per_yt,0)}}" readonly>
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_rt"
                    value="{{ number_format($info->kpi_per_rt,0)}}" readonly>
                </div>
              </div>

              <div class="col text-center mt-2">
                <p class="text-primary font-weight-bold">Value From</p>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_gt" readonly
                    value="{{ number_format($info->kpi_range_gf,0) }}">
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_yt"
                    value="{{ number_format($info->kpi_range_yf,0)}}" readonly>
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_rt"
                    value="{{ number_format($info->kpi_range_rf,0)}}" readonly>
                </div>
              </div>

              <div class="col text-center mt-2">
                <p class="text-primary font-weight-bold">Value To</p>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_gt" readonly
                    value="{{ number_format($info->kpi_range_gt,0)}}">
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_yt"
                    value="{{ number_format($info->kpi_range_yt,0)}}" readonly>
                </div>
                <div class="text-center mt-2">
                  <input type="text" class="form-control text-center" name="kpi_per_rt"
                    value="{{ number_format($info->kpi_range_rt,0)}}" readonly>
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
              value="{{ $info->kpi_owner}}" required>
            <div class=" clear-fix"></div>
          </div>
        </div>
      </div>












      <div class="form-group">
        <div class="row">
          <label class="col-2" for="">Comments</label>
          <div class="col-8">
            <textarea class="form-control" rows="2" name="kpi_comments"
              id="kpi_comments">{{ $info->kpi_comments}}</textarea>
            <div class="clear-fix"></div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          @if($info->kpi_data_desc =='Monthly')
          <label class="col-2" for="">Month</label>
          <div class="col-3">
            <select class="custom-select" name="month" id="month">
              <option value="" selected disabled hidden>Please select</option>
              <option value="121">January</option>
              <option value="221">February</option>
              <option value="321">March</option>
              <option value="421">April</option>
              <option value="521">May</option>
              <option value="621">June</option>
              <option value="721">July</option>
              <option value="821">Auguest</option>
              <option value="921">September</option>
              <option value="1021">October</option>
              <option value="1121">November</option>
              <option value="1221">December</option>
            </select>
          </div>
          @elseif($info->kpi_data_desc =='Quarterly')
          <label class="col-2" for="">Quarter</label>
          <div class="col-3">
            <select class="custom-select" name="quarter" id="quarter">
              <option value="" selected disabled hidden>Please select</option>
              <option value="q121">First Quarter</option>
              <option value="q221">Second Quarter</option>
              <option value="q321">Third Quarter</option>
              <option value="q421">Fourth Quarter</option>

            </select>
          </div>
          @endif


          <label class="col-2" for="">Actual</label>
          <div class="col-3">
            <input type="number" class="form-control" id="actual" name="actual" placeholder="Enter actual figure"
              required>
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