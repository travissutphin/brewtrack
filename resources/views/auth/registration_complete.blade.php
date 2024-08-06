@extends('layouts.app')

@section('content')
<main class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card bg-dark text-white">
                <div class="card-header">{{ __('Registration Complete') }}</div>

                <div class="card-body">
                    <p>Thank you for registering! Please check your email to verify your account.</p>
                    <p>If you didn't receive the verification email, please click the button below to resend it.</p>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection