@extends('layouts.app')

@section('content')
    <div class="top-logo">
        <img src="{{ asset('logo.webp') }}" alt="Company Logo">
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card_header text-white text-center py-3">
                    <h3 class="mb-0">Submit Your Information</h3>
                </div>
                <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="section-card">
                        <!-- Name -->
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="section-card">

                        <!-- Business Name -->
                        <div class="mb-3">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name"
                                value="{{ old('business_name') }}" required>
                            @error('business_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Business Address -->
                        <div class="mb-3">
                            <label for="business_address" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="business_address" name="business_address"
                                value="{{ old('business_address') }}" required>
                            @error('business_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Additional Address -->
                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="address_line2" name="address_line2"
                                value="{{ old('address_line2') }}">
                            @error('address_line2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ old('city') }}" required>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label">State / Province</label>
                            <input type="text" class="form-control" id="state" name="state"
                                value="{{ old('state') }}" required>
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Postal / Zip Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code"
                                value="{{ old('postal_code') }}" required>
                            @error('postal_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="section-card">
                        <!-- Business Type -->
                        <!-- Business Type -->
                        <div class="mb-4">
                            <h6 class="form-label fw-bold mb-3">Business Type</h6>
                            <div class="row g-2">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="business_type"
                                            id="business_type_private" value="private" required
                                            {{ old('business_type') == 'private' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="business_type_private">
                                            Private Limited Company
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="business_type"
                                            id="business_type_public" value="public" required
                                            {{ old('business_type') == 'public' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="business_type_public">
                                            Public Listed Company
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="business_type"
                                            id="business_type_partnership" value="partnership" required
                                            {{ old('business_type') == 'partnership' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="business_type_partnership">
                                            Partnership
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="business_type"
                                            id="business_type_sole" value="sole" required
                                            {{ old('business_type') == 'sole' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="business_type_sole">
                                            Sole Proprietorship
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('business_type')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Net Worth -->
                        <div class="mb-4">
                            <h6 class="form-label fw-bold mb-3">Your Net Worth (Assets minus liabilities)</h6>
                            <div class="row g-2">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="net_worth"
                                            id="net_worth_less_250k" value="less_250k" required
                                            {{ old('net_worth') == 'less_250k' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="net_worth_less_250k">
                                            Less than $250K
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="net_worth"
                                            id="net_worth_more_250k" value="more_250k" required
                                            {{ old('net_worth') == 'more_250k' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="net_worth_more_250k">
                                            At least $250K
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="net_worth"
                                            id="net_worth_not_sure" value="not_sure" required
                                            {{ old('net_worth') == 'not_sure' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="net_worth_not_sure">
                                            I am not sure
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="net_worth"
                                            id="net_worth_other" value="other" required
                                            {{ old('net_worth') == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="net_worth_other">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('net_worth')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>



                        <!-- Credit Beacon Score -->
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="credit_score" class="form-label">Your Credit Beacon Score</label>
                                    <input type="text" class="form-control" id="credit_score" name="credit_score"
                                        value="{{ old('credit_score') }}" required>
                                    @error('credit_score')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="personal_income" class="form-label">Declared Personal Income for
                                        2023</label>
                                    <input type="number" class="form-control" id="personal_income"
                                        name="personal_income" value="{{ old('personal_income') }}" required>
                                    @error('personal_income')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-card">

                        <!-- File Upload -->
                        <div class="mb-3">
                            <label for="documents" class="form-label">Upload Related Documents</label>
                            <input type="file" class="form-control" id="documents" name="documents[]" multiple>
                            @error('documents')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="section-card">

                        <!-- Services you require -->
                        <div class="mb-3">
                            <label class="form-label">Services you require</label>
                            <div>
                                <label><input type="radio" name="services" value="less_250k" required
                                        {{ old('services') == 'less_250k' ? 'checked' : '' }}> Less than $250K</label>
                                <label><input type="radio" name="services" value="250k_500k" required
                                        {{ old('services') == '250k_500k' ? 'checked' : '' }}> $250K - $500K</label>
                                <label><input type="radio" name="services" value="more_5m" required
                                        {{ old('services') == 'more_5m' ? 'checked' : '' }}> More than $5M</label>
                            </div>
                            @error('services')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Purpose -->
                        <div class="mb-3">
                            <label for="purpose" class="form-label">If you want to give more detailed information,
                                write here</label>
                            <textarea class="form-control" id="purpose" name="purpose">{{ old('purpose') }}</textarea>
                            @error('purpose')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ old('date') }}" required>
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
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
