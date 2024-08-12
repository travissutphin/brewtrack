@extends('layouts.app')

@section('title', 'Stores')

@section('content')

    <div class="container">
		@if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

		<div class="row align-items-center mt-3">
		  <div class="col">
			<h1>Stores</h1>
		  </div>
		  <div class="col-auto ms-auto">
			<a href="{{ route('stores.create') }}" class="btn btn-primary mb-3"><i class="bi bi-person-plus"></i> Create Store</a>
		  </div>
		</div> 

		<div class="row">
			@foreach ($stores as $store)
				<div class="col-md-4 mb-4">
					<div class="card card-outline-red">
						<div class="card-body">
							<h5 class="card-title text-white">{{ $store->store_name }}</h5>
							<p class="card-text text-white">Average Report Time: {{ $store->averageReportTime ?? 'N/A' }}</p>
							<p class="card-text text-white">
								<strong>Address:</strong> {{ $store->store_address }}<br>
								<strong>City:</strong> {{ $store->store_city }}<br>
								<strong>State:</strong> {{ $store->store_state }}<br>
								<strong>Zip:</strong> {{ $store->store_zip }}
							</p>
							<div class="d-flex justify-content-between">
								<a href="{{ route('stores.show', $store) }}" class="btn btn-primary btn-sm"><i class="bi bi-zoom-in"></i> View</a>
								<a href="{{ route('stores.edit', $store) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
								<form action="{{ route('stores.destroy', $store) }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this store?')"><i class="bi bi-x-circle"></i> Delete</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>    
    </div>
@endsection