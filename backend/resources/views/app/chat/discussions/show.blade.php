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
        <div id="large-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-hidden md:inset-0 h-screen  ">
            <div class="relative w-full max-w-2xl h-full flex items-start justify-center">
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
<div class="w-full max-w-md  bg-white rounded-lg shadow-sm sm:px-4 dark:bg-gray-800 dark:border-gray-700 ">

    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">

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
            <div class="max-w-xs md:max-w-md lg:max-w-lg rounded-lg px-4 py-2 
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
                    placeholder="Tapez votre message..." required>
            </div>
            <button type="submit" id="send-button"
                class="p-2.5 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Recherche de contacts
    const searchInput = document.getElementById('search-query');
    const searchResults = document.getElementById('search-results');
    let timeoutId = null;

    function performSearch(query) {
        searchResults.innerHTML =
            '<div class="flex justify-center"><div class="animate-spin inline-block w-8 h-8 border-4 rounded-full border-gray-300 border-t-blue-600"></div></div>';

        fetch(`{{ route('app.contacts.search') }}?query=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                searchResults.innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
                searchResults.innerHTML =
                    '<div class="text-center text-red-500">Une erreur est survenue lors de la recherche.</div>';
            });
    }

    // Gestion de la recherche en temps réel
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(timeoutId);
            const query = this.value.trim();

            if (query === '') {
                searchResults.innerHTML =
                    '<div class="text-center text-gray-500">Entrez des termes pour rechercher des contacts.</div>';
                return;
            }

            timeoutId = setTimeout(() => performSearch(query), 300);
        });
    }

    // Gestion du formulaire de recherche
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            performSearch(searchInput.value);
        });
    }

    // Chat en temps réel
    const pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        forceTLS: true,
        authEndpoint: '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });

    const channel = pusher.subscribe('private-chat.{{ auth()->id() }}');

    channel.bind('App\\Events\\MessageSent', function(data) {
        const isSender = data.sender.id === {
            {
                auth() - > id()
            }
        };
        const messageDate = new Date(data.created_at);
        const messageHtml = `
            <div class="mb-4 flex ${isSender ? 'justify-end' : 'justify-start'}">
                <div class="max-w-xs md:max-w-md lg:max-w-lg rounded-lg px-4 py-2 
                    ${isSender ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'}">
                    ${data.message}
                    <div class="text-xs mt-1 ${isSender ? 'text-blue-100' : 'text-gray-500'}">
                        ${messageDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                    </div>
                </div>
            </div>
        `;

        const chatMessages = document.getElementById('chat-messages');
        if (chatMessages) {
            chatMessages.insertAdjacentHTML('beforeend', messageHtml);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    });

    // Envoi de message
    // Envoi de message via AJAX
    const messageForm = document.getElementById('message-form');
    if (messageForm) {
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const sendButton = this.querySelector('#send-button');
            const messageInput = this.querySelector('#message-input');

            sendButton.disabled = true;
            sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(response => {
                if (!response.ok) throw new Error('Erreur réseau');
                return response.json();
            }).then(data => {
                messageInput.value = ''; // Vide le champ
            }).catch(error => {
                console.error('Error:', error);
            }).finally(() => {
                sendButton.disabled = false;
                sendButton.innerHTML = '<i class="fas fa-paper-plane"></i>';
            });
        });
    }
    // Scroll automatique
    const chatMessages = document.getElementById('chat-messages');
    if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
</script>