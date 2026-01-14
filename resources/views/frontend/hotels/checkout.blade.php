@extends('frontend.layouts.main')
@section('content')
    <div class="py-2">
        <div class="container">
            <nav class="breadcrumb-nav">
                <ul class="breadcrumb-list">

                    <li class="breadcrumb-item">
                        <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Home</a>
                        <i class='bx bx-chevron-right breadcrumb-separator'></i>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('frontend.hotels.index') }}" class="breadcrumb-link">Hotels</a>
                        <i class='bx bx-chevron-right breadcrumb-separator'></i>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{!! route('frontend.hotels.search') . '?' . http_build_query(request()->query()) !!}" class="breadcrumb-link">Listing</a>
                        <i class='bx bx-chevron-right breadcrumb-separator'></i>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{!! route('frontend.hotels.details', $hotel['id']) . '?' . http_build_query(request()->query()) !!}" class="breadcrumb-link">
                            {{ $hotel['name'] }}</a>
                        <i class='bx bx-chevron-right breadcrumb-separator'></i>
                    </li>

                    <li class="breadcrumb-item active">
                        Guest info
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="custom-popup-wrapper" data-info-popup-wrapper="Privacy Policy">
        <div class="custom-popup" data-info-popup>
            <div class="custom-popup__header">
                <div class="title"> Privacy Policy</div>
                <div data-info-popup-close class="close-icon"><i class='bx bx-x'></i></div>
            </div>
            <div class="custom-popup__content custom-popup__content--full">
                <h6>Information collection and use</h6>
                <p>andaleeb World Travel and its subsidiaries and associated companies (in this policy, together “andaleeb”,
                    or “we”) are responsible for the processing of any personal information you provide to this Web Site.
                </p>
                <p>We take our responsibilities regarding the protection of personal information very seriously. This policy
                    explains how we use personal information that we may obtain about you.</p>
                <h6>Why do we need your personal information?</h6>
                <p>When you use services provided on this web site you will be asked to provide certain information such as
                    your name, contact details, and/or debit/credit card details. We will store this information and hold it
                    on computers or otherwise. We will use this information in the following ways:</p>
                <ul>
                    <li>To fulfil our agreement with you, including processing your booking, sending you your itinerary, or
                        contacting you if we become aware that there is a problem with any part of your trip;</li>
                    <li>To administer any contest or other promotional offer you may enter and notify winners;</li>
                    <li>To answer any queries which you may send to us by email;</li>
                    <li>In order to conduct customer satisfaction surveys;</li>
                    <li>To meet our legal compliance obligations;</li>
                    <li>For crime prevention and detection;</li>
                    <li>For direct marketing purposes, as set out in detail below.</li>
                </ul>
                <p>Where you are booking a flight, and in certain other circumstances we need to know the names of all
                    passengers travelling. If you are booking a flight or other service on behalf of someone else, you must
                    obtain their consent to use their personal information. We proceed on the basis that you have obtained
                    this consent.</p>
                <h6>How do we use your personal information?</h6>
                <p>Information you provide or that is obtained by us will be used by us to enable us to review, develop and
                    improve the services which we offer and provide you and other customers (via mail, email telephone or
                    otherwise) with information about new products and services and special offers we think you will find
                    valuable. We may also inform you about new products and services and special offers of selected third
                    parties.</p>
                <h6>To whom do we disclose your personal information?</h6>
                <p>andaleeb does not sell, or trade your personal information to third parties.</p>
                <p>We may give information about you as follows:</p>
                <ul>
                    <li>andaleeb will pass your personal information, and the personal information you supply relating to
                        any other travellers, to third parties whose services you are purchasing, such as airlines, hotels,
                        and car hire companies. We will transfer such information only when required for operational
                        purposes and not for marketing purposes. We are not responsible for the use such companies may make
                        of your personal information</li>
                    <li>andaleeb may provide its third party service providers and processors with access to your personal
                        information. These services providers may include: credit card verification providers, our data
                        warehouse and customer relationship management centre, marketing organizations, who may provide
                        support marketing and promotional communications; internet service providers who administer our web
                        page and provide internet services and host our facilities; and consumer research companies that
                        assist andaleeb with understanding consumer interests by conducting surveys. andaleeb only shares
                        your personal information to the extent required for the performance of such services. andaleeb has
                        implemented safeguards to ensure that our service providers treat personal information in a way that
                        is consistent with the terms of this Privacy Statement and that it is never used except to fulfill
                        services to andaleeb</li>
                    <li>andaleeb may also disclose your personal information as permitted or required by law. For example,
                        andaleeb will disclose personal information to those governmental bodies who have authority to
                        obtain it, in order to comply with a warrant or subpoena issued by a court of competent
                        jurisdiction, and to comply with record production requirements</li>
                    <li>In the event of a sale of all or substantially all of the assets of andaleeb, andaleeb may transfer
                        personal information in its control to a third party purchaser that agrees to use personal
                        information for the same reasons identified in this Privacy Statement</li>
                    <li>if we have a duty to do so or if the law allows us to do so;</li>
                    <li>to our employees and agents to do any of the above on our behalf, now or in the future.</li>
                </ul>
                <p>If you choose not to provide certain personal information we request, you will still be able to visit our
                    web site but you may be unable to access certain options or services.</p>
                <h6>Consent</h6>
                <p>By choosing to provide andaleeb with your personal information you are consenting to its use in
                    accordance with the principles outlined in this Privacy Statement and as outlined at the time you are
                    asked to provide any personal information. andaleeb may contact you by phone or email in order to
                    provide you with updates pertaining to its services as well as information about additional offers,
                    products or events that andaleeb believes may be of interest to you. You can choose to unsubscribe to
                    these updates or from having your personal information used for market research purposes.</p>
                <h6>Withdrawing your consent</h6>
                <p>All marketing communications andaleeb sends to you will provide you with a way to withdraw your consent.
                    If you no longer wish to receive promotional materials you may opt-out of receiving these communications
                    by clicking here, this will remove you from andaleeb mail lists.</p>
                <h6>Security</h6>
                <p>We will take appropriate steps to protect the personal information you share with us. We have implemented
                    technology and security features to safeguard the privacy of your personal information.</p>
                <h6>Aggregate data</h6>
                <p>We may aggregate personal information and remove any identifying elements in order to analyze patterns
                    and improve our marketing and promotional efforts, to analyze website use, to improve our content and
                    product offerings, and to customize our site’s content, layout and services.</p>
                <p>We gather certain usage information like the number and frequency of visitors to this site. This
                    information may include which URL you just came from, which URL you next go to, what browser you are
                    using, and your IP address. We only use such data in the aggregate. This collective data helps us to
                    determine how much our customers use parts of the site, and do internal research on our users’
                    demographics, interests, and behaviour to better understand and serve you.</p>
                <h6>Cookies</h6>
                <p>A “cookie” is a small bit of text used by a browser to store information. When you visit a site that uses
                    cookies, the Web server will request permission to pass a cookie to your browser. If accepted, it will
                    occupy only a few bytes on your hard drive and can improve your Web surfing experience. andaleeb uses
                    cookies to track customer visits through our site. This information enables us to save you time when
                    returning to the site by saving your password so you do not have to re-enter it each time you visit.
                    Cookies cannot profile your system or collect information from your hard drive. And although you may
                    receive cookies from many different sites, each cookie can only be read by the Web server that
                    originally issued it. Most browsers are initially set up to accept cookies, but you can set your
                    browsers to refuse cookies</p>
                <h6>Links</h6>
                <p>Our web site may contain links to other web sites. Please be aware that we are not responsible for the
                    privacy practices of web sites not operated by us. We encourage you to read the privacy statements of
                    each and every web site that collects personally identifiable information. This privacy statement
                    applies solely to information collected by our web site.</p>
                <h6>Correction / updating of personal information</h6>
                <p>If your personally identifiable information changes, or if you no longer desire our service, we will
                    provide a way to correct, update or remove your personal information provided to us.</p>
                <h6>Access to your personal information</h6>
                <p>You have the right to see personal information we keep about you. We will endeavour to provide the
                    information you require within a reasonable time. There may be a small monetary charge for some
                    requests, depending on the information requested. If you are concerned that any of the information we
                    hold on you is incorrect please contact us.</p>
                <h6>Transfer of your personal information</h6>
                <p>Some parties that process or store personal information may be located in jurisdictions outside your
                    country of residence. Therefore, your information may be processed and stored in these jurisdictions
                    and, as a result, foreign governments, courts, or law enforcement or regulatory agencies may be able to
                    obtain disclosure of your information through the laws in these countries.</p>
                <h6>Notification of changes</h6>
                <p>If we decide to change our Privacy Statement, we will post those changes on our web site so you are
                    always aware of what information we collect, how we use it, and under circumstances, if any, we disclose
                    it. If at any point we decide to use personally identifiable information in a manner different from that
                    stated at the time it was collected, we will notify you by way of an email. You will have a choice as to
                    whether or not we use your information in this different manner. We will use information in accordance
                    with the Privacy Statement under which the information was collected.</p>
                <h6>Online bookings</h6>
                <p>If you have a query regarding your online booking or encountered any problems whilst making your booking,
                    please email <a href="mailto:info@andaleebtours.com">info@andaleebtours.com</a></p>
                <p>Non-booking related queries</p>
                <p>If you experience any technical problems during your interaction with this website, please contact us on
                    <a href="tel:+971 52 574 8986">+971 52 574 8986</a> or email us on <a
                        href="mailto:info@andaleebtours.com">info@andaleebtours.com</a>.
                </p>
            </div>
        </div>
    </div>

    <section class="section-gap">
        <div class="container">
            <form id="checkoutForm" action="{{ route('frontend.hotels.payment.process') }}" method="POST">
                @csrf
                <input type="hidden" name="selected_room[room_code]" value="{{ $selected_room['room_code'] }}">
                <input type="hidden" name="selected_room[board_code]" value="{{ $selected_room['board_code'] }}">
                <input type="hidden" name="selected_room[board_title]" value="{{ $selected_room['board_title'] }}">
                <input type="hidden" name="selected_room[price]" value="{{ $selected_room['price'] }}">
                <input type="hidden" name="selected_room[room_name]" value="{{ $selected_room['room_name'] }}">

                <div class="row">
                    <div class="col-lg-8">
                        <div id="extras" class="{{ $show_extras ? 'd-block' : 'd-none' }}">
                            @if ($show_extras && $yalago_extras->isNotEmpty())
                                <div id="selected-extras-hidden-fields"></div>

                                @php $j = 0; @endphp

                                @foreach ($yalago_extras as $item)
                                    @php
                                        $extra = $item['extra'];
                                        $room = $item['room'];
                                        $board = $item['board'];

                                        if (empty($extra['IsMandatory'])) {
                                            continue;
                                        }

                                        $groupName = strtolower($room['Code'] . '-' . $extra['ExtraId']);
                                    @endphp

                                    <div class="modern-card">
                                        <div class="card-title">
                                            {{ $extra['Title'] }}
                                            | {{ $room['Description'] }}
                                            | {{ $board['Description'] }}
                                        </div>

                                        <div class="transfers-list">
                                            <div class="row g-3">
                                                @foreach ($extra['Options'] as $option)
                                                    @php
                                                        $j++;

                                                        if (!empty($extra['IsBindingPrice'])) {
                                                            $price = number_format($option['GrossCost']['Amount'], 2);
                                                        } else {
                                                            $net = $option['NetCost']['Amount'];
                                                            $commission = ($net * $hotelCommissionPercentage) / 100;
                                                            $price = $net + $commission;
                                                        }
                                                    @endphp

                                                    <div class="col-md-6">
                                                        <div class="transfers-item">
                                                            <input class="transfers-item__radio" type="radio"
                                                                id="transfer-{{ $j }}"
                                                                name="{{ $groupName }}" value="{{ $option['Title'] }}"
                                                                data-price="{{ $price }}"
                                                                data-option-id="{{ $option['OptionId'] }}"
                                                                data-extra-id="{{ $extra['ExtraId'] }}"
                                                                data-extra-type-id="{{ $extra['ExtraTypeId'] }}"
                                                                {{ $extra['IsMandatory'] ? 'required data-required=true' : '' }}>

                                                            <label class="transfers-item__box"
                                                                for="transfer-{{ $j }}">
                                                                <p
                                                                    class="content text-danger text-center mb-1 extras-required">
                                                                    Selection Required
                                                                </p>

                                                                <div class="transfer-header">
                                                                    <i class='bx bxs-check-circle'></i>
                                                                    <div class="title">Selected</div>
                                                                </div>

                                                                <div class="transfer-body">
                                                                    <div class="content">{{ $option['Title'] }}</div>

                                                                    <div class="bottom-price">
                                                                        <div class="price-details">
                                                                            <span>Per person return</span>
                                                                            <div class="price"> {{ formatPrice($price) }}
                                                                            </div>
                                                                            <span>Total <span class="dirham">D</span>
                                                                                {{ $price }}</span>
                                                                        </div>
                                                                        <div class="selected-btn" select-text="Select"
                                                                            selected-text="Selected"></div>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="modern-card">
                                <div class="card-title">
                                    <i class='bx bxs-plane-alt'></i> Flight Details
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="custom-info-alert my-2">
                                            <div class="icon"><i class="bx bx-info-circle"></i></div>
                                            <div class="content">
                                                To proceed with your booking, we also need your flight details to arrange
                                                transfers for you.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- OUTBOUND -->
                                    <div class="col-md-12">
                                        <div class="card-title mb-0">Outbound Flight</div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label class="form-label">Flight number *</label>
                                        <input type="text" class="custom-input"
                                            name="flight_details[outbound][flight_number]" required>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label class="form-label">Arrival time *</label>
                                        <div class="flight-fields">
                                            <select class="custom-select" name="flight_details[outbound][arrival_hour]"
                                                required>
                                                <option value="">hh</option>
                                                @for ($i = 0; $i < 24; $i++)
                                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label class="form-label d-none d-md-block">&nbsp;</label>
                                        <select class="custom-select" name="flight_details[outbound][arrival_minute]"
                                            required>
                                            <option value="">mm</option>
                                            @foreach (['00', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55'] as $m)
                                                <option value="{{ $m }}">{{ $m }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- INBOUND -->
                                    <div class="col-md-12">
                                        <div class="card-title mb-0">Inbound Flight</div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label class="form-label">Flight number *</label>
                                        <input type="text" class="custom-input"
                                            name="flight_details[inbound][flight_number]" required>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label class="form-label">Departure time *</label>
                                        <div class="flight-fields">
                                            <select class="custom-select" name="flight_details[inbound][departure_hour]"
                                                required>
                                                <option value="">hh</option>
                                                @for ($i = 0; $i < 24; $i++)
                                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label class="form-label d-none d-md-block">&nbsp;</label>
                                        <select class="custom-select" name="flight_details[inbound][departure_minute]"
                                            required>
                                            <option value="">mm</option>
                                            @foreach (['00', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55'] as $m)
                                                <option value="{{ $m }}">{{ $m }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div id="guest-info" class="{{ $show_extras ? 'd-none' : 'd-block' }}">
                            @php
                                $adultCount = collect($rooms_request)->sum('Adults');
                            @endphp
                            <div class="modern-card">
                                <div class="card-title">
                                    <i class='bx bx-user'></i> Guest information
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="custom-info-alert my-2">
                                            <div class="icon"><i class="bx bx-info-circle"></i></div>
                                            <div class="content">
                                                All names must exactly match passports.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Title</label>
                                        <select class="custom-select" name="booking[lead_guest][title]" required>
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                            <option value="Ms">Ms.</option>
                                        </select>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="custom-input" name="booking[lead_guest][first_name]"
                                            required>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="custom-input" name="booking[lead_guest][last_name]"
                                            required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" class="custom-input" name="booking[lead_guest][email]"
                                            required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" class="custom-input" name="booking[lead_guest][phone]"
                                            required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Address *</label>
                                        <input type="text" class="custom-input" name="booking[lead_guest][address]"
                                            required>
                                    </div>
                                </div>
                            </div>

                            @for ($i = 0; $i < $adultCount; $i++)
                                <div class="modern-card">
                                    <div class="card-title">
                                        <i class='bx bx-user'></i> Guest #{{ $i + 1 }} Details
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Title</label>
                                            <select class="custom-select"
                                                name="booking[guests][{{ $i }}][title]" required>
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Ms">Ms.</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="custom-input"
                                                name="booking[guests][{{ $i }}][first_name]" required>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="custom-input"
                                                name="booking[guests][{{ $i }}][last_name]" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Age *</label>
                                            <input type="number" min="1" class="custom-input"
                                                name="booking[guests][{{ $i }}][age]" required>
                                        </div>
                                    </div>
                                </div>
                            @endfor



                            <div class="modern-card">
                                <div class="card-title">
                                    <i class='bx bx-info-circle'></i> Important information
                                </div>

                                <p class="text-muted fw-bold pt-3 mb-1">Hotel Information</p>
                                <p>For health and safety reasons, children under 8 years are not allowed in any over-water
                                    or over-ocean categories.</p>
                                <p>WOW INCLUSIVE offers 24-hour premium all-inclusive benefits, including breakfast.</p>
                                <a data-info-popup-open="Privacy Policy" href="javascript:void(0)"
                                    class="custom-link">Show
                                    more</a>
                            </div>

                            <div class="modern-card">
                                <!-- Option 1: Card -->
                                <label class="payment-option">
                                    <div class="payment-header">
                                        <input type="radio" name="payment_method" class="payment-radio" value="payby"
                                            checked="" required="">
                                        <span class="payment-label">Credit / Debit Card</span>
                                    </div>
                                    <div class="payment-desc">
                                        Note: You will be redirected to the secure payment gateway to complete your
                                        purchase.
                                    </div>
                                </label>

                                <!-- Option 2: Tabby -->
                                <label class="payment-option">
                                    <div class="payment-header">
                                        <input type="radio" name="payment_method" class="payment-radio" value="tabby"
                                            required="">
                                        <span class="payment-label">Tabby - Buy Now Pay Later</span>
                                    </div>
                                    <div class="payment-desc">
                                        Pay in 4 interest-free installments. No fees, no hidden costs.
                                    </div>
                                </label>

                                <button type="submit" class="btn-primary-custom mt-2">
                                    Pay Now <i class='bx bx-lock-alt'></i>
                                </button>

                                <div class="text-center mt-3">
                                    <small
                                        class="text-muted secure-checkout d-flex align-items-center gap-1 justify-content-center"><i
                                            class='bx bx-check-shield'></i>Secure
                                        Checkout</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="event-card event-card--details">
                            <div class="event-card__img">
                                <img data-src="{{ $hotel['image'] ?? asset('frontend/images/placeholder.png') }}"
                                    class="imgFluid lazyload" alt="{{ $hotel['name'] }}" />
                            </div>

                            <div class="event-card__content">
                                <div class="title title--sm">{{ $hotel['name'] }}</div>

                                @if (!empty($hotel['rating']))
                                    <div class="rating pb-1">
                                        <div class="stars">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="bx bxs-star"
                                                    style="color: {{ $i <= $hotel['rating'] ? '#f2ac06' : '#ccc' }}"></i>
                                            @endfor
                                        </div>
                                        <div class="rating-average">
                                            <div class="rating-average-blob">{{ number_format($hotel['rating'], 1) }}
                                            </div>
                                            <div class="info">{{ $hotel['rating_text'] ?? '' }}</div>
                                        </div>
                                    </div>
                                @endif

                                <div class="details">
                                    <div class="icon"><i class="bx bxs-calendar-alt"></i></div>
                                    <div class="content">
                                        {{ \Carbon\Carbon::parse($check_in)->format('d M, Y') }} -
                                        {{ \Carbon\Carbon::parse($check_in)->diffInDays(\Carbon\Carbon::parse($check_out)) }}
                                        nights at hotel
                                    </div>
                                </div>

                                <div class="details">
                                    <div class="icon"><i class="bx bx-map"></i></div>
                                    <div class="content">
                                        {{ $hotel['address'] ?? '' }}
                                    </div>
                                </div>

                                <div class="details">
                                    <div class="icon"><i class="bx bxs-group"></i></div>
                                    <div class="content">
                                        {{ collect($rooms_request)->sum('Adults') }} Adults,
                                        {{ collect($rooms_request)->sum(fn($r) => count($r['ChildAges'])) }} Children,
                                        {{ count($rooms_request) }} Rooms
                                    </div>
                                </div>

                                <div class="details">
                                    <div class="icon"><i class="bx bxs-bed"></i></div>
                                    <div class="content showroomtype">{{ $selected_room['room_name'] }}</div>
                                </div>

                                <div class="details details--border">
                                    <div class="content">Rooms total</div>
                                    <div class="content roomstotal">{{ formatPrice($selected_room['price']) }}</div>
                                </div>
                            </div>
                        </div>


                        @if ($show_extras)
                            <div class="modern-card">
                                <div class="card-title">Transfers / Extras
                                </div>

                                <div class="order-item-mini" id="extras-summary-item" style="display: none;">
                                    <div>
                                        <h6>
                                            <span id="extras-pkg-title">pkg title here</span>
                                            <i class='bx bx-x'></i> AED
                                            <span id="extras-pkg-amount">amount here</span>
                                        </h6>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="summary-row total">
                                        <span>Total</span>
                                        <span style="color: var(--color-primary)"><span class="dirham">D</span>
                                            <span id="extras-total-amount">0.00</span></span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="modern-card">

                            <div class="order-item-mini">
                                <div>
                                    <h6>Rooms Total</h6>
                                </div>
                                <span class="fw-bold"><span class="dirham">D</span> 1068.18</span>
                            </div>

                            <div class="mt-3">
                                @if ($show_extras)
                                    <div class="summary-row">
                                        <span>Extras total</span>
                                        <span><span class="dirham">D</span> <span
                                                id="summary-extras-total">0.00</span></span>
                                    </div>
                                @endif
                                <div class="summary-row total">
                                    <span>Total Price</span>
                                    <span style="color: var(--color-primary)"><span class="dirham">D</span>
                                        <span id="summary-net-total">1068.18</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @if ($show_extras)
        <div class="continue-bar mt-0">
            <div class="container">
                <div class="continue-bar-padding">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="details-wrapper">
                                <div class="details">
                                    <div class="total">Total</div>
                                    <div><span class="dirham">D</span><span class="total-price" id="total-price"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="details-btn-wrapper">
                                <button type="button" id="continue-btn" class="btn-primary-custom">
                                    Continue
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const popupWrapper = document.querySelector("[data-info-popup-wrapper]");
            const popup = document.querySelector("[data-info-popup]");
            if (!popupWrapper) return;

            document.querySelectorAll("[data-info-popup-open]").forEach((button) => {
                button.addEventListener("click", () => popupWrapper.classList.add("open"));
            });

            document
                .querySelector("[data-info-popup-close]")
                ?.addEventListener("click", () => {
                    popupWrapper.classList.remove("open");
                });

            document.addEventListener("click", (event) => {
                if (
                    popupWrapper.classList.contains("open") &&
                    !popup.contains(event.target) &&
                    !event.target.closest("[data-info-popup-open]")
                ) {
                    popupWrapper.classList.remove("open");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {



            /* -----------------------------
             Helpers
            ----------------------------- */
            function getQueryParam(name) {
                const params = new URLSearchParams(window.location.search);
                return params.get(name);
            }

            const roomsTotal = parseFloat(getQueryParam('price')) || 0;

            const totalPriceEls = {
                extrasTotal: document.getElementById('extras-total-amount'),
                summaryExtras: document.getElementById('summary-extras-total'),
                summaryNet: document.getElementById('summary-net-total'),
                continueTotal: document.getElementById('total-price')
            };

            /* -----------------------------
             Recalculate extras + totals
            ----------------------------- */
            const formatPrice = (value) =>
                Number(value).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });


            /* Populate extras hidden fields */
            const extrasHiddenContainer = document.getElementById('selected-extras-hidden-fields');

            function clearExtrasHiddenFields() {
                extrasHiddenContainer.innerHTML = '';
            }

            function addExtraHiddenField(index, data) {
                document.querySelectorAll('.extras-required').forEach(el => {
                    el.style.display = 'none';
                });
                const wrapper = document.createElement('div');

                wrapper.innerHTML = `
        <input type="hidden" name="booking[extras][${index}][title]" value="${data.title}">
        <input type="hidden" name="booking[extras][${index}][price]" value="${data.price}">
        <input type="hidden" name="booking[extras][${index}][option_id]" value="${data.optionId}">
        <input type="hidden" name="booking[extras][${index}][extra_id]" value="${data.extraId}">
        <input type="hidden" name="booking[extras][${index}][extra_type_id]" value="${data.extraTypeId}">
    `;

                extrasHiddenContainer.appendChild(wrapper);
            }

            function recalcTotals() {
                let extrasTotal = 0;
                let extrasIndex = 0;

                clearExtrasHiddenFields();

                document.querySelectorAll('.transfers-item__radio:checked').forEach(radio => {
                    const price = Number(radio.dataset.price || 0);
                    extrasTotal += price;

                    addExtraHiddenField(extrasIndex++, {
                        title: radio.value,
                        price: price,
                        optionId: radio.dataset.optionId,
                        extraId: radio.dataset.extraId,
                        extraTypeId: radio.dataset.extraTypeId
                    });
                });


                const netTotal = roomsTotal + extrasTotal;

                if (totalPriceEls.extrasTotal) {
                    totalPriceEls.extrasTotal.textContent = formatPrice(extrasTotal);
                }

                if (totalPriceEls.summaryExtras) {
                    totalPriceEls.summaryExtras.textContent = formatPrice(extrasTotal);
                }

                if (totalPriceEls.summaryNet) {
                    totalPriceEls.summaryNet.textContent = formatPrice(netTotal);
                }

                if (totalPriceEls.continueTotal) {
                    totalPriceEls.continueTotal.textContent = formatPrice(netTotal);


                }
            }

            /* -----------------------------
             Listen to extras selection
            ----------------------------- */
            document.querySelectorAll('.transfers-item__radio').forEach(radio => {
                radio.addEventListener('change', recalcTotals);
            });

            /* -----------------------------
             Continue button validation
            ----------------------------- */
            const continueBtn = document.getElementById('continue-btn');
            const extrasSection = document.getElementById('extras');
            const guestInfoSection = document.getElementById('guest-info');
            const continueBar = document.querySelector('.continue-bar');

            if (continueBtn && extrasSection) {
                continueBtn.addEventListener('click', function() {

                    if (!extrasSection.classList.contains('d-block')) return;

                    /* Validate mandatory extra groups */
                    const requiredGroups = new Set();

                    document.querySelectorAll('.transfers-item__radio[data-required="true"]').forEach(
                        radio => {
                            requiredGroups.add(radio.name);
                        });

                    for (const group of requiredGroups) {
                        if (!document.querySelector(`input[name="${group}"]:checked`)) {
                            showMessage("Please select all required extras before continuing.", "error");
                            return;
                        }
                    }

                    /* Switch to guest info */
                    extrasSection.classList.remove('d-block');
                    extrasSection.classList.add('d-none');

                    guestInfoSection.classList.remove('d-none');
                    guestInfoSection.classList.add('d-block');

                    if (continueBar) {
                        continueBar.style.display = 'none';
                    }

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            /* Initial total sync */
            recalcTotals();


        });


        document.addEventListener('DOMContentLoaded', function() {
            const checkoutForm = document.getElementById('checkoutForm');
            const submitBtn = checkoutForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            checkoutForm.addEventListener('submit', function(e) {
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bx bx-loader-alt bx-spin"></i> Processing...';
            });
        });
    </script>
@endpush
