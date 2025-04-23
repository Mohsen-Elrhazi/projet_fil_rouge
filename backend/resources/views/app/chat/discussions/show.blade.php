@extends('app.layouts.app')
@section('title', 'show discussion')

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
            <li id="conversation-{{ $conversation->id }}"
                class="py-3 sm:py-4 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
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
<div class="md:col-span-2 lg:col-span-3   flex flex-col h-full">
    <!-- Header fixe pour content2 -->
    <div class="bg-gray-100 px-3 py-2 border-b border-gray-300 dark:border-gray-600">
        <ul role="list" class="">
            <li class="">
                <div class="flex items-center">
                    <div class="shrink-0">
                        @if($receiver->profile)
                        <img class="w-12 h-12 rounded-full" src="{{asset('storage/' . $receiver->profile->avatar) }}"
                            alt="Profile photo">
                        @else
                        <img class="w-8 h-8 rounded-full" src="{{ asset('images/avatar profile.jpg') }}"
                            alt="Neil image">
                        @endif
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{  $receiver->name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$receiver->id  }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <i class="fa-solid fa-magnifying-glass hover:text-blue-500 cursor-pointer mr-5"></i>
                        <i class="fa-solid fa-phone hover:text-blue-500 cursor-pointer"></i>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Corps avec défilement pour content2 -->

    <div class="flex-1 overflow-y-auto p-3" id="chat-messages">
        @foreach($messages as $message)
        <div class="mb-4 flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
            <div
                class="max-w-xs md:max-w-md lg:max-w-lg rounded-lg px-4 py-2 
                    {{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                {{ $message->message }}
                <div class="text-xs mt-1 {{ $message->sender_id == auth()->id() ? 'text-blue-100' : 'text-gray-500' }}">
                    {{ $message->created_at->format('H:i') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <!-- Footer fixe pour content2 -->
    <div class="flex items-center gap-3 bg-gray-100 px-4 py-3 border-t border-gray-300 dark:border-gray-600">
        <!-- Bouton pour joindre des fichiers -->
        <div class="relative">
            <button id="dropdownTopButton" data-dropdown-toggle="dropdownTop" data-dropdown-placement="top"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-full p-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <i class="fas fa-paperclip"></i>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownTop"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownTopButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Photos</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Documents</a>
                    </li>
                </ul>
            </div>
        </div>

        <form id="message-form" method="post" action="{{ route('app.chat.discussions.sendMessage') }}"
            class="flex flex-grow items-center gap-3">
            @csrf
            <input type="hidden" name="receiver_id" value="{{$receiver->id}}">
            <div class="flex-grow">
                <input type="text" id="message-input" name="message"
                    class="w-full py-2.5 px-4 bg-white border border-gray-300 outline-none rounded-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tapez votre message...">
            </div>

            <button type="submit" id="send-button"
                class="p-2.5 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatMessages = document.getElementById('chat-messages');
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const senderID = {
        {
            auth() - > id()
        }
    };
    const receiverID = {
        {
            $receiver - > id
        }
    };

    // Défiler vers le bas des messages au chargement
    function scrollToBottom() {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    scrollToBottom();

    // Initialiser Pusher
    const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
        forceTLS: true
    });

    // Créer un nom de canal unique pour cette conversation entre ces deux utilisateurs
    const user1ID = Math.min(senderID, receiverID);
    const user2ID = Math.max(senderID, receiverID);
    const channelName = `chat-${user1ID}-${user2ID}`;

    console.log(`Subscribing to channel: ${channelName}`);

    // S'abonner au canal de conversation
    const channel = pusher.subscribe(channelName);

    // Écouter l'événement message.sent
    channel.bind('message.sent', function(data) {
        console.log('Message received via Pusher:', data);

        // Ne pas afficher le message si c'est celui que nous venons d'envoyer
        // L'interface utilisateur aura déjà affiché notre message localement
        if (data.sender_id == senderID && document.getElementById(`temp-msg-${data.id}`)) {
            console.log('Skipping message we just sent');
            return;
        }

        // Ajouter le message au chat
        const isFromMe = data.sender_id == senderID;
        const messageHTML = `
                    <div class="mb-4 flex ${isFromMe ? 'justify-end' : 'justify-start'}">
                        <div class="max-w-xs md:max-w-md lg:max-w-lg rounded-lg px-4 py-2 
                            ${isFromMe ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'}">
                            ${data.message}
                            <div class="text-xs mt-1 ${isFromMe ? 'text-blue-100' : 'text-gray-500'}">
                                ${formatTime(new Date(data.created_at))}
                            </div>
                        </div>
                    </div>
                `;

        chatMessages.insertAdjacentHTML('beforeend', messageHTML);
        scrollToBottom();

        // Mettre à jour la liste des conversations
        updateConversationsList(data);
    });

    // Fonction pour formatter l'heure
    function formatTime(date) {
        return date.getHours().toString().padStart(2, '0') + ':' +
            date.getMinutes().toString().padStart(2, '0');
    }

    // Intercepter la soumission du formulaire
    if (messageForm) {
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (!message) return;

            // Générer un ID temporaire pour ce message
            const tempID = 'temp-' + Date.now();

            // Afficher immédiatement le message dans l'UI
            const tempMessageHTML = `
                        <div id="temp-msg-${tempID}" class="mb-4 flex justify-end">
                            <div class="max-w-xs md:max-w-md lg:max-w-lg rounded-lg px-4 py-2 bg-blue-500 text-white">
                                ${message}
                                <div class="text-xs mt-1 text-blue-100">
                                    ${formatTime(new Date())}
                                </div>
                            </div>
                        </div>
                    `;

            chatMessages.insertAdjacentHTML('beforeend', tempMessageHTML);
            scrollToBottom();

            // Envoyer le message via AJAX
            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Message envoyé avec succès:', data);

                    // Remplacer l'ID temporaire par l'ID réel
                    const tempMsg = document.getElementById(`temp-msg-${tempID}`);
                    if (tempMsg) {
                        tempMsg.id = `msg-${data.message.id}`;
                    }

                    // Vider le champ de saisie
                    messageInput.value = '';
                    messageInput.focus();
                })
                .catch(error => {
                    console.error('Erreur lors de l\'envoi du message:', error);
                });
        });
    }

    // Ajouter code pour mettre à jour la liste des conversations
    function updateConversationsList(data) {
        // Trouver la conversation concernée dans la liste des conversations
        const otherUserId = data.sender_id == senderID ? data.receiver_id : data.sender_id;
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

            // Déplacer la conversation en haut de la liste
            const conversationList = conversationItem.parentNode;
            conversationList.prepend(conversationItem);
        }
    }
});
</script>
@endpush

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