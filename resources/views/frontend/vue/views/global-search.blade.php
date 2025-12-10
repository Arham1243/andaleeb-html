<div class="global-search">
    <div class="container">
        <div id="pills-tab" role="tablist">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ul class="search-pills-wrapper">
                        <li role="presentation">
                            <button class="search-pill active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Flight</button>
                        </li>
                        <li role="presentation">
                            <button class="search-pill" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Hotels</button>
                        </li>
                        <li role="presentation">
                            <button class="search-pill" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">Insurance</button>
                        </li>
                        <li>
                            <a href="#" class="search-pill">UAE Visa</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="global-search-content tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="d-flex align-items-center gap-4">
                                <div class="radio-btn">
                                    <input v-model="tripType" type="radio" id="one-way" class="radio-btn__input"
                                        name="trip_type" value="one-way">
                                    <label class="radio-btn__label" for="one-way">One way</label>
                                </div>
                                <div class="radio-btn">
                                    <input v-model="tripType" type="radio" id="round-trip" class="radio-btn__input"
                                        name="trip_type" value="round-trip">
                                    <label class="radio-btn__label" for="round-trip">Round Trip</label>
                                </div>
                                <div class="radio-btn">
                                    <input v-model="tripType" type="radio" id="multi-city" class="radio-btn__input"
                                        name="trip_type" value="multi-city">
                                    <label class="radio-btn__label" for="multi-city">Multi-City</label>
                                </div>
                            </div>
                            <div class="search-options" v-if="tripType === 'multi-city'">
                                multi city
                            </div>
                            <div class="search-options" v-else>
                                <form class="search-options-wrapper">
                                    <input type="hidden" :value="pax.adults" name='adults'>
                                    <input type="hidden" :value="pax.children" name='children'>
                                    <input type="hidden" :value="pax.infants" name='infants'>
                                    <div class="departure-wrapper position-relative" ref="fromWrapperRef">
                                        <div class="search-box search-border cursor-pointer"
                                            @click.stop="onFromBoxClick">
                                            <div class="search-box__label">From</div>
                                            <input type="text" autocomplete="off" class="search-box__input"
                                                v-model="fromInputValue" @input="fromQuery = fromInputValue"
                                                placeholder="Departure" ref="fromInputRef">
                                            <div class="search-box__label">
                                                @{{ selectedFrom?.name || '[Select Airport]' }}
                                            </div>
                                        </div>

                                        <div class="options-dropdown-wrapper scroll"
                                            :class="{ open: fromDropdownOpen }">
                                            <div class="options-dropdown">
                                                <div class="options-dropdown__header"><span>Select Airport</span></div>
                                                <div class="options-dropdown__body p-0">
                                                    <ul class="options-dropdown-list">
                                                        <!-- Loading Skeleton -->
                                                        <li v-if="loadingFrom"
                                                            class="options-dropdown-list__item no-hover"
                                                            v-for="n in 7" :key="'dep-skel-' + n">
                                                            <div class="skeleton"></div>
                                                        </li>

                                                        <!-- No Matches -->
                                                        <li v-else-if="!filteredFromAirports.length"
                                                            class="options-dropdown-list__item no-hover">
                                                            <div
                                                                class="options-dropdown__header justify-content-center">
                                                                <span class="text-danger" style="font-weight:500;">No
                                                                    Matches Found</span>
                                                            </div>
                                                        </li>

                                                        <!-- Airport Items -->
                                                        <li v-else class="options-dropdown-list__item"
                                                            v-for="airport in filteredFromAirports"
                                                            :key="airport.code"
                                                            @click="selectFrom(airport, toggleFromDropdown)">
                                                            <div class="icon"><i class="bx bx-map"></i></div>
                                                            <div class="info">
                                                                <div class="name">@{{ airport.name }}</div>
                                                                <span class="sub-text">@{{ airport.city }},
                                                                    @{{ airport.country }}
                                                                    (@{{ airport.code }})</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="arrival-wrapper position-relative" ref="toWrapperRef">
                                        <div class="search-box search-border cursor-pointer"
                                            @click.stop="onToBoxClick">
                                            <div class="search-box__label">To</div>
                                            <input type="text" autocomplete="off" class="search-box__input"
                                                v-model="toInputValue" @input="toQuery = toInputValue"
                                                placeholder="Destination" ref="toInputRef">
                                            <div class="search-box__label">
                                                @{{ selectedTo?.name || '[Select Airport]' }}
                                            </div>
                                        </div>

                                        <div class="options-dropdown-wrapper scroll" :class="{ open: toDropdownOpen }">
                                            <div class="options-dropdown">
                                                <div class="options-dropdown__header"><span>Select Airport</span></div>
                                                <div class="options-dropdown__body p-0">
                                                    <ul class="options-dropdown-list">

                                                        <!-- Loading -->
                                                        <li v-if="loadingTo"
                                                            class="options-dropdown-list__item no-hover"
                                                            v-for="n in 7" :key="'to-skel-' + n">
                                                            <div class="skeleton"></div>
                                                        </li>

                                                        <!-- No Matches -->
                                                        <li v-else-if="!filteredToAirports.length"
                                                            class="options-dropdown-list__item no-hover">
                                                            <div
                                                                class="options-dropdown__header justify-content-center">
                                                                <span class="text-danger" style="font-weight:500;">
                                                                    No Matches Found
                                                                </span>
                                                            </div>
                                                        </li>

                                                        <!-- Actual Airport Items -->
                                                        <li v-else class="options-dropdown-list__item"
                                                            v-for="airport in filteredToAirports"
                                                            :key="airport.code"
                                                            @click="selectTo(airport, toggleToDropdown)">
                                                            <div class="icon">
                                                                <i class="bx bx-map"></i>
                                                            </div>
                                                            <div class="info">
                                                                <div class="name">@{{ airport.name }}</div>
                                                                <span class="sub-text">
                                                                    @{{ airport.city }}, @{{ airport.country }}
                                                                    (@{{ airport.code }})
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search-box search-border cursor-pointer" id="departure-box">
                                        <div class="search-box__label">
                                            Departure
                                        </div>
                                        <input readonly autocomplete="off" type="text" class="search-box__input"
                                            name="departure" ref="departureDate" placeholder="Departure on"
                                            id="departure-input">
                                        <div class="search-box__label" id='departure-day'>

                                        </div>
                                    </div>
                                    <div class="search-box search-border cursor-pointer" id="return-box">
                                        <div class="search-box__label">
                                            Return
                                        </div>
                                        <input type="text" autocomplete="off" class="search-box__input"
                                            placeholder="Return on" ref="returnDate" name="return"
                                            id="return-input">
                                        <div class="search-box__label" id='return-day'>

                                        </div>
                                    </div>
                                    <div class="pax-wrapper position-relative" ref="paxRef">
                                        <div class="search-box search-border cursor-pointer" @click.stop="togglePax">
                                            <div class="search-box__label">
                                                Travellers
                                            </div>
                                            <input readonly type="text" class="search-box__input"
                                                :value="totalTravellerText">
                                        </div>
                                        <div class="options-dropdown-wrapper options-dropdown-wrapper--pax"
                                            :class="{ open: paxOpen }">
                                            <div class="options-dropdown options-dropdown--norm">
                                                <div class="options-dropdown__body">
                                                    <div class="room-wrapper-search">
                                                        <div class="room-section room-template">
                                                            <ul class="paxs-list mt-0">
                                                                <!-- Adults -->
                                                                <li class="paxs-item">
                                                                    <div class="info">
                                                                        <div class="name">Adult(s)</div>
                                                                        <span>18+ years</span>
                                                                    </div>
                                                                    <div class="quantity-counter">
                                                                        <button type="button"
                                                                            class="quantity-counter__btn"
                                                                            @click.stop="decrement('adults')">
                                                                            <i class="bx bx-minus"></i>
                                                                        </button>

                                                                        <input readonly type="number"
                                                                            class="quantity-counter__btn quantity-counter__btn--quantity"
                                                                            :value="pax.adults" />

                                                                        <button type="button"
                                                                            class="quantity-counter__btn"
                                                                            @click.stop="increment('adults')">
                                                                            <i class="bx bx-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </li>

                                                                <!-- Children -->
                                                                <li class="paxs-item">
                                                                    <div class="info">
                                                                        <div class="name">Children</div>
                                                                        <span>above 2 years</span>
                                                                    </div>
                                                                    <div class="quantity-counter">
                                                                        <button type="button"
                                                                            class="quantity-counter__btn"
                                                                            @click.stop="decrement('children')">
                                                                            <i class="bx bx-minus"></i>
                                                                        </button>

                                                                        <input readonly type="number"
                                                                            class="quantity-counter__btn quantity-counter__btn--quantity"
                                                                            :value="pax.children" />

                                                                        <button type="button"
                                                                            class="quantity-counter__btn"
                                                                            @click.stop="increment('children')">
                                                                            <i class="bx bx-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </li>

                                                                <!-- Infants -->
                                                                <li class="paxs-item">
                                                                    <div class="info">
                                                                        <div class="name">Infant(s)</div>
                                                                        <span>below 2 years</span>
                                                                    </div>
                                                                    <div class="quantity-counter">
                                                                        <button type="button"
                                                                            class="quantity-counter__btn"
                                                                            @click.stop="decrement('infants')">
                                                                            <i class="bx bx-minus"></i>
                                                                        </button>

                                                                        <input readonly type="number"
                                                                            class="quantity-counter__btn quantity-counter__btn--quantity"
                                                                            :value="pax.infants" />

                                                                        <button type="button"
                                                                            class="quantity-counter__btn"
                                                                            @click.stop="increment('infants')">
                                                                            <i class="bx bx-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search-button">
                                        <button :disabled="!isFlightSearchEnabled"
                                            class="themeBtn themeBtn--primary">Search</button>
                                    </div>
                                </form>
                                <div class="radio-btn">
                                    <input type="checkbox" id="direct-flights" class="radio-btn__input"
                                        name="is_direct_flight" value="true">
                                    <label class="radio-btn__label" for="direct-flights">Direct Flights</label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">2</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">3</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
