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

    hotelsDataPromise.then(({
        provinces,
        locations
    }) => {
        const dubai = provinces.find(p => p.name.toLowerCase() === 'dubai');
        console.log('Dubai province:', dubai);
        console.log('Dubai province_id:', dubai?.id);
        console.log('Locations with that province_id:', locations.filter(l => l.province_id === dubai?.id));
        console.log('Sample location:', locations.find(l => l.name === 'Dubai Marina'));
    });

    const formatResults = ({
        countries,
        provinces,
        locations,
        hotels = []
    }) => ({
        destinations: {
            countries,
            provinces,
            locations
        },
        hotels: {
            hotels
        }
    });

    window.HotelGlobalSearchAPI = async qRaw => {
        const q = qRaw.trim().toLowerCase();

        if (!q) return formatResults({
            countries: [],
            provinces: [],
            locations: [],
            hotels: []
        });

        const {
            countries,
            provinces,
            locations
        } = await hotelsDataPromise;


        const exactMatch1 = (arr, key, q) =>
            arr.find(o => {
                const value = o[key];
                return value && value.toLowerCase().trim() === q;
            });

        const startsWith1 = (arr, key, q) =>
            arr.filter(o => {
                const value = o[key];
                return value && value.toLowerCase().startsWith(q);
            });

        const byField1 = (arr, field, value) =>
            arr.filter(o => o[field] === value);

        // COUNTRY EXACT
        const cMatch = exactMatch1(countries, 'name', q);
        if (cMatch) {
            const provs = byField1(provinces, 'country_id', cMatch.id);
            provs.unshift({
                ...cMatch,
                name: cMatch.name
            });

            return formatResults({
                countries: [],
                provinces: provs,
                locations: [],
                hotels: []
            });
        }

        // PROVINCE EXACT
        const pMatch = exactMatch1(provinces, 'name', q);
        if (pMatch) {
            const locs = byField1(locations, 'province_id', pMatch.id);

            return formatResults({
                countries: [],
                provinces: [pMatch],
                locations: locs,
                hotels: []
            });
        }

        // LOCATION EXACT
        const lMatch = exactMatch1(locations, 'name', q);
        const ls = startsWith1(locations, 'name', q);
        if (lMatch) {
            const rest = ls.filter(l => l.id !== lMatch.id);
            try {
                const {
                    data: hotelsForLocation
                } = await axios.get(
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
        const cs = startsWith1(countries, 'name', q);
        const ps = startsWith1(provinces, 'name', q);

        // Direct hotel search if nothing matches
        if (!cs.length && !ps.length && !ls.length) {
            try {
                const {
                    data
                } = await axios.get(`{{ url('hotels/search-hotels') }}?q=${q}`);
                return formatResults({
                    countries: [],
                    provinces: [],
                    locations: [],
                    hotels: data
                });
            } catch (error) {
                console.error('Error fetching hotels directly:', error);
                return formatResults({
                    countries: [],
                    provinces: [],
                    locations: [],
                    hotels: []
                });
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
