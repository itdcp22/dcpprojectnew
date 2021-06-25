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










<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Email Trigger</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{route('mall.utility.index')}}">Electricity</a></li>
                    <li class="breadcrumb-item"><a href="{{route('cwater')}}">Chilled Water</a></li>



                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">



        <p> I have verified all the entries in the system and acknowledge that its all correct. I am aware clicking the
            below
            "Send Email" button will send automatic email to all the registred users.

            <div class="form-group">

                <a href="{{route('utility_email_trigger')}}" class="btn btn-warning" role="button">Send Email</a>
            </div>

    </div>
</section>
@endsection