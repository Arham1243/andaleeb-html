@extends('admin.layouts.main')
@section('content')
    <div class="col-md-12">
        <div class="dashboard-content">
            {{ Breadcrumbs::render('admin.coupons.index') }}
            <form id="bulkActionForm" method="POST" action="{{ route('admin.bulk-actions', ['resource' => 'coupons']) }}">
                @csrf
                <div class="table-container universal-table">
                    <div class="custom-sec">
                        <div class="custom-sec__header">
                            <div class="section-content">
                                <h3 class="heading">{{ $title }}</h3>
                            </div>
                            <a href="{{ route('admin.coupons.create') }}" class="themeBtn">Add New</a>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-5">
                                <form class="custom-form">
                                    <div class="form-fields d-flex gap-3">
                                        <select class="field" id="bulkActions" name="bulk_actions" required>
                                            <option value="" disabled selected>Bulk Actions</option>
                                            <option value="active">Make Active</option>
                                            <option value="inactive">Make Inactive</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                        <button type="submit" onclick="confirmBulkAction(event)"
                                            class="themeBtn">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th class="no-sort">
                                            <div class="selection select-all-container"><input type="checkbox"
                                                    id="select-all"></div>
                                        </th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>
                                                <div class="selection item-select-container"><input type="checkbox"
                                                        class="bulk-item" name="bulk_select[]" value="{{ $coupon->id }}">
                                                </div>
                                            </td>
                                            <td>
                                                <a class="blue-link" href="{{ route('admin.coupons.edit', $coupon->id) }}">
                                                    {{ $coupon->title ?? 'N/A' }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $coupon->code }}
                                            </td>
                                            <td>
                                                {{ $coupon->type === 'percentage' ? '%' : '$' }}
                                                {{ ucfirst($coupon->type) }}
                                            </td>
                                            <td>
                                                <strong>{{ $coupon->rate }}{{ $coupon->type === 'percentage' ? '%' : '' }}</strong>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill bg-{{ $coupon->status === 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($coupon->status) }}
                                                </span>
                                            </td>
                                            <td>{{ formatDateTime($coupon->created_at) }}</td>
                                            <td>
                                                <div class="dropstart">
                                                    <button type="button" class="recent-act__icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.coupons.edit', $coupon->id) }}">
                                                                <i class="bx bx-edit"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.coupons.change-status', $coupon->id) }}">
                                                                <i
                                                                    class="bx {{ $coupon->status === 'active' ? 'bx-x' : 'bx-check' }}"></i>
                                                                Make
                                                                {{ $coupon->status === 'active' ? 'Inactive' : 'Active' }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="bx bx-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
