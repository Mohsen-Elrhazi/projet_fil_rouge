@extends('layouts.app')
@section('title', 'Mes conversations')

@section('content-main')
<!-- start diviser page conversation -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4  w-full h-full overflow-y-auto">
    <!-- <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 flex flex-col overflow-hidden"> -->
    <div class=" flex flex-col overflow-hidden border-r border-gray-200">

        <!-- Header fixe -->
        <div class="bg-gray-100 px-3 py-1 ">
            <!-- @yield("content1-header") -->
            <div class="grid grid-rows-2 gap-1 ">
                <div class="flex  items-center justify-between ">
                    <h5 class="text-xl font-medium leading-none text-gray-900 dark:text-white">Discussions</h5>
                    <!-- modal add contact -->
                    <button data-modal-target="large-modal" data-modal-toggle="large-modal"
                        class="block w-full md:w-auto p-1.5 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 cursor-pointer"
                        type="button">
                        <i class="fa-solid fa-user-plus text-lg"></i>
                    </button>

                </div>

                <div>
                    <!-- search -->
                    <form class="flex items-center gap-2  max-w-sm mx-auto">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <!-- <i class="fa-solid fa-user text-gray-500"></i> -->
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search discussion name..." required />
                        </div>
                        <button type="submit"
                            class="p-2  text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>

                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                    <!-- fin search -->
                </div>



            </div>
        </div>

        <!-- Contenu avec défilement -->
        <div class="flex-1 overflow-y-auto " style="scrollbar-width: thin; scrollbar-color:rgb(229, 230, 232) #f1f1f1;">
            <!-- @yield('content1-body') -->
            <div class="max-w-2xl mx-auto  ">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
                        <h1 class="text-white font-semibold text-xl">Mes conversations</h1>
                    </div> -->

                    <div class="divide-y divide-gray-200 overflow-y-auto ">
                        @if($conversations->count() > 0)
                        @foreach($conversations as $conversation)
                        <a href="{{ route('chat.show', $conversation->contact) }}" class="block hover:bg-gray-50">
                            <div class="p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                        @if($conversation->contact->profile &&
                                        $conversation->contact->profile->avatar)
                                        <img src="{{ asset('storage/' . $conversation->contact->profile->avatar) }}"
                                            alt="{{ $conversation->contact->name }}" class="h-full w-full object-cover">
                                        @else
                                        <img src="{{ asset('images/profile-avatar.jpg') }}"
                                            alt="{{ $conversation->contact->name }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <h2 class="font-medium text-gray-900">{{ $conversation->contact->name }}
                                        </h2>
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
    <div class="md:col-span-2 lg:col-span-3 rounded-lg  overflow-y-auto">
        @if(!Route::is('chat.show'))
        <div class="w-full h-full p-4 text-center overflow-hidden flex flex-col items-center justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Bienvenue dans Lightning</h1>
            <p class="text-gray-600 mt-2">Sélectionnez une conversation pour afficher les messages</p>
            <img src="{{ asset('images/illustration.avif') }}" alt="Image de conversation"
                class="w-[44%] h-auto mx-auto -z-10 ">
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