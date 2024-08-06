@extends('layouts.app')

@section('title', 'Users')

@section('content')
<style>
    .avatar {
      width: 75px;
      height: 75px;
      border-radius: 50%;
      position: absolute;
      top: -15px;
      right: -15px;
      border: 2px solid #fff; /* Optional: white border around the avatar */
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Optional: subtle shadow */
    }
    .card {
      position: relative;
      padding-top: 30px; /* To provide space for the avatar */
    }
  </style>
    <div class="container">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

		<div class="row align-items-center mt-3">
		  <div class="col">
			<h1>Users</h1>
		  </div>
		  <div class="col-auto ms-auto">
			<a href="{{ route('users.create') }}" class="btn btn-primary mb-3"><i class="bi bi-person-plus"></i> Create User</a>
		  </div>
		</div>
		
		<div class="row">
			@foreach ($users as $user)
				<div class="col-md-4 mb-4">
					<div class="card card-outline-red">
					<img src="http://127.0.0.1:8000/thoriumCMS/public/images-core/avatar.jpg" alt="Avatar" class="avatar">
						<div class="card-body">
							<h5 class="card-title text-white">{{ $user->name }}</h5>
							<p class="card-text text-white">
								<strong>Email:</strong> {{ $user->email }}<br>
								<strong>Created:</strong> {{ $user->created_at->format('m/d/Y H:i:s') }}<br>
							</p>
							<div class="d-flex justify-content-between">
								<a href="{{ route('users.show', $user) }}" class="btn btn-primary btn-sm"><i class="bi bi-zoom-in"></i> View</a>
								<a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
								<form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this user?')"><i class="bi bi-x-circle"></i> Delete</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>    
		
	</div>
@endsection