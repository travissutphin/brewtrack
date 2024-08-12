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



@php
$todos = [
    [
        'id' => 1,
        'headline' => 'User profile',
        'details' => 'Show User uploaded profile pic',
        'completed' => false,
    ],
    [
        'id' => 2,
        'headline' => 'View User',
        'details' => 'see all stores the user has created reports for',
        'completed' => false,
    ],
    [
        'id' => 3,
        'headline' => 'Store Reports CRUD',
        'details' => 'implement finalized report details to be colletec at each store',
        'completed' => false,
    ],
    [
        'id' => 4,
        'headline' => 'Store Report - feature',
        'details' => 'integrate checkin - checkout times for user',
        'completed' => false,
    ],
    [
        'id' => 5,
        'headline' => 'Store Report - feature',
        'details' => 'calculate times for store visits',
        'completed' => false,
    ],
];
@endphp

<div class="container mt-5">
    <h2 class="mb-4">Project To-Do List</h2>
    <div class="row">
        @foreach($todos as $todo)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="todo-{{ $todo['id'] }}" {{ $todo['completed'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="todo-{{ $todo['id'] }}">
                                <h5 class="card-title mb-2 {{ $todo['completed'] ? 'text-decoration-line-through' : '' }}">{{ $todo['headline'] }}</h5>
                            </label>
                        </div>
                        <p class="card-text {{ $todo['completed'] ? 'text-decoration-line-through' : '' }}">{{ $todo['details'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





@endsection