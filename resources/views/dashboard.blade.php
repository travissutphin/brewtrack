@extends('layouts.app')

@section('content')
<main class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::user()->name }}!</p>
					
					@if (Auth::user()->isSuperAdmin())
						<div>
							<!-- Content only visible to admin users -->
							<h1>Super Admin Dashboard</h1>
							<!-- ... -->
						</div>					
					@elseif (Auth::user()->isAdmin())
						<div>
							<!-- Content only visible to admin users -->
							<h1>Admin Dashboard</h1>
							<div class="container">
							  <div class="row">
								<div class="col-md-3 mb-3">
									<div class="card text-white card-background-light">
										<div class="card-header card-background-dark"><h5>Users</h5></div>
										<div class="card-body">
											<p class="card-text"></p>
											<a href="{{ route('users.index') }}" class="btn btn-dark">Manage Users</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<div class="card text-white card-background-light">
										<div class="card-header card-background-dark"><h5>{{ $storeCount }} Stores</h5></div>
										<div class="card-body">
											<p class="card-text"></p>
											<a href="{{ route('stores.index') }}" class="btn btn-dark">Manage Stores</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 mb-3">
								  <div class="card text-white card-background-light">
									<div class="card-header card-background-dark">Products</div>
									<div class="card-body">
									  <h5 class="card-title">Danger card title</h5>
									  <p class="card-text">SKU/UPS : Name : Shelf Position : Facing : Stock Level : Out of Stock : Price Accuracy</p>
									</div>
								  </div>
								</div>
								<div class="col-md-3 mb-3">
								  <div class="card text-white card-background-light">
									<div class="card-header card-background-dark">Issur Tracking</div>
									<div class="card-body">
									  <h5 class="card-title">Danger card title</h5>
									  <p class="card-text">Issue Found : Photo</p>
									</div>
								  </div>
								</div>
								
							  </div>
							</div>
						</div>
					@else
						<div>
							<!-- Content only visible to regular users -->
							<h1>User Dashboard</h1>
							<!-- ... -->
						</div>
					@endif	
                </div>
            </div>
        </div>
    </div>
</main>
@endsection