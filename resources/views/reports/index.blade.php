@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reports for Store: {{ $store->name }}</h1>

        <a href="{{ route('stores.reports.create', $store) }}" class="btn btn-primary mb-3">Create New Report</a>

        <table class="table">
            <thead>
                <tr>
                    <th>SKU/UPS</th>
                    <th>Name</th>
                    <th>Shelf Position</th>
                    <th>Facing</th>
                    <th>Stock Level</th>
                    <th>Out of Stock</th>
                    <th>Price Accuracy</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->sku }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->shelf_position }}</td>
                        <td>{{ $report->facing }}</td>
                        <td>{{ $report->stock_level }}</td>
                        <td>{{ $report->out_of_stock ? 'Yes' : 'No' }}</td>
                        <td>{{ $report->price_accuracy ? 'Yes' : 'No' }}</td>
                        <td>{{ $report->user_id }}</td>
                        <td>
                            <a href="{{ route('stores.reports.show', [$store, $report]) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('stores.reports.edit', [$store, $report]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('stores.reports.destroy', [$store, $report]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection