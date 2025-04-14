// Gestion du toggle sidebar sur mobile
const sidebarToggleBtn = document.getElementById("sidebar-toggle");
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");

// Gestion du dropdown de profil
const profileToggle = document.getElementById("profile-dropdown-toggle");
const profileDropdown = document.getElementById("profile-dropdown");

// Toggle sidebar
sidebarToggleBtn?.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    overlay.classList.toggle("active");
});

// Fermer sidebar en cliquant sur l'overlay
overlay?.addEventListener("click", () => {
    sidebar.classList.remove("open");
    overlay.classList.remove("active");
});

// Toggle dropdown profil
profileToggle?.addEventListener("click", () => {
    profileDropdown.classList.toggle("dropdown-open");
});

// Fermer dropdown si on clique ailleurs
document.addEventListener("click", (event) => {
    if (
        !profileToggle?.contains(event.target) &&
        !profileDropdown?.contains(event.target)
    ) {
        profileDropdown?.classList.remove("dropdown-open");
    }
});
