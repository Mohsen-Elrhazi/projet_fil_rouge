@extends('layouts.app')
@section('title', 'Contacts - Discussions')
@section('content-main')
<div class="w-full h-full overflow-y-auto p-6">


    @include('contacts.partials.input-search')

    <div class="w-[80%] m-auto h-full flex items-center justify-center flex-wrap gap-6 p-4">

        @if(count($contacts) > 0)
        @foreach ($contacts as $contact)


        <!-- LinkedIn Profile Card -->
        <div class="w-64 rounded-lg bg-white shadow-md overflow-hidden border border-gray-200">
            <!-- Header with background pattern -->
            <div class="relative h-20 bg-blue-900 bg-opacity-5 overflow-hidden">
                <!-- Binary pattern background -->
                <div class="absolute top-0 left-0 w-full h-full text-blue-400 opacity-20 text-xs overflow-hidden">
                    0101010101010101010101
                    1010101010101010101010
                    0101010101010101010101
                    1010101010101010101010
                    0101010101010101010101
                </div>

                <!-- Close button -->
                <button class="absolute top-2 right-2 rounded-full bg-black bg-opacity-70 p-1 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Profile content with avatar -->
            <div class="px-4 pb-4 pt-12 relative">
                <!-- Profile picture -->
                <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
                    <!-- <div class="w-24 h-24 rounded-full bg-blue-400 border-4 border-white overflow-hidden"> -->
                    @if($contact->profile && $contact->profile->avatar)
                    <img src="{{ asset('storage/' . $contact->profile->avatar) }}" alt="Profile Picture"
                        class="w-24 h-24 rounded-full border-4 border-white object-cover">
                    @else
                    <img src="{{ asset('images/profile-avatar.jpg') }}" alt="Profile Picture"
                        class="w-24 h-24 rounded-full border-4 border-white object-cover">
                    @endif

                    <!-- </div> -->
                </div>

                <!-- Profile info -->
                <div class="text-center">
                    <h2 class="font-semibold text-base">{{$contact->name}}</h2>
                    <p class="text-gray-500 text-xs mt-1">{{ $contact->profile->bio ?? 'pas de bio'}}</p>



                    <a href="{{ route('chat.show', $contact) }}" class="mt-3 w-full py-1 px-2 border border-blue-600 rounded-md text-blue-600 text-sm font-medium
                        flex items-center justify-center">
                        <svg xmlns=" http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Send Message
                    </a>

                </div>
            </div>
        </div>

        @endforeach
        @endif
    </div>





</div>
@endsection