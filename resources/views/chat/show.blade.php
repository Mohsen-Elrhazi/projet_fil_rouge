@extends('chat.index')
@section('title', 'Chat - Discussion')

@section('show-conversation')
<div class="flex flex-col h-full w-full max-w-full mx-auto">
    <div class="bg-white  shadow-lg overflow-hidden flex flex-col h-full">
        <!-- En-tête du chat - fixé en haut -->
        <div class="bg-white p-2 flex items-center justify-between sticky top-0 z-10 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-white/20 flex items-center justify-center">
                        @if($contact->profile && $contact->profile->avatar)
                        <img src="{{ asset('storage/' . $contact->profile->avatar) }}" alt="Profile Picture"
                            class="w-full h-full rounded-full object-cover">
                        @else
                        <img src="{{ asset('images/profile-avatar.jpg') }}" alt="Profile Picture"
                            class="w-full h-full rounded-full object-cover">
                        @endif
                    </div>
                    <div class="ml-3 font-medium text-sm">
                        <h2 class="font-semibold">{{ $contact->name }}</h2>
                        <div class="flex items-center">
                            <!-- <span class="h-2 w-2 bg-green-400 rounded-full"></span> -->
                            <!-- <span class="text-xs text-white/80 ml-1">En ligne</span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex space-x-3">
                <button class="hover:text-black/80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Zone des messages - espace flexible qui prend tout l'espace disponible -->
        <div id="messages" class="flex-grow p-4 overflow-y-auto space-y-4 bg-gray-100"
            style="scrollbar-width: thin; scrollbar-color: #cbd5e1 #f1f1f1;">
            @foreach($messages as $message)
            <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div
                    class="{{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }} max-w-xs md:max-w-md rounded-2xl px-4 py-2 {{ $message->sender_id == auth()->id() ? 'rounded-tr-none' : 'rounded-tl-none' }}">
                    <p>{{ $message->content }}</p>
                    <div
                        class="text-xs mt-1 {{ $message->sender_id == auth()->id() ? 'text-blue-100' : 'text-gray-500' }} text-right">
                        {{ $message->created_at->format('H:i') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Zone de saisie - fixée en bas -->
        <div class="border-t border-gray-200 p-2 bg-white sticky bottom-0 z-10">
            <form id="message-form" class="flex items-center space-x-2">
                @csrf
                <button type="button" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </button>
                <div class="relative flex-grow">
                    <input type="text" name="content" id="message-input" placeholder="Écrivez votre message..."
                        class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <button type="button" class="absolute right-3 top-2 text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <button type="submit" class=" rounded-full p-2 ">
                    <i class="fa-regular fa-paper-plane text-gray-500 text-xl hover:text-gray-600"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="card-footer text-sm absolute -z-10 opacity-0 invisible">
        <div id="debug">
            Chat ID: {{ $conversation->id }} | User: {{ auth()->id() }}
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
.messages {
    height: 400px;
    overflow-y: auto;
    padding: 10px;
}

.message {
    margin-bottom: 10px;
    display: flex;
}

.message.sent {
    justify-content: flex-end;
}

.message-content {
    padding: 8px 12px;
    border-radius: 10px;
    max-width: 70%;
}

.sent .message-content {
    background-color: #007bff;
    color: white;
}

.received .message-content {
    background-color: #f1f1f1;
}

small {
    display: block;
    font-size: 0.8em;
    opacity: 0.7;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('message-form');
    const input = document.getElementById('message-input');
    const messagesContainer = document.getElementById('messages');
    const debug = document.getElementById('debug');

    const conversationId = Number("{{ $conversation->id }}");
    const currentUserId = Number("{{ auth()->id() }}");
    const sendUrl = "{{ route('chat.send', $contact) }}";

    function addMessageToChat(message) {
        const isSent = parseInt(message.sender_id) === currentUserId;
        const html = `
                    <div class="message ${isSent ? 'sent' : 'received'}">
                        <div class="message-content">
                            <p>${message.content}</p>
                            <small>${formatTime(message.created_at)}</small>
                        </div>
                    </div>
                `;
        messagesContainer.insertAdjacentHTML('beforeend', html);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Formater l'heure
    function formatTime(timestamp) {
        if (typeof timestamp === 'string') {
            if (/^\d{1,2}:\d{2}$/.test(timestamp)) {
                return timestamp;
            }
            try {
                const date = new Date(timestamp);
                return date.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            } catch (e) {
                return timestamp;
            }
        }
        return '';
    }

    // Gérer l'envoi du formulaire
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        if (input.value.trim() === '') return;

        try {
            const formData = new FormData(form);
            const response = await fetch(sendUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            console.log('Message envoyé:', data);

            if (data.status === 'success') {
                addMessageToChat(data.message);
                input.value = '';
            }
        } catch (error) {
            console.error('Erreur:', error);
            debug.textContent += ' | Erreur: ' + error.message;
        }
    });

    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    if (window.Echo) {
        debug.textContent += ' | Echo disponible';

        window.Echo.private(`chat.${conversationId}`)
            .listen('.MessageSent', (data) => {
                console.log('Message reçu:', data);

                if (!data || !data.message) {
                    console.error('Données de message invalides');
                    return;
                }

                if (parseInt(data.message.sender_id) !== currentUserId) {
                    addMessageToChat(data.message);
                    debug.textContent += ' | Message reçu';
                }
            });
    } else {
        debug.textContent += ' | Echo NON disponible';
        console.error('Laravel Echo n\'est pas disponible');
    }
});
</script>
@endpush