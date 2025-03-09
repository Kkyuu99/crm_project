<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterButton = document.getElementById('filter-button');
        const filterForm = document.getElementById('filter-form');

        if (filterButton && filterForm) {
            filterButton.addEventListener('click', function() {
                filterForm.classList.toggle('hidden');
            });
        }
    });
</script>