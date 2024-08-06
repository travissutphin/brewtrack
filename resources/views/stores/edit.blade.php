@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Store</h1>

        <form action="{{ route('stores.update', $store) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="store_name" class="form-label">Name</label>
                <input type="text" name="store_name" id="store_name" class="form-control @error('store_name') is-invalid @enderror" value="{{ old('store_name', $store->store_name) }}" required>
                @error('store_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_address" class="form-label">Address</label>
                <input type="text" name="store_address" id="store_address" class="form-control @error('store_address') is-invalid @enderror" value="{{ old('store_address', $store->store_address) }}" required>
                @error('store_address')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_city" class="form-label">City</label>
                <input type="text" name="store_city" id="store_city" class="form-control @error('store_city') is-invalid @enderror" value="{{ old('store_city', $store->store_city) }}" required>
                @error('store_city')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_state" class="form-label">State</label>
                <input type="text" name="store_state" id="store_state" class="form-control @error('store_state') is-invalid @enderror" value="{{ old('store_state', $store->store_state) }}" required>
                @error('store_state')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_zip" class="form-label">Zip</label>
                <input type="text" name="store_zip" id="store_zip" class="form-control @error('store_zip') is-invalid @enderror" value="{{ old('store_zip', $store->store_zip) }}" required>
                @error('store_zip')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_longitude" class="form-label">Longitude</label>
                <input type="text" name="store_longitude" id="store_longitude" class="form-control @error('store_longitude') is-invalid @enderror" value="{{ old('store_longitude', $store->store_longitude) }}">
                @error('store_longitude')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_latitude" class="form-label">Latitude</label>
                <input type="text" name="store_latitude" id="store_latitude" class="form-control @error('store_latitude') is-invalid @enderror" value="{{ old('store_latitude', $store->store_latitude) }}">
                @error('store_latitude')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection