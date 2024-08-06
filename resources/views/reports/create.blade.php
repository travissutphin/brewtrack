@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header card-background-dark text-black">
                        <h4 class="mb-0">Create New Report for Store: {{ $store->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stores.reports.store', $store) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="open" {{ old('status') === 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU/UPS</label>
                                <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}" required>
                                @error('sku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="shelf_position" class="form-label">Shelf Position</label>
                                <input type="text" name="shelf_position" id="shelf_position" class="form-control @error('shelf_position') is-invalid @enderror" value="{{ old('shelf_position') }}" required>
                                @error('shelf_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="facing" class="form-label">Facing</label>
                                <input type="number" name="facing" id="facing" class="form-control @error('facing') is-invalid @enderror" value="{{ old('facing') }}" required>
                                @error('facing')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock_level" class="form-label">Stock Level</label>
                                <input type="number" name="stock_level" id="stock_level" class="form-control @error('stock_level') is-invalid @enderror" value="{{ old('stock_level') }}" required>
                                @error('stock_level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="out_of_stock" id="out_of_stock" class="form-check-input @error('out_of_stock') is-invalid @enderror" {{ old('out_of_stock') ? 'checked' : '' }}>
                                <label for="out_of_stock" class="form-check-label">Out of Stock</label>
                                @error('out_of_stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="price_accuracy" id="price_accuracy" class="form-check-input @error('price_accuracy') is-invalid @enderror" {{ old('price_accuracy') ? 'checked' : '' }}>
                                <label for="price_accuracy" class="form-check-label">Price Accuracy</label>
                                @error('price_accuracy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary text-black">Create Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
