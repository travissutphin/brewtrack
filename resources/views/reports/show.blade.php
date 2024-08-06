@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Report Details for Store: {{ $store->name }}</h1>

        <table class="table">
            <tbody>
				<tr>
					<th>Status</th>
					<td>{{ ucfirst($report->status) }}</td>
				</tr>
				<tr>
                    <th>SKU/UPS</th>
                    <td>{{ $report->sku }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $report->name }}</td>
                </tr>
                <tr>
                    <th>Shelf Position</th>
                    <td>{{ $report->shelf_position }}</td>
                </tr>
                <tr>
                    <th>Facing</th>
                    <td>{{ $report->facing }}</td>
                </tr>
                <tr>
                    <th>Stock Level</th>
                    <td>{{ $report->stock_level }}</td>
                </tr>
                <tr>
                    <th>Out of Stock</th>
                    <td>{{ $report->out_of_stock ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Price Accuracy</th>
                    <td>{{ $report->price_accuracy ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{ $report->user_id }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('stores.reports.index', $store) }}" class="btn btn-primary">Back to Reports</a>
    </div>
@endsection