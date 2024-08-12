<?php /* URI: //stores/x/reports/ */  ?>
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
            <h1>All Reports: {{ $store->store_name }}</h1>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('stores.reports.create', $store) }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Create New Report</a>
            <a href="{{ route('stores.show', $store) }}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Back to Store</a>
        </div>
    </div>

    <hr class="border border-danger border-2">

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card card-outline-red">
                <div class="card-body text-white">
                    <h3 class="card-title text-white">Store Details</h3>
                    <p class="card-text"><strong>Name:</strong> {{ $store->store_name }}</p>
                    <p class="card-text"><strong>Address:</strong> {{ $store->store_address }}, {{ $store->store_city }}, {{ $store->store_state }} {{ $store->store_zip }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($reports as $report)
			<div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header card-background-dark text-black">
                        <h5 class="mb-0">{{ $report->created_at->format('M/d/Y h:i A') }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Status:</strong> {{ ucfirst($report->status) }}</p>
						<p class="card-text"><strong>Merchandiser:</strong> {{ $report->user->name }}</p>
                        <p class="card-text"><strong>Check In:</strong> {{ $report->check_in ? $report->check_in->format('M d, Y - h:i A') : '' }}</p>
						<p class="card-text"><strong>Check In:</strong> {{ $report->check_out ? $report->check_out->format('M d, Y - h:i A') : '' }}</p>
                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{ route('stores.reports.show', [$store, $report]) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> View</a>
                            <a href="{{ route('stores.reports.edit', [$store, $report]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <form action="{{ route('stores.reports.destroy', [$store, $report]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this report?')"><i class="bi bi-x-circle"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No reports found for this store.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $reports->links() }}
    </div>
</div>
@endsection