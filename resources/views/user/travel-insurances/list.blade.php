@extends('user.layouts.main')
@section('content')
    <div class="col-md-12">
        <div class="dashboard-content">
            {{ Breadcrumbs::render('user.travel-insurances.index') }}
            <div class="table-container universal-table">
                <div class="custom-sec">
                    <div class="custom-sec__header">
                        <div class="section-content">
                            <h3 class="heading">{{ isset($title) ? $title : '' }}</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Insurance Number</th>
                                    <th>Plan</th>
                                    <th>Travel Dates</th>
                                    <th>Passengers</th>
                                    <th>Premium</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($insurances as $insurance)
                                    <tr>
                                        <td>
                                            <a href="{{ route('user.travel-insurances.show', $insurance->id) }}"
                                                class="link">{{ $insurance->insurance_number }}</a>
                                        </td>
                                        <td>{{ $insurance->plan_title ?? 'N/A' }}</td>
                                        <td>
                                            {{ $insurance->start_date ? formatDate($insurance->start_date) : 'N/A' }}
                                            <br>to<br>
                                            {{ $insurance->return_date ? formatDate($insurance->return_date) : 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $insurance->total_adults }} Adult(s)
                                            @if($insurance->total_children > 0)<br>{{ $insurance->total_children }} Child(ren)@endif
                                            @if($insurance->total_infants > 0)<br>{{ $insurance->total_infants }} Infant(s)@endif
                                        </td>
                                        <td>{{ number_format($insurance->total_premium, 2) }} {{ $insurance->currency }}</td>
                                        <td>
                                            {{ strtoupper($insurance->payment_method ?? 'N/A') }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $insurance->payment_status == 'paid' ? 'success' : ($insurance->payment_status == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($insurance->payment_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $insurance->booking_confirmed ? 'success' : ($insurance->status == 'confirmed' ? 'success' : ($insurance->status == 'pending' ? 'warning' : ($insurance->status == 'active' ? 'info' : 'danger'))) }}">
                                                {{ $insurance->booking_confirmed ? 'Confirmed' : ucfirst($insurance->status) }}
                                            </span>
                                        </td>
                                        <td>{{ formatDateTime($insurance->created_at) }}</td>
                                        <td>
                                            <div class="dropstart">
                                                <button type="button" class="recent-act__icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('user.travel-insurances.show', $insurance->id) }}"
                                                            class="dropdown-item">
                                                            <i class="bx bxs-show"></i>
                                                            View Details
                                                        </a>
                                                    </li>
                                                    @if ($insurance->payment_status === 'failed' || $insurance->payment_status === 'pending')
                                                        <li>
                                                            <a href="{{ route('user.travel-insurances.pay-again', $insurance->id) }}"
                                                                class="dropdown-item">
                                                                <i class="bx bx-credit-card"></i>
                                                                Pay Now
                                                            </a>
                                                        </li>
                                                    @endif
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
        </div>
    </div>
@endsection
