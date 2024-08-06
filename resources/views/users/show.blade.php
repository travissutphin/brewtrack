@extends('layouts.app')

@section('content')
    <h1>User Details</h1>

    <div class="mb-3">
        <label>Name:</label>
        <p>{{ $user->name }}</p>
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <p>{{ $user->email }}</p>
    </div>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
@endsection