<script>
    const GlobalSearch = createApp({
        setup() {
            const count = ref(0);

            return {
                count,
            };
        },
    });
    GlobalSearch.mount('#global-search');
</script>
