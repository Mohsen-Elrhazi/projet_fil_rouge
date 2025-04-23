@extends('app.layouts.app')
@section('title', 'Home Page')

@section('content1-header')
<div class="grid grid-rows-2 gap-1 ">
    <div class="flex  items-center justify-between ">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Discussions</h5>
        <!-- modal add contact -->
        <button data-modal-target="large-modal" data-modal-toggle="large-modal"
            class="block w-full md:w-auto p-1.5 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 cursor-pointer"
            type="button">
            <i class="fa-solid fa-user-plus text-lg"></i>
        </button>

        <!-- large modal -->
        @include('app.contacts.partials.search-modal')

        <!-- fin modal -->
    </div>

    <div>
        <!-- search -->
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
@yield('content1-body')
@endsection

@section('content2')
@yield('content2')
@yield('content2')

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
        fetch(`{{ route('app.contacts.search') }}?query=${encodeURIComponent(query)}`)
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