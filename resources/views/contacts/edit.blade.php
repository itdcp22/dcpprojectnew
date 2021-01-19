@extends('layouts.adminwp')
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="display-5">Approve Tenant</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $contact->name }} readonly />
            </div>

            <div class="form-group">
                <label for="last_name">Mobile:</label>
                <input type="text" class="form-control" name="mobile" value={{ $contact->mobile }} readonly />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $contact->email }} readonly />
            </div>

            <div class="form-group">
                <label for="country">Brand</label>
                <input type="text" class="form-control" name="brand_name" value={{ $contact->brand_name }} readonly />
            </div>

            <div class="form-group">
                <label for="country">User Type</label>

                <select class="custom-select" name="user_type" id="user_type" required>
                    <option value="" selected disabled hidden>Please select</option>


                    <option value="tenant">Tenant</option>
                    <option value="user">User</option>
                    <option value="mall">Mall</option>
                    <option value="admin">Admin</option>


                </select>



            </div>

            <button type="submit" class="btn btn-primary">Approve</button>
            <a href="{{route('contacts.index')}}" class="btn btn-warning" role="button">Cancel</a>
        </form>
    </div>
</div>
@endsection