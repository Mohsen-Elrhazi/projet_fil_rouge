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
    <div class="w-full max-w-md bg-white rounded-lg shadow-sm sm:px-4 dark:bg-gray-800 dark:border-gray-700">
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($conversations as $conversation)
                    <li class="py-3 sm:py-4 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"
                        id="conversation-{{ $conversation->id }}">
                        <a href="{{ route('app.chat.discussions.show', $conversation->id) }}" class="flex items-center">
                            <div class="shrink-0">
                                @if($conversation->profile)
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ asset('storage/' . $conversation->profile->avatar) }}" alt="Profile">
                                @else
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('images/avatar profile.jpg') }}"
                                        alt="Profile">
                                @endif
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $conversation->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400 message-preview">
                                    {{ $conversation->last_message->message ?? '' }}
                                </p>
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 timestamp">
                                {{ optional($conversation->last_message)->created_at->diffForHumans() ?? '' }}
                            </div>
                        </a>
                    </li>
                @empty
                    <li class="py-4 text-center text-gray-500 dark:text-gray-400">
                        Aucune conversation trouvée
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection

@section('content2')

    <h1 class="flex justify-center items-center w-full h-full">Welcome to Lightning </h1>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
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
            searchInput.addEventListener('input', function () {
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
            searchForm.addEventListener('submit', function (e) {
                e.preventDefault();
                performSearch(searchInput.value);
            });
        }
    });
</script>

@push('scripts')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialiser Pusher
            const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
                cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
                forceTLS: true
            });

            const currentUserId = {{ auth()->id() }};

            // Écouter tous les canaux de conversation où l'utilisateur est impliqué
            @foreach($conversations as $conversation)
                (() => {
                    const otherUserId = {{ $conversation->id }};
                    const user1ID = Math.min(currentUserId, otherUserId);
                    const user2ID = Math.max(currentUserId, otherUserId);
                    const channelName = `chat-${user1ID}-${user2ID}`;

                    const channel = pusher.subscribe(channelName);

                    channel.bind('message.sent', function (data) {
                        console.log('Message reçu sur la liste des conversations:', data);

                        // Mettre à jour le dernier message et l'horodatage pour cette conversation
                        const conversationItem = document.getElementById(`conversation-${otherUserId}`);
                        if (conversationItem) {
                            // Mettre à jour le texte du dernier message
                            const messagePreview = conversationItem.querySelector('.message-preview');
                            if (messagePreview) {
                                messagePreview.textContent = data.message;
                            }

                            // Mettre à jour l'horodatage
                            const timestamp = conversationItem.querySelector('.timestamp');
                            if (timestamp) {
                                timestamp.textContent = 'à l\'instant';
                            }

                            // Mettre la conversation en haut de la liste
                            const conversationList = conversationItem.parentNode;
                            conversationList.prepend(conversationItem);
                        }
                    });
                })();
            @endforeach
    });
    </script>
@endpush