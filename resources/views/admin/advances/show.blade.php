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
                    <li class="breadcrumb-item"><a href="{{route('admin.advances.index')}}">Unpaid Bills</a></li>


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
            <h2 class="m-0 text-dark text-center">{{ $advance->ca_comp_name}}</h2>
            <h4 class="m-0 text-dark text-center">Advance Request</h4>
        </div>
        <div class="col text-center">
            @if($advance->ca_comp_code =='92')
            <img src={{asset('dist/img/printmall.png')}}>
            @elseif($advance->ca_comp_code =='34')
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
                    <label class="col" for="">Name</label>
                    <div class="col">
                        <input class="form-control" id="datepicker" name="name" value="{{$advance->ca_emp_name}}"
                            readonly>
                    </div>



                    <label class="col" for=""> </label>
                    <div class="col">

                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <label class="col" for="">Date </label>
                        <div class="col">
                            <input class="form-control" id="datepicker" name="bill_date"
                                value="{{ date('d-m-Y', strtotime($advance->ca_adv_date))}}" readonly>
                        </div>



                        <label class="col" for=""> </label>
                        <div class="col">


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col" for="">Amount </label>
                            <div class="col">
                                <input class="form-control" id="datepicker" name="bill_date"
                                    value="{{ $advance->ca_adv_amt}}" readonly>
                            </div>



                            <label class="col" for=""> </label>
                            <div class="col">


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col" for="">Reason </label>
                                <div class="col">


                                    <textarea class="form-control" name="wp_description" rows="3" id="comment"
                                        placeholder="Enter work description in detail"
                                        readonly>{{$advance->ca_purpose}}</textarea>


                                </div>



                                <label class="col" for=""> </label>
                                <div class="col">


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col" for="">Approved By: </label>
                                    <div class="col">
                                        <input class="form-control" id="datepicker" name="bill_date" value="" readonly>
                                    </div>



                                    <label class="col" for=""> </label>
                                    <div class="col">


                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col" for="">Cash Received By: </label>
                                        <div class="col">
                                            <input class="form-control" id="datepicker" name="bill_date" value=""
                                                readonly>
                                        </div>



                                        <label class="col" for=""> </label>
                                        <div class="col">


                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col" for="">Receiver Signature: </label>
                                            <div class="col">
                                                <input class="form-control" id="datepicker" name="bill_date" value=""
                                                    readonly>
                                            </div>



                                            <label class="col" for=""> </label>
                                            <div class="col">


                                            </div>
                                        </div>












                                         






                                        <div class="form-group">



                                            <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>




                                        </div>



        </form>
    </div>



</section>
@endsection