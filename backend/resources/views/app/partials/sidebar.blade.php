<aside
    class="fixed top-0 left-0 z-40 h-screen pt-34 transition-transform duration-300 bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700 "
    aria-label="Sidenav" id="drawer-navigation">
    <!-- Ajout du bouton de toggle -->
    <button id="toggle-sidebar"
        class="w-8 h-8 absolute left-4 top-22 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full p-1 flex items-center justify-center z-50 cursor-pointer">
        <i id="toggle-icon" class="fas fa-chevron-right text-gray-500 dark:text-gray-400"></i>
    </button>

    <!-- Navigation verticale avec logo -->
    <div class="h-full bg-white flex flex-col items-center py-4 dark:bg-gray-800 nav-container" id="sidebar-content">
        <!-- Logo / Icône principale -->
        <!-- <div class="mb-6 flex items-center justify-center w-full">
                    <div class="w-10 h-10 flex items-center justify-center bg-blue-600 text-white rounded-full">
                        <i class="fas fa-play"></i>
                    </div>
                    <span class="ml-3 text-gray-800 dark:text-white font-medium hidden nav-text">Dashboard</span>
                </div> -->

        <!-- Navigation icons -->
        <nav class="flex flex-col items-center space-y-6 w-full">
            <a href="{{ route('app.contacts.index') }}"
                class="w-full flex items-center px-3 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-white">
                <div class="w-10 h-10 flex items-center justify-center">
                    <i class="fa-solid fa-users"></i>
                </div>
                <span class="ml-3 hidden nav-text">Contacts</span>
            </a>

            <a href="{{ route('app.chat.discussions.index') }}"
                class="w-full flex items-center px-3 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-white">
                <div class="w-10 h-10 flex items-center justify-center">
                    <i class="fa-solid fa-comment"></i>
                </div>
                <span class="ml-3 hidden nav-text">Discussions</span>
            </a>

            <a href="#"
                class="w-full flex items-center px-3 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-white">
                <div class="w-10 h-10 flex items-center justify-center">
                    <i class="fa-solid fa-user-group"></i>
                </div>
                <span class="ml-3 hidden nav-text">Groups</span>
            </a>

            <a href="#"
                class="w-full flex items-center px-3 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-white">
                <div class="w-10 h-10 flex items-center justify-center">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <span class="ml-3 hidden nav-text">Calls</span>
            </a>


        </nav>
    </div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('drawer-navigation');
    const toggleIcon = document.getElementById('toggle-icon');
    const navTexts = document.querySelectorAll('.nav-text');
    let isExpanded = false;

    toggleButton.addEventListener('click', function() {
        isExpanded = !isExpanded;

        if (isExpanded) {
            // Élargir la barre
            sidebar.style.width = '220px';
            toggleIcon.classList.remove('fa-chevron-right');
            toggleIcon.classList.add('fa-chevron-left');

            // Afficher les textes
            navTexts.forEach(text => {
                text.classList.remove('hidden');
            });
        } else {
            // Réduire la barre
            sidebar.style.width = '64px';
            toggleIcon.classList.remove('fa-chevron-left');
            toggleIcon.classList.add('fa-chevron-right');

            // Cacher les textes
            navTexts.forEach(text => {
                text.classList.add('hidden');
            });
        }
    });
});
</script>