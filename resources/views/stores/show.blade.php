@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row align-items-center mt-3">
            <div class="col">
                <h1>Store Details</h1>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('stores.reports.create', $store) }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Create New Report</a>
                <a href="{{ route('stores.index') }}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Back to Stores</a>
                <a href="{{ route('stores.reports.index', $store) }}" class="btn btn-primary mb-3"><i class="bi bi-list"></i> View Reports</a>
            </div>
        </div>

        <hr class="border border-danger border-2">

        <div class="row">
            <div class="col-md-6 mb-6">
                <div class="card card-outline-red">
                    <div class="card-body text-white">
                        <h3 class="card-title text-white">{{ $store->store_name }}</h3>
                        <p class="card-text"><strong>Address:</strong> {{ $store->store_address }}</p>
                        <p class="card-text"><strong>City:</strong> {{ $store->store_city }}</p>
                        <p class="card-text"><strong>State:</strong> {{ $store->store_state }}</p>
                        <p class="card-text"><strong>Zip:</strong> {{ $store->store_zip }}</p>
                        <p class="card-text"><strong>Longitude:</strong> {{ $store->store_longitude }}</p>
                        <p class="card-text"><strong>Latitude:</strong> {{ $store->store_latitude }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-6">
                <div class="card card-outline-red">
                    <div class="card-body text-white">
                        <h5 class="card-title text-white">Average Time Last Week: </h5>
                        <h5 class="card-title text-white">Average Time Last Month: </h5>
                        <h5 class="card-title text-white">Average Time Lifetime: </h5>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border border-danger border-2">

        <h2 class="mt-4">Last 9 Reports</h2>

        <div class="row">
            @foreach ($store->reports()->latest()->take(9)->get() as $report)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header card-background-dark text-black">
                            <h5 class="mb-0">{{ $report->name }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text"><strong>Status:</strong> {{ ucfirst($report->status) }}</p>
                                    <p class="card-text"><strong>SKU/UPS:</strong> {{ $report->sku }}</p>
                                    <p class="card-text"><strong>Shelf Position:</strong> {{ $report->shelf_position }}</p>
                                    <p class="card-text"><strong>Facing:</strong> {{ $report->facing }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text"><strong>Stock Level:</strong> {{ $report->stock_level }}</p>
                                    <p class="card-text"><strong>Out of Stock:</strong> {{ $report->out_of_stock ? 'Yes' : 'No' }}</p>
                                    <p class="card-text"><strong>Price Accuracy:</strong> {{ $report->price_accuracy ? 'Yes' : 'No' }}</p>
                                    <p class="card-text"><strong>By:</strong> {{ $report->user->name }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <a href="{{ route('stores.reports.edit', [$store, $report]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this report?')"><i class="bi bi-x-circle"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('stores.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Back to Stores</a>

        <hr class="border border-danger border-2">
        <hr class="border border-danger border-2">
        <hr class="border border-danger border-2">

        <h2>Reports</h2>
        <div class="col-md-4 mb-4">
            <div class="card card-outline-red">
                <div class="card-body">
                    <h5 class="card-title text-white"></h5>
                    <p class="card-text text-white">
                        <strong>Date Completed:</strong> <br>
                        <strong>Start Time:</strong> <br>
                        <strong>End Time:</strong> <br>
                        <strong>Total Time</strong> <br>
                        <strong>Completed by:</strong>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('stores.reports.index', $store) }}" class="btn btn-primary btn-sm"><i class="bi bi-list"></i> View Reports</a>
                        <a href="" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="" method="POST" class="d-inline mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this report?')"><i class="bi bi-x-circle"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection