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
                        <a href="{{ route('frontend.hotels.search') }}" class="breadcrumb-link">Search</a>
                        <i class='bx bx-chevron-right breadcrumb-separator'></i>
                    </li>

                    <li class="breadcrumb-item active">
                        Le Meridien Dubai Hotel & Conference Centre
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    <div class="container">
        <div class="hotel-detail">
            <div class="hotel-info">
                <div class="row">
                    <div class="col-md-8">
                        <div class="hotels-lg-img-wrapper">
                            <div class="hotels-lg-img-list">
                                <div class="hotels-lg-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/0.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                                <div class="hotels-lg-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/1.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                                <div class="hotels-lg-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/2.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                                <div class="hotels-lg-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/3.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                                <div class="hotels-lg-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/4.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                                <div class="hotels-lg-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/5.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                            </div>
                            <div class="action-btns">
                                <div class="event-slider-actions">
                                    <button type="button" class="event-slider-actions__arrow event-slider-prev">
                                        <i class="bx bx-chevron-left"></i>
                                    </button>
                                    <div class="event-slider-actions__progress"></div>
                                    <button type="button" class="event-slider-actions__arrow event-slider-next">
                                        <i class="bx bx-chevron-right"></i>
                                    </button>
                                </div>
                                <button class="full-screen"><i class='bx bx-fullscreen'></i>Full screen</button>
                            </div>
                        </div>
                        <div class="hotels-sm-img-list hotels-sm-img-list-slider">
                            <div class="hotels-sm-img-item">
                                <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/0.jpg"
                                    class="imgFluid lazyload" alt="Image" />
                            </div>
                            <div class="hotels-sm-img-item">
                                <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/1.jpg"
                                    class="imgFluid lazyload" alt="Image" />
                            </div>
                            <div class="hotels-sm-img-item">
                                <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/2.jpg"
                                    class="imgFluid lazyload" alt="Image" />
                            </div>
                            <div class="hotels-sm-img-item">
                                <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/3.jpg"
                                    class="imgFluid lazyload" alt="Image" />
                            </div>
                            <div class="hotels-sm-img-item">
                                <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/4.jpg"
                                    class="imgFluid lazyload" alt="Image" />
                                <div class="hotels-sm-img-item">
                                    <img data-src="https://images.dnatatravel.com/ei/2/0/4/1/8/8/7/4.jpg"
                                        class="imgFluid lazyload" alt="Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="event-card event-card--details">
                            <div class="event-card__content">
                                <div class="title">Marriott Executive Apartments Dubai Creek</div>
                                <div class="details">
                                    <div class="icon"><i class="bx bx-map"></i></div>
                                    <div class="content">Riggat Albuteen Str, Po Box 81148, Dubai</div>
                                </div>
                                <div class="rating mb-0">
                                    <div class="stars">
                                        <i class="bx bxs-star" style="color: #f2ac06"></i>
                                        <i class="bx bxs-star" style="color: #f2ac06"></i>
                                        <i class="bx bxs-star" style="color: #f2ac06"></i>
                                        <i class="bx bxs-star" style="color: #f2ac06"></i>
                                        <i class="bx bxs-star" style="color: #f2ac06"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-card event-card--details">
                            <div class="event-card__content">
                                <span class="subtitle">Price from</span>
                                <div class="price"><span class="dirham">D</span>1431.42</div>
                                <span class="subtitle d-block mb-2">(Per person)</span>
                                <div class="details">
                                    <div class="icon"><i class="bx bxs-moon"></i></div>
                                    <div class="content">13 Jan 2026 - 15 Jan 2026 | 2 nights at hotel</div>
                                </div>
                                <div class="details">
                                    <div class="icon"><i class='bx bxs-group'></i></div>
                                    <div class="content">1 Adults, 0 Child, 1 Rooms </div>
                                </div>

                            </div>
                        </div>
                        <div class="event-card">
                            <div class="event-card__content">
                                <div class="hotel-detail__reviews m-0 p-0">
                                    <div class="review-header mb-0">
                                        <div class="rating">
                                            5.0 </div>
                                        <div class="details">
                                            <div class="client-name">Spectacular</div>
                                            <div class="checkin-time">Based on customer reviews</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="hotel-detail__tabs">
            <ul class="nav nav-pills details-tabs" id="pills-tab" role="tablist">
                <li role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Overview</button>
                </li>
                <li role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Rooms</button>
                </li>
                <li role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Information Items</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hotel-detail-box text-document">
                                <h3 class="heading mt-0">Hotel Information</h3>
                                <p>Cheval Maison, The Palm Dubai is an all-apartment boutique property providing the ideal
                                    base from
                                    which to explore all that Dubai has to offer. Located on the iconic Palm Jumeirah, 131
                                    contemporary apartments provide the freedom, flexibility and space to create your own
                                    personal
                                    sanctuary, but still with easy access to the vibrant sights and sounds of this unique
                                    city.<br><br>The combination of 1-, 2- and 3-bedroom apartments, plus a stunning
                                    3-bedroom
                                    penthouse, provide all the facilities needed for an indulgent sunshine getaway, or a
                                    longer-
                                    term stay. Each apartment is stylishly designed, with the attention to detail and
                                    quality you
                                    would expect from Cheval. Fully equipped kitchens can be found in all, and most feature
                                    their
                                    own terrace or balcony, providing the perfect place to unwind with a long, cool drink
                                    and watch
                                    the sun set over the iconic Dubai Skyline. A 24-hour gym and rooftop pool provide an
                                    alternative
                                    for guests looking for something more active in their downtime.<br><br>The apartments
                                    are part
                                    of the Golden Mile residential complex, situated on the western trunk of Palm Jumeirah
                                    and
                                    ideally located to explore the city. Underground parking is available to guests. The
                                    Palm
                                    Monorail, just one minutes walk from the apartments, connects the key landmarks of the
                                    Palm
                                    Jumeirah and is easily accessible from Nakheel Mall. It also provides easy access to the
                                    metro
                                    system for those looking to connect with the rest of the city. For those looking to stay
                                    closer
                                    to home, the Nakheel Mall, with 300 retail outlets, is just next door, and top visitor
                                    attractions such as AquaVenture Waterpark and Pointe Palm are all close by.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="hotel-map">
                                <iframe
                                    src="https://maps.google.com/maps?q='+The Walk, Jumeirah Beach Residence, P.O. Box 2431, Dubai, United Arab Emirates+'&amp;output=embed"
                                    width="100%" height="490" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">

                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="hotel-detail-box editorial-section">
                        <div class="notice-wrapper">

                            <!-- Item 1 -->
                            <div class="notice-item">
                                <div class="notice-number">01</div>
                                <div class="notice-text">
                                    <p>Please be informed that there will be an all-day dining cafe serving hot
                                        breakfast daily and a selection of snacks, drinks, and light bites during the
                                        day.</p>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="notice-item">
                                <div class="notice-number">02</div>
                                <div class="notice-text">
                                    <p>Please note that as Dubai continues to enhance itself as a holiday destination,
                                        there are many exciting hotel and leisure infrastructure developments currently
                                        underway. Areas including Dubai Marina, Downtown Dubai, Habtoor City, JBR, and
                                        The Palm are part of an evolving landscape.</p>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="notice-item">
                                <div class="notice-number">03</div>
                                <div class="notice-text">
                                    <p>Children under the age of 5 are only allowed to use main swimming pools with the
                                        mandatory presence of an adult guardian inside the pool. Children must wear
                                        swimming vests.</p>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="notice-item">
                                <div class="notice-number">04</div>
                                <div class="notice-text">
                                    <p>Please be advised that there will be a Tourism Tax payable per room, per night at
                                        the hotel.</p>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="notice-item">
                                <div class="notice-number">05</div>
                                <div class="notice-text">
                                    <p>Please ensure you select the room type and board basis you wish to avail for the
                                        duration of your stay.</p>
                                </div>
                            </div>

                            <!-- Item 6 -->
                            <div class="notice-item">
                                <div class="notice-number">06</div>
                                <div class="notice-text">
                                    <p>Travelling during Ramadan: Ramadan is a culturally wonderful time to visit.
                                        Visitors are advised to respect those fasting by refraining from eating,
                                        drinking, or smoking in public during daylight hours.</p>
                                </div>
                            </div>

                            <!-- Item 7 -->
                            <div class="notice-item">
                                <div class="notice-number">07</div>
                                <div class="notice-text">
                                    <p>Please be informed that in the event of cancellation of existing bookings, there
                                        will be no reconfirmation under the same guest’s name.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="continue-bar">
        <div class="container">
            <div class="continue-bar-padding">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="details-wrapper">
                            <div class="details">
                                <div class="total">Total</div>
                                <div><span class="dirham">D</span><span class="total-price">145</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="details-btn-wrapper">
                            <a href="" type="button" class="btn-primary-custom">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
