@extends('layouts.app')
@section('title', 'Mes conversations')

@section('content-main')
<!-- start diviser page conversation -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full h-full overflow-y-auto">
    <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 flex flex-col overflow-hidden">

        <!-- Header fixe -->
        <div class="bg-gray-100 px-3 py-1.5  ">
            <!-- @yield("content1-header") -->
            <p>conversation</p>
        </div>

        <!-- Contenu avec défilement -->
        <div class="flex-1 overflow-y-auto ">
            <!-- @yield('content1-body') -->
            <div class="max-w-2xl mx-auto my-8 ">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
                        <h1 class="text-white font-semibold text-xl">Mes conversations</h1>
                    </div> -->

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
                                        <img src="{{ asset('images/profile-avatar.jpg') }}"
                                            alt="{{ $conversation->contact->name }}" class="h-full w-full object-cover">
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
                                    <span
                                        class="mt-1 bg-blue-500 text-white text-xs font-medium px-2 py-0.5 rounded-full">
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
        </div>
    </div>


    <!-- Deuxième élément -->
    <div
        class="md:col-span-2 lg:col-span-3 border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 overflow-y-auto">
        @if(!Route::is('chat.show'))
        <div class="w-full p-2 text-center overflow-hidden">
            <h1 class="text-2xl font-bold text-gray-800">Bienvenue dans vos conversations</h1>
            <p class="text-gray-600 mt-2">Sélectionnez une conversation pour afficher les messages</p>
            <img src="{{ asset('images/illustration.avif') }}" alt="Image de conversation"
                class="w-1/2 h-auto mx-auto -z-10 ">
        </div>
        @endif
        @yield('show-conversation')
    </div>
</div>



</div>
<!-- end diviser page conversation -->

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