@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Report for Store: {{ $store->name }}</h1>

        <form action="{{ route('stores.reports.update', [$store, $report]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="sku">SKU/UPS</label>
                <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $report->sku) }}" required>
                @error('sku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $report->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="shelf_position">Shelf Position</label>
                <input type="text" name="shelf_position" id="shelf_position" class="form-control @error('shelf_position') is-invalid @enderror" value="{{ old('shelf_position', $report->shelf_position) }}" required>
                @error('shelf_position')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="facing">Facing</label>
                <input type="number" name="facing" id="facing" class="form-control @error('facing') is-invalid @enderror" value="{{ old('facing', $report->facing) }}" required>
                @error('facing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock_level">Stock Level</label>
                <input type="number" name="stock_level" id="stock_level" class="form-control @error('stock_level') is-invalid @enderror" value="{{ old('stock_level', $report->stock_level) }}" required>
                @error('stock_level')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="out_of_stock" id="out_of_stock" class="form-check-input @error('out_of_stock') is-invalid @enderror" {{ old('out_of_stock', $report->out_of_stock) ? 'checked' : '' }}>
                    <label for="out_of_stock" class="form-check-label">Out of Stock</label>
                    @error('out_of_stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="price_accuracy" id="price_accuracy" class="form-check-input @error('price_accuracy') is-invalid @enderror" {{ old('price_accuracy', $report->price_accuracy) ? 'checked' : '' }}>
                    <label for="price_accuracy" class="form-check-label">Price Accuracy</label>
                    @error('price_accuracy')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <button type="submit" class="btn btn-primary">Update Report</button>
        </form>
    </div>
@endsection