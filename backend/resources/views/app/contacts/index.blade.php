@extends('app.layouts.app')
@section('title', 'Home Page')

@section('content1-header')
<div class="grid grid-rows-2 gap-1 ">
    <div class="flex  items-center justify-between ">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Contact</h5>
        <!-- modal add contact -->
        <button data-modal-target="large-modal" data-modal-toggle="large-modal"
            class="block w-full md:w-auto p-1.5 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 cursor-pointer"
            type="button">
            <i class="fa-solid fa-user-plus text-lg"></i>
        </button>

        <!-- large modal -->
        <div id="large-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-hidden md:inset-0 h-screen">
            <div class="relative w-full max-w-4xl h-full flex items-start justify-center">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 w-full max-h-[90vh] flex flex-col">
                    <!-- Modal header - fixed -->
                    <div
                        class="sticky top-0 z-10 flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 bg-white dark:bg-gray-700">
                        <div class="w-full mr-8">
                            <form id="searchForm" class="w-full md:w-3/4 lg:w-3/4">
                                <div class="flex">
                                    <div class="relative w-full">
                                        <input type="search" name="query" id="search-query"
                                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                            placeholder="Search for city or address" required />
                                        <button type="submit"
                                            class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="large-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body - scrollable -->
                    <div class="overflow-y-auto flex-grow py-4 px-2 md:p-5 space-y-4">
                        <div id="search-results" class="space-y-4">
                            <div class="flex items-center justify-center h-full">
                                <p class="text-gray-500 dark:text-gray-400">Enter search terms to find contacts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal -->
    </div>

    <div>
        <!-- serch -->
        <form class="flex items-center gap-2  max-w-sm mx-auto">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-user text-gray-500"></i>
                </div>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search contact name..." required />
            </div>
            <button type="submit"
                class="p-2  text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>

                <span class="sr-only">Search</span>
            </button>
        </form>
        <!-- fin search -->
    </div>



</div>
@endsection

@section('content1-body')
<div class="w-full max-w-md  bg-white rounded-lg shadow-sm sm:px-4 dark:bg-gray-800 dark:border-gray-700 ">

    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Neil Sims
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $320
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-4.jpg" alt="Bonnie image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Bonnie Green
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $3467
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Michael image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Michael Gough
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $67
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>

            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>


        </ul>
    </div>
</div>
@endsection

@section('content2')



@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-query');
    const searchResults = document.getElementById('search-results');
    let timeoutId = null;

    // Fonction pour effectuer la recherche
    function performSearch(query) {
        // Afficher le chargement
        searchResults.innerHTML =
            '<div class="flex justify-center"><div class="animate-spin inline-block w-8 h-8 border-4 rounded-full border-gray-300 border-t-blue-600"></div></div>';

        // Requête AJAX
        fetch(`{{ route('contacts.search') }}?query=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(html => {
                searchResults.innerHTML = html;
            })
            .catch(error => {
                searchResults.innerHTML =
                    '<div class="text-center text-red-500">An error occurred while searching.</div>';
            });
    }

    // Écouteur d'événement sur l'input pour la recherche en temps réel
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(timeoutId);

            const query = this.value.trim();

            // Message par défaut si vide
            if (query === '') {
                searchResults.innerHTML =
                    '<div class="text-center text-gray-500">Enter search terms to find contacts.</div>';
                return;
            }

            // Attendre un peu avant de lancer la recherche
            timeoutId = setTimeout(() => {
                performSearch(query);
            }, 300);
        });
    }

    // Garder la gestion du formulaire pour compatibilité
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            performSearch(searchInput.value);
        });
    }
});
</script>