@extends('admin.layouts.app')
@section('title', 'Admin - Dashboard')
@section('content-main')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- <h1 class="text-2xl font-bold text-gray-900 mb-6">Admin Dashboard</h1> -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Users Card -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">Total Users</p>
                        <p class="text-white text-3xl font-bold mt-1">{{ $userCount ?? 0 }}</p>
                    </div>
                    <div class="rounded-full bg-white/20 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Users Card -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Active Users</p>
                        <p class="text-white text-3xl font-bold mt-1">{{ $activeUserCount ?? 0 }}</p>
                    </div>
                    <div class="rounded-full bg-white/20 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Users Card -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-medium">Inactive Users</p>
                        <p class="text-white text-3xl font-bold mt-1">{{ $inactiveUserCount ?? 0 }}</p>
                    </div>
                    <div class="rounded-full bg-white/20 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Conversations Card - Full Width -->
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Conversations</p>
                    <p class="text-white text-3xl font-bold mt-1">{{ $conversationsCount ?? 0 }}</p>
                </div>
                <div class="rounded-full bg-white/20 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection