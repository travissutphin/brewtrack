@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header card-background-dark text-black">
                        <h4 class="mb-0">Create Report: {{ $store->store_name }} </h4><small>{{ $store->store_address }}, {{ $store->store_city }}, {{ $store->store_state }} {{ $store->store_zip }}</small>
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
                                <label for="notes_manager" class="form-label">Manager Notes</label>
                                <textarea name="notes_manager" id="notes_manager" class="form-control @error('notes_manager') is-invalid @enderror" rows="3">{{ old('notes_manager') }}</textarea>
                                @error('notes_manager')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="shelf_position" class="form-label">Shelf Position</label>
                                <textarea name="shelf_position" id="shelf_position" class="form-control @error('shelf_position') is-invalid @enderror" rows="3" required>{{ old('shelf_position') }}</textarea>
                                @error('shelf_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="facing" class="form-label">Facing</label>
                                <textarea name="facing" id="facing" class="form-control @error('facing') is-invalid @enderror" rows="3" required>{{ old('facing') }}</textarea>
                                @error('facing')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock_level" class="form-label">Stock Level</label>
                                <textarea name="stock_level" id="stock_level" class="form-control @error('stock_level') is-invalid @enderror" rows="3" required>{{ old('stock_level') }}</textarea>
                                @error('stock_level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="out_of_stock" class="form-label">Out of Stock</label>
                                <textarea name="out_of_stock" id="out_of_stock" class="form-control @error('out_of_stock') is-invalid @enderror" rows="3">{{ old('out_of_stock') }}</textarea>
                                @error('out_of_stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price_accuracy" class="form-label">Price Accuracy</label>
                                <textarea name="price_accuracy" id="price_accuracy" class="form-control @error('price_accuracy') is-invalid @enderror" rows="3">{{ old('price_accuracy') }}</textarea>
                                @error('price_accuracy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="check_in" class="form-label">Check In Time</label>
                                <input type="datetime-local" name="check_in" id="check_in" class="form-control @error('check_in') is-invalid @enderror" value="{{ old('check_in') }}">
                                @error('check_in')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="check_out" class="form-label">Check Out Time</label>
                                <input type="datetime-local" name="check_out" id="check_out" class="form-control">
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