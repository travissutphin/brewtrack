@extends('layouts.app')

@section('content')
<main class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="display-4 mb-4">Welcome to <span class="text-red">Brew:Track</span></h1>
            <p class="lead">Stay on top of your beverage merchandising with Brew:Track the ultimate progress tracker for every brew and bottle!</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-4">Get Started</a>
        </div>
    </div>
</main>
@endsection