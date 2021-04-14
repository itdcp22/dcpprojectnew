@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Purchase Request</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('mallwp')}}">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="{{route('procurement.purchaserequest.index')}}">Purchase
                            Request</a></li>


                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header   -->

<script>
    function calc1() 
        {
    
    
        var textValue1 = document.getElementById('pri_qty1[]').value;
        var textValue2 = document.getElementById('pri_price1[]').value;
        var line1 = textValue1 * textValue2;
        document.getElementById('amount1[]').value = line1.toFixed(3);   

        
       
    
           
        }   
    

        function calc2() 
        {
    
    


        var textValue3 = document.getElementById('pri_qty2[]').value;
        var textValue4 = document.getElementById('pri_price2[]').value;
        var line2 = textValue3 * textValue4;
        document.getElementById('amount2[]').value = line2.toFixed(3);       
    
           
        } 

        
        function calc3() 
        {
    
    


        var textValue5 = document.getElementById('pri_qty3[]').value;
        var textValue6 = document.getElementById('pri_price3[]').value;
        var line3 = textValue5 * textValue6;
        document.getElementById('amount3[]').value = line3.toFixed(3);       
    
           
        } 

              
        function calc4() 
        {
    
    


        var textValue7 = document.getElementById('pri_qty4[]').value;
        var textValue8 = document.getElementById('pri_price4[]').value;
        var line4 = textValue7 * textValue8;
        document.getElementById('amount4[]').value = line4.toFixed(3);       
    
           
        } 

        function calc5() 
        {
    
    


        var textValue9 = document.getElementById('pri_qty5[]').value;
        var textValue10 = document.getElementById('pri_price5[]').value;
        var line5 = textValue9 * textValue10;
        document.getElementById('amount5[]').value = line5.toFixed(3);       
    
           
        } 

        function calc6() 
        {
    
    


        var textValue11 = document.getElementById('pri_qty[]').value;
        var textValue12 = document.getElementById('pri_price[]').value;
        var line6 = textValue11 * textValue12;
        document.getElementById('amount[]').value = line6.toFixed(3);       
    
           
        } 


</script>




<section class="content">
    <div class="container-fluid">





        <form class="needs-validation" name="myform" id="myform" novalidate method="post"
            action="{{ route('addmorePost') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">



            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif



            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1" for="">Name</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="validationCustom02" name="wp_applicant"
                            value="{{ $user->name}}" placeholder="Enter name of applicant" tabindex="1" required>
                    </div>
                    <label class="col-lg-1" for="">:اسم مقدم الطلب</label>
                    <label class="col-lg-1" for="">Designation</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="wp_designation" name="wp_designation"
                            value="{{ $user->dept}}" placeholder="Enter designation" tabindex="2" required>
                    </div>
                    <label class="col-lg-1" for="">:الوظيفة</label>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1" for="">Mobile</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="wp_mobile" name="wp_mobile"
                            placeholder="Enter mobile number" value="{{ $user->mobile}}" tabindex="3" required>
                    </div>
                    <label class="col-lg-1" for="">:رقم الهاتف</label>
                    <label class="col-lg-1" for="">Email</label>
                    <div class="col-lg-4">
                        <input type="email" class="form-control" id="wp_email" name="wp_email"
                            placeholder="Enter email address" value="{{ $user->email}}" tabindex="4" required>
                    </div>
                    <label class="col-lg-1" for="">:بريد</label>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1" for="">Company</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="wp_comp_name" name="wp_comp_name"
                            value="{{ $tenant->tm_name}}" placeholder="Enter company name" readonly>
                    </div>
                    <label class="col-lg-1" for="">:الشركة</label>
                    <label class="col-lg-1" for="">Brand</label>
                    <div class="col-lg-4">
                        <select class="custom-select" name="wp_brand_name" id="wp_brand_name" tabindex="5" required>
                            <option value="" selected disabled hidden>Please select</option>
                            @foreach($brand as $c)
                            <option value="{{ $c->bm_name}}">{{ $c->bm_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-lg-1" for="">:علامة تجارية
                    </label>
                </div>
            </div>


            <table class="table table-bordered" id="dynamicTable">
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addmore[0][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_qty]" onkeyup="calc1()" id="pri_qty1[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_price]" onkeyup="calc1()" id="pri_price1[]"
                            class="form-control" />
                    </td>

                    <td><input type="text" name="addmore[0][pri_amount]" id="amount1[]" class="form-control" readonly />
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[1][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[1][pri_qty]" onkeyup="calc2()" id="pri_qty2[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[1][pri_price]" onkeyup="calc2()" id="pri_price2[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_amount]" id="amount2[]" class="form-control" readonly />
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[2][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[2][pri_qty]" onkeyup="calc3()" id="pri_qty3[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[2][pri_price]" onkeyup="calc3()" id="pri_price3[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_amount]" id="amount3[]" class="form-control" readonly />
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[3][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[3][pri_qty]" onkeyup="calc4()" id="pri_qty4[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[3][pri_price]" onkeyup="calc4()" id="pri_price4[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_amount]" id="amount4[]" class="form-control" readonly />
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[4][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[4][pri_qty]" onkeyup="calc5()" id="pri_qty5[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[4][pri_price]" onkeyup="calc5()" id="pri_price5[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_amount]" id="amount5[]" class="form-control" readonly />
                    </td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>


            </table>


            <div class="form-group">
                <p class="bg-warning text-white"><strong>Justification</strong>
                    <textarea class="form-control" name="wp_description" rows="3" id="wp_description"
                        placeholder="Enter justification" tabindex="10" value="{{ old('wp_description') }}"
                        required></textarea>
                </p>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <script type="text/javascript">
        var i = 4;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][pri_item]"  class="form-control" /></td><td><input type="text" name="addmore['+i+'][pri_qty]"  onkeyup="calc6()" id="pri_qty[]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][pri_price]" onkeyup="calc6()" id="pri_price[]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][pri_amount]" id="amount[]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
    </script>




</section>
@endsection