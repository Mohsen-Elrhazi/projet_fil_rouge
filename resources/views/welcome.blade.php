@extends('layouts.app')
@section('title', 'Chat - Discussion')

@section('content-main')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        Conversation avec {{ $contact->name }}
                    </div>

                    <div class="card-body">
                        <div id="messages" class="messages">
                            @foreach($messages as $message)
                                <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                                    <div class="message-content">
                                        <p>{{ $message->content }}</p>
                                        <small>{{ $message->created_at->format('H:i') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <form id="message-form">
                            @csrf
                            <div class="input-group mt-3">
                                <input type="text" name="content" id="message-input" class="form-control" required>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                    </div>

                    <!-- <div class="card-footer">
                        <div id="debug">
                            Chat ID: {{ $conversation->id }} | User: {{ auth()->id() }}
                        </div>
                    </div> -->
                </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            // Éléments DOM
            const form = document.getElementById('message-form');
            const input = document.getElementById('message-input');
            const messagesContainer = document.getElementById('messages');
            const debug = document.getElementById('debug');

            // Variables importantes - Une autre approche pour éviter les problèmes d'espaces
            const conversationId = Number("{{ $conversation->id }}");
            const currentUserId = Number("{{ auth()->id() }}");
            const sendUrl = "{{ route('chat.send', $contact) }}";

            // Fonction pour ajouter un message à l'interface
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
            form.addEventListener('submit', async function (e) {
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

            // Faire défiler vers le bas
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Écouter les événements Pusher
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