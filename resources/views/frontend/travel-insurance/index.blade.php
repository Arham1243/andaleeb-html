@extends('frontend.layouts.main')
@section('content')
    <section class="section-plans mar-y py-4">
        <div class="container">


            <div class="row mb-4">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="fw-bold mb-1">Select Insurance Plan</h4>
                        <p class="text-muted small">Choose the coverage that suits you best.</p>
                    </div>
                </div>
            </div>

            <div class="plans-list-wrapper">

                <label class="plan-card-item">
                    <input type="radio" name="insurance_plan" class="plan-radio-input">
                    <div class="plan-card-inner">

                        <div class="plan-info">
                            <h6 class="plan-title">Travel Assurance - Silver Plan</h6>
                            <a href="#" class="plan-link">More Benefits <i class='bx bx-chevron-right'></i></a>
                        </div>


                        <div class="plan-cost">
                            <div class="price-tag">85.00 <small>AED</small></div>
                            <span class="tax-note">Including Tax</span>
                        </div>


                        <div class="plan-check-icon">
                            <i class='bx bx-check'></i>
                        </div>
                    </div>
                </label>


                <label class="plan-card-item">
                    <input type="radio" name="insurance_plan" class="plan-radio-input" checked>
                    <div class="plan-card-inner">

                        <div class="plan-info">
                            <h6 class="plan-title">Travel Assurance - Gold Covid Plus Plan</h6>
                            <a href="#" class="plan-link">More Benefits <i class='bx bx-chevron-right'></i></a>
                        </div>


                        <div class="plan-cost">
                            <div class="price-tag">119.35 <small>AED</small></div>
                            <span class="tax-note">Including Tax</span>
                        </div>


                        <div class="plan-check-icon">
                            <i class='bx bx-check'></i>
                        </div>
                    </div>
                </label>


                <label class="plan-card-item">
                    <input type="radio" name="insurance_plan" class="plan-radio-input">
                    <div class="plan-card-inner">

                        <div class="plan-info">
                            <h6 class="plan-title">Travel Assurance - Platinum Shield</h6>
                            <a href="#" class="plan-link">More Benefits <i class='bx bx-chevron-right'></i></a>
                        </div>


                        <div class="plan-cost">
                            <div class="price-tag">155.00 <small>AED</small></div>
                            <span class="tax-note">Including Tax</span>
                        </div>


                        <div class="plan-check-icon">
                            <i class='bx bx-check'></i>
                        </div>
                    </div>
                </label>

            </div>
        </div>
    </section>
@endsection
