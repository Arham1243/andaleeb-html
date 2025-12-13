@extends('frontend.layouts.main')
@section('content')
    <!-- Page Header -->
    <section class="page-header py-5 d-flex align-items-center"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1596524430615-b46476ddff6e?q=80&w=1200&auto=format&fit=crop'); background-size: cover; background-position: center; height: 350px;">
        <div class="container text-center text-white">
            <h1 class="fw-bold display-4">Get in Touch</h1>
            <p class="lead mb-0 opacity-75">We are here to help plan your next journey</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="section-contact py-5 bg-light">
        <div class="container py-4">
            <div class="row g-5">

                <!-- Left Column: Contact Info & Map -->
                <div class="col-lg-5">
                    <div class="contact-details-wrapper">
                        <h3 class="fw-bold">Contact Information</h3>
                        <p class="text-muted mb-4">Have questions about a tour or need a custom quote? Reach out to us
                            directly or visit our office.</p>

                        <!-- Info Items -->
                        <div class="d-flex align-items-start mb-4">
                            <div class="icon-box">
                                <i class='bx bx-map'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold mb-1">Our Location</h6>
                                <p class="text-muted mb-0">
                                    Office# 18, Russia Cluster, Building V-05,<br>
                                    International City, Dubai, U.A.E
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="icon-box">
                                <i class='bx bx-phone'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold mb-1">Phone Number</h6>
                                <a href="tel:+97145766068"
                                    class="text-decoration-none text-muted d-block hover-primary">+971 4 576 6068</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="icon-box">
                                <i class='bx bx-mobile-alt'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold mb-1">Mobile / WhatsApp</h6>
                                <a href="tel:+971525748986"
                                    class="text-decoration-none text-muted d-block hover-primary">+971 52 574 8986</a>
                            </div>
                        </div>

                        <!-- Embedded Map -->
                        <div class="map-container mt-4 rounded-4 overflow-hidden shadow-sm border">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7222.4261103518265!2d55.40064926256448!3d25.16228291056195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sOffice%23%2018%2C%20Russia%20Cluster%2C%20Building%20V-05%2C%20International%20City%2C%20Dubai%2C%20U.A.E!5e0!3m2!1sen!2s!4v1765587362201!5m2!1sen!2s"
                                width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form-card bg-white p-4 p-md-5 rounded-4 shadow-sm h-100">
                        <h3 class="fw-bold mb-2">Send us a Message</h3>
                        <p class="text-muted mb-4 pb-1">Fill out the form below and our team will get back to you within 24
                            hours.</p>

                        <form action="#" method="POST">
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label fw-semibold small  text-muted">Full
                                            Name</label>
                                        <input type="text" class="custom-input" required>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label fw-semibold small  text-muted">Phone
                                            Number</label>
                                        <input type="tel" class="custom-input" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label fw-semibold small  text-muted">Email
                                            Address</label>
                                        <input type="email" class="custom-input" required>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold small  text-muted">Your
                                            Message</label>
                                        <textarea class="custom-input" rows="5" placeholder="Tell us about your travel plans..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="{{ env('RE_CAPTCHA_SITE_KEY') }}"> </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn-primary-custom">
                                        Send Message <i class='bx bx-paper-plane ms-2'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
