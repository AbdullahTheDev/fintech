@extends('layouts.app') 

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0">Submit Your Information</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Business Name -->
                        <div class="mb-3">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name') }}" required>
                            @error('business_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Business Address -->
                        <div class="mb-3">
                            <label for="business_address" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="business_address" name="business_address" value="{{ old('business_address') }}" required>
                            @error('business_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Additional Address -->
                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="address_line2" name="address_line2" value="{{ old('address_line2') }}">
                            @error('address_line2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label">State / Province</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required>
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Postal / Zip Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
                            @error('postal_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Business Type -->
                        <div class="mb-3">
                            <label class="form-label">Business Type</label>
                            <div>
                                <label><input type="radio" name="business_type" value="private" required {{ old('business_type') == 'private' ? 'checked' : '' }}> Private Limited Company</label>
                                <label><input type="radio" name="business_type" value="public" required {{ old('business_type') == 'public' ? 'checked' : '' }}> Public Listed Company</label>
                                <label><input type="radio" name="business_type" value="partnership" required {{ old('business_type') == 'partnership' ? 'checked' : '' }}> Partnership</label>
                                <label><input type="radio" name="business_type" value="sole" required {{ old('business_type') == 'sole' ? 'checked' : '' }}> Sole Proprietorship</label>
                            </div>
                            @error('business_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Net Worth -->
                        <div class="mb-3">
                            <label class="form-label">Your Net Worth</label>
                            <div>
                                <label><input type="radio" name="net_worth" value="less_250k" required {{ old('net_worth') == 'less_250k' ? 'checked' : '' }}> Less than $250K</label>
                                <label><input type="radio" name="net_worth" value="more_250k" required {{ old('net_worth') == 'more_250k' ? 'checked' : '' }}> At least $250K</label>
                            </div>
                            @error('net_worth')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Credit Beacon Score -->
                        <div class="mb-3">
                            <label for="credit_score" class="form-label">Your Credit Beacon Score</label>
                            <input type="text" class="form-control" id="credit_score" name="credit_score" value="{{ old('credit_score') }}" required>
                            @error('credit_score')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Personal Income -->
                        <div class="mb-3">
                            <label for="personal_income" class="form-label">Declared Personal Income for 2023</label>
                            <input type="number" class="form-control" id="personal_income" name="personal_income" value="{{ old('personal_income') }}" required>
                            @error('personal_income')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="mb-3">
                            <label for="documents" class="form-label">Upload Related Documents</label>
                            <input type="file" class="form-control" id="documents" name="documents[]" multiple>
                            @error('documents')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Funding Requirements -->
                        <div class="mb-3">
                            <label class="form-label">Funding you require</label>
                            <div>
                                <label><input type="radio" name="funding" value="less_250k" required {{ old('funding') == 'less_250k' ? 'checked' : '' }}> Less than $250K</label>
                                <label><input type="radio" name="funding" value="250k_500k" required {{ old('funding') == '250k_500k' ? 'checked' : '' }}> $250K - $500K</label>
                                <label><input type="radio" name="funding" value="more_5m" required {{ old('funding') == 'more_5m' ? 'checked' : '' }}> More than $5M</label>
                            </div>
                            @error('funding')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Purpose -->
                        <div class="mb-3">
                            <label for="purpose" class="form-label">If you want to give more detailed information, write here</label>
                            <textarea class="form-control" id="purpose" name="purpose">{{ old('purpose') }}</textarea>
                            @error('purpose')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
