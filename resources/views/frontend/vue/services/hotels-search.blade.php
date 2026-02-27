<script>
    const hotelsDataPromise = Promise.all([
        fetch("{{ asset('frontend/mocks/yalago_countries.json') }}").then(r => r.json()),
        fetch("{{ asset('frontend/mocks/yalago_provinces.json') }}").then(r => r.json()),
        fetch("{{ asset('frontend/mocks/yalago_locations.json') }}").then(r => r.json())
    ]).then(([countries, provinces, locations]) => ({
        countries,
        provinces,
        locations
    }));

    const byField = (arr, field, value) =>
        arr.filter(o => o[field] === value);

    const formatResults = ({ countries, provinces, locations, hotels = [] }) => ({
        destinations: { countries, provinces, locations },
        hotels: { hotels }
    });

    window.HotelGlobalSearchAPI = async qRaw => {
        const q = qRaw.trim().toLowerCase();

        if (!q) return formatResults({ countries: [], provinces: [], locations: [], hotels: [] });

        const { countries, provinces, locations } = await hotelsDataPromise;

        // COUNTRY EXACT
        const cMatch = exactMatch(countries, 'name', q);
        if (cMatch) {
            const provs = byField(provinces, 'country_id', cMatch.id);
            provs.unshift({ ...cMatch, name: cMatch.name });

            return formatResults({
                countries: [],
                provinces: provs,
                locations: [],
                hotels: []
            });
        }

        // PROVINCE EXACT
        const pMatch = exactMatch(provinces, 'name', q);
        if (pMatch) {
            const locs = byField(locations, 'province_id', pMatch.id);
            locs.unshift({ ...pMatch, name: pMatch.name });

            return formatResults({
                countries: [],
                provinces: [],
                locations: locs,
                hotels: []
            });
        }

        // LOCATION EXACT
        const lMatch = exactMatch(locations, 'name', q);
        const ls = startsWith(locations, 'name', q);
        if (lMatch) {
            const rest = ls.filter(l => l.id !== lMatch.id);
            try {
                const { data: hotelsForLocation } = await axios.get(
                    `{{ url('hotels/search-hotels') }}?location_id=${lMatch.id}`
                );
                return formatResults({
                    countries: [],
                    provinces: [],
                    locations: [lMatch, ...rest],
                    hotels: hotelsForLocation
                });
            } catch (error) {
                console.error('Error fetching hotels for location:', error);
                return formatResults({
                    countries: [],
                    provinces: [],
                    locations: [lMatch, ...rest],
                    hotels: []
                });
            }
        }

        // PARTIAL MATCHES
        const cs = startsWith(countries, 'name', q);
        const ps = startsWith(provinces, 'name', q);

        // Direct hotel search if nothing matches
        if (!cs.length && !ps.length && !ls.length) {
            try {
                const { data } = await axios.get(`{{ url('hotels/search-hotels') }}?q=${q}`);
                return formatResults({
                    countries: [],
                    provinces: [],
                    locations: [],
                    hotels: data
                });
            } catch (error) {
                console.error('Error fetching hotels directly:', error);
                return formatResults({ countries: [], provinces: [], locations: [], hotels: [] });
            }
        }

        return formatResults({
            countries: cs,
            provinces: ps,
            locations: ls,
            hotels: []
        });
    };
</script>