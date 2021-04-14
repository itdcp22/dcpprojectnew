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
    
    
        var textValue1 = document.getElementById('pri_qty[]').value;
        var textValue2 = document.getElementById('pri_price[]').value;
        var line1 = textValue1 * textValue2;
        document.getElementById('amount[]').value = line1.toFixed(3);   

        var textValue3 = document.getElementById('pri_qty[]').value;
        var textValue4 = document.getElementById('pri_price[]').value;
        var line1 = textValue1 * textValue2;
        document.getElementById('amount[]').value = line1.toFixed(3);  
    
       
    
           
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

                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addmore[0][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_qty]" onkeyup="calc1()" id="pri_qty[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[0][pri_price]" onkeyup="calc1()" id="pri_price[]"
                            class="form-control" />
                    </td>



                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[1][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[1][pri_qty]" onkeyup="calc1()" id="pri_qty[]"
                            class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[1][pri_price]" onkeyup="calc1()" id="pri_price[]"
                            class="form-control" />
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[2][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[2][pri_qty]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[2][pri_price]" class="form-control" />
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[3][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[3][pri_qty]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[3][pri_price]" class="form-control" />
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="addmore[4][pri_item]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[4][pri_qty]" class="form-control" />
                    </td>
                    <td><input type="text" name="addmore[4][pri_price]" class="form-control" />
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
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][pri_item]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][pri_qty]"  class="form-control" /></td><td><input type="text" name="addmore['+i+'][pri_price]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
    </script>




</section>
@endsection