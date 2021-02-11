@extends('layouts.adminwp')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <!-- /.card-header -->

                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title">Notice</h4>


                </div>
                <!-- /.card-header -->
                <div class="card-body text-left">
                    <h4> Dear Valued Tenant, <h1></h1>

                    </h4>

                    <h4> Kindly note that the online work permit system functions
                        between
                        9.00 AM to 4.00 PM, Saturday to Thursday. <h1></h1>
                    </h4>

                    <h4> Please come back during the system working hours and apply for your work permit.<h1></h1>
                    </h4>

                    <h4> Thank you for your understanding and cooperation.<h1></h1>
                    </h4>

                    <h4> Regards,<h1></h1>
                    </h4>
                    <h4> Mall of Muscat Operations Department<h1></h1>
                    </h4>



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>



<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-left" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{route('mall.workpermit.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-left">
                        Are you sure you want to delete this transaction?
                    </p>
                    <input type="hidden" name="category_id" id="cat_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection