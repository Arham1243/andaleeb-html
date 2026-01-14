@extends('user.layouts.main')
@section('content')
    <div class="col-md-12">
        <div class="dashboard-content">
            {{ Breadcrumbs::render('user.hotels.index') }}
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
                                    <th>Booking Number</th>
                                    <th>Hotel</th>
                                    <th>Total</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Booking Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hotels as $hotel)
                                    <tr>
                                        <td>
                                            <a href="{{ route('user.hotels.show', $hotel->id) }}"
                                                class="link">{{ $hotel->booking_number }}</a>
                                        </td>
                                        <td>
                                            <div>{{ $hotel->hotel_name }}</div>
                                        </td>
                                        <td>{!! formatPrice($hotel->total_amount) !!}</td>
                                        <td>
                                            {{ strtoupper($hotel->payment_method) }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $hotel->payment_status == 'paid' ? 'success' : ($hotel->payment_status == 'pending' ? 'warning' : ($hotel->payment_status == 'refunded' ? 'info' : 'danger')) }}">
                                                {{ ucfirst($hotel->payment_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $hotel->booking_status == 'confirmed' ? 'success' : ($hotel->booking_status == 'pending' ? 'warning' : ($hotel->booking_status == 'refunded' ? 'info' : 'danger')) }}">
                                                {{ ucfirst($hotel->booking_status) }}
                                            </span>
                                        </td>
                                        <td>{{ formatDateTime($hotel->created_at) }}</td>
                                        <td>
                                            <div class="dropstart">
                                                <button type="button" class="recent-act__icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('user.hotels.show', $hotel->id) }}"
                                                            class="dropdown-item">
                                                            <i class="bx bxs-show"></i>
                                                            View Details
                                                        </a>
                                                    </li>
                                                    @if ($hotel->payment_status === 'failed' || $hotel->payment_status === 'pending')
                                                        <li>
                                                            <a href="{{ route('user.hotels.pay-again', $hotel->id) }}"
                                                                class="dropdown-item">
                                                                <i class="bx bx-credit-card"></i>

                                                                Pay Now
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if (in_array($hotel->booking_status, ['cancelled', 'pending', 'failed']))
                                                        <li>
                                                            <form action="{{ route('user.hotels.destroy', $hotel->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="bx bx-trash"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
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
