@extends('admin.layouts.main')
@section('content')
    <div class="col-md-12">
        <div class="dashboard-content">
            <div class="custom-sec">
                <div class="custom-sec__header">
                    <div class="section-content">
                        <h3 class="heading">{{ isset($title) ? $title : '' }}</h3>
                    </div>
                </div>
                <form action="{{ route('admin.settings.details') }}" method="POST">
                    <div class="form-box">
                        <div class="form-box__header">
                            <div class="title">Password</div>
                        </div>
                        <div class="form-box__body">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="form-fields">
                                        <label class="title">Facebook</label>
                                        <input type="url" name="FACEBOOK" class="field"
                                            value="{{ $config['FACEBOOK'] ?? '' }} " placeholder="Enter Facebook Address">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="form-fields">
                                        <label class="title">Instagram</label>
                                        <input type="url" name="INSTAGRAM" class="field"
                                            value="{{ $config['INSTAGRAM'] ?? '' }}" placeholder="Enter Instagram Address"
                                            required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="form-fields">
                                        <label class="title">Twitter</label>
                                        <input type="url" name="TWITTER" class="field"
                                            value="{{ $config['TWITTER'] ?? '' }}" placeholder="Enter Twitter Address"
                                            required>
                                    </div>
                                </div>

                                <div class="col-12 my-3">
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="form-fields">
                                        <label class="title">Phone</label>
                                        <div class="relative-div">
                                            <input type="text" name="COMPANYPHONE" class="field"
                                                value="{{ $config['COMPANYPHONE'] ?? '' }}" placeholder="Enter Phone Number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="form-fields">
                                        <label class="title">Whatsapp</label>
                                        <div class="relative-div">
                                            <input type="text" name="WHATSAPP" class="field"
                                                value="{{ $config['WHATSAPP'] ?? '' }}" placeholder="Enter Whatsapp Number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="form-fields">
                                        <label class="title">Email</label>
                                        <div class="relative-div">
                                            <input type="email" name="COMPANYEMAIL" class="field"
                                                value="{{ $config['COMPANYEMAIL'] ?? '' }}"
                                                placeholder="Enter Email Address" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-fields">
                                        <button class="themeBtn themeBtn--center">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
