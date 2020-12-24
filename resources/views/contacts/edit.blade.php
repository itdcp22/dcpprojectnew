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
                <label for="country">Company</label>
                <input type="text" class="form-control" name="company" value={{ $contact->company }} readonly />
            </div>

            <button type="submit" class="btn btn-primary">Approve</button>
            <a href="{{route('contacts.index')}}" class="btn btn-warning" role="button">Cancel</a>
        </form>
    </div>
</div>
@endsection