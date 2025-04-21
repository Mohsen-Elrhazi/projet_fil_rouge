@extends('app.layouts.app')
@section('title', 'Home Page')

@section('content1-header')
<div class="grid grid-rows-2 gap-1 ">
    <div class="flex  items-center justify-between ">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Discussions</h5>
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
            @foreach($users as $user)
            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="shrink-0">
                        @if($user->profile)
                        <img class="w-12 h-12 rounded-full" src="{{asset('storage/' . $user->profile->avatar) }}"
                            alt="Profile photo">
                        @else
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/avatar profile.jpg') }}"
                            alt="Neil image">
                        @endif
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $user-> name}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            last message here
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <!-- date -->


                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('content2')



@endsection