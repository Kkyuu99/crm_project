function dropdown(menuId) {
    const submenu = document.getElementById(`submenu-${menuId}`);
    const arrow = document.getElementById(`arrow-${menuId}`);

    submenu.classList.toggle('hidden'); // Toggle the 'hidden' class
    arrow.classList.toggle('bi-chevron-down'); // Toggle the arrow icon
    arrow.classList.toggle('bi-chevron-up');
}

// Optionally close other dropdowns when one is opened
document.addEventListener('click', function(event) {
    const openDropdowns = document.querySelectorAll('[id^="submenu-"]:not(.hidden)');
    openDropdowns.forEach(function(openDropdown) {
        const menuId = openDropdown.id.substring(8); // Extract menu ID
        if (!event.target.closest(`#${menuId}`) && !event.target.closest(`#submenu-${menuId}`)) {
            dropdown(menuId);
        }
    });
});