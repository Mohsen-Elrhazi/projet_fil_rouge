@extends('layouts.app')
@section('title', 'Mes conversations')

@section('content-main')
<div class="max-w-2xl mx-auto my-8 px-4">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
            <h1 class="text-white font-semibold text-xl">Mes conversations</h1>
        </div>

        <div class="divide-y divide-gray-200 overflow-y-auto max-h-[calc(100vh-200px)]">
            @if($conversations->count() > 0)
            @foreach($conversations as $conversation)
            <a href="{{ route('chat.show', $conversation->contact) }}" class="block hover:bg-gray-50">
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div
                            class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($conversation->contact->profile && $conversation->contact->profile->avatar)
                            <img src="{{ asset('storage/' . $conversation->contact->profile->avatar) }}"
                                alt="{{ $conversation->contact->name }}" class="h-full w-full object-cover">
                            @else
                            <img src="{{ asset('images/profile-avatar.jpg') }}" alt="{{ $conversation->contact->name }}"
                                class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div>
                            <h2 class="font-medium text-gray-900">{{ $conversation->contact->name }}</h2>
                            <p class="text-sm text-gray-500 truncate max-w-xs">
                                @if($conversation->last_message)
                                {{ $conversation->last_message->content }}
                                @else
                                <span class="italic">Aucun message</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-xs text-gray-500">
                            @if($conversation->last_message)
                            {{ $conversation->last_message->created_at->format('H:i') }}
                            @else
                            {{ $conversation->created_at->format('d/m/Y') }}
                            @endif
                        </span>
                        @if($conversation->unread_count > 0)
                        <span class="mt-1 bg-blue-500 text-white text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $conversation->unread_count }}
                        </span>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <div class="p-8 text-center text-gray-500">
                <p>Vous n'avez pas encore de conversations.</p>
                <a href="{{ route('contacts.index') }}"
                    class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                    Démarrer une conversation
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Styliser le texte tronqué */
.truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
@endpush