@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header card-background-dark text-black">
                        <h4 class="mb-0">Create Store</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stores.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="store_name" class="form-label">Name</label>
                                <input type="text" name="store_name" id="store_name" class="form-control @error('store_name') is-invalid @enderror" value="{{ old('store_name') }}" required>
                                @error('store_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="store_address" class="form-label">Address</label>
                                <input type="text" name="store_address" id="store_address" class="form-control @error('store_address') is-invalid @enderror" value="{{ old('store_address') }}" required>
                                @error('store_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="store_city" class="form-label">City</label>
                                <input type="text" name="store_city" id="store_city" class="form-control @error('store_city') is-invalid @enderror" value="{{ old('store_city') }}" required>
                                @error('store_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="store_state" class="form-label">State</label>
                                <input type="text" name="store_state" id="store_state" class="form-control @error('store_state') is-invalid @enderror" value="{{ old('store_state') }}" required>
                                @error('store_state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="store_zip" class="form-label">Zip</label>
                                <input type="text" name="store_zip" id="store_zip" class="form-control @error('store_zip') is-invalid @enderror" value="{{ old('store_zip') }}" required>
                                @error('store_zip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="store_longitude" class="form-label">Longitude</label>
                                <input type="text" name="store_longitude" id="store_longitude" class="form-control @error('store_longitude') is-invalid @enderror" value="{{ old('store_longitude') }}">
                                @error('store_longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="store_latitude" class="form-label">Latitude</label>
                                <input type="text" name="store_latitude" id="store_latitude" class="form-control @error('store_latitude') is-invalid @enderror" value="{{ old('store_latitude') }}">
                                @error('store_latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary text-black">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
