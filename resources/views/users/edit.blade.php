<form class="needs-validation" name="myform" id="myform" novalidate method="post"
    action="{{ route('users.update',$usernew->id) }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @method('PUT')



    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-sign-in"></i>Update
    </button>
</form>