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
                    <th>Manager Notes</th>
                    <td>{{ $report->notes_manager }}</td>
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
                    <th>Check In</th>
                    <td>{{ $report->check_in }}</td>
                </tr>
                <tr>
                    <th>Check Out</th>
                    <td>{{ $report->check_out }}</td>
                </tr>
				<tr>
                    <th>User ID</th>
                    <td>{{ $report->user->name }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('stores.reports.index', $store) }}" class="btn btn-primary">Back to Reports</a>
    </div>
@endsection