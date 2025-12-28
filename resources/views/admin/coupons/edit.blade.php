@extends('admin.layouts.main')
@section('content')
    <div class="col-md-12">
        <div class="dashboard-content">
            {{ Breadcrumbs::render('admin.coupons.edit', $coupon) }}
            <div class="custom-sec custom-sec--form">
                <div class="custom-sec__header">
                    <div class="section-content">
                        <h3 class="heading">{{ isset($title) ? $title : '' }}</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" id="validation-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-wrapper">
                            <div class="form-box">
                                <div class="form-box__header">
                                    <div class="title">Coupon Details</div>
                                </div>
                                <div class="form-box__body">
                                    <div class="form-fields">
                                        <label class="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="field"
                                            value="{{ old('title', $coupon->title) }}" data-required data-error="Title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-fields">
                                        <label class="title">Code <span class="text-danger">*</span></label>
                                        <input type="text" name="code" class="field"
                                            value="{{ old('code', $coupon->code) }}" data-required data-error="Code" style="text-transform: uppercase;">
                                        <small class="text-muted">Coupon code (will be converted to uppercase)</small>
                                        @error('code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-fields">
                                        <label class="title">Type <span class="text-danger">*</span></label>
                                        <select name="type" class="field select2-select" data-required data-error="Type">
                                            <option value="">Select Type</option>
                                            <option value="percentage" {{ old('type', $coupon->type) == 'percentage' ? 'selected' : '' }}>% Percentage</option>
                                            <option value="amount" {{ old('type', $coupon->type) == 'amount' ? 'selected' : '' }}>$ Amount</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-fields">
                                        <label class="title">Rate <span class="text-danger">*</span></label>
                                        <input type="number" name="rate" class="field" step="0.01" min="0"
                                            value="{{ old('rate', $coupon->rate) }}" data-required data-error="Rate">
                                        @error('rate')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="seo-wrapper">
                            <div class="form-box">
                                <div class="form-box__header">
                                    <div class="title">Status</div>
                                </div>
                                <div class="form-box__body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active"
                                            value="active"
                                            {{ old('status', $coupon->status) == 'active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="status" id="inactive"
                                            value="inactive"
                                            {{ old('status', $coupon->status) == 'inactive' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button class="themeBtn" type="submit">Update Coupon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
