@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Waiting for approval') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('You have successfully submitted the account opening request.') }}
                    {{ __('We will send you the confirmation email once it is approved by our team') }}.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection