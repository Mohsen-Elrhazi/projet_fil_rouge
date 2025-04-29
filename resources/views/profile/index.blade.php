@extends('layouts.app')
@section('title', 'Mon profil - Discussions')
@section('content-main')
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full h-full ">
    <div class=" rounded-lg dark:border-gray-600 flex flex-col overflow-hidden">

        <div class="flex-1 px-3 py-1.5  ">
            <div class="flex flex-col items-center justify-center w-full h-full">
                <h1 class="text-2xl font-bold mb-4">Profile</h1>
                <p class="text-gray-600">Welcome to your profile page!</p>
                @if($user->profile && $user->profile->avatar)
                <img class="w-32 h-32 rounded-full mt-4" src="{{asset('storage/' . $user->profile->avatar) }}"
                    alt="Profile photo">
                @else
                <img class="w-32 h-32 rounded-full mt-4" src="{{ asset('images/profile-avatar.jpg') }}" alt=" image">
                @endif
            </div>
        </div>


    </div>

    <!-- Deuxième élément -->
    <div class="md:col-span-2 lg:col-span-3   rounded-lg  ">
        <div class="container mx-auto px-4 ">
            <!-- Profile card with modern design -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <!-- Header with subtle gradient background -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-10 relative">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 relative z-10">
                        <!-- Avatar with enhanced styling -->
                        <div class="relative">
                            @if(isset($user->profile->avatar))
                            <img src="{{asset('storage/' . $user->profile->avatar) }}" alt="Profile photo"
                                class="w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-white shadow-lg bg-white">
                            @else
                            <img src="{{ asset('images/profile-avatar.jpg') }}" alt="Profile photo"
                                class="w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-white shadow-lg bg-white">
                            @endif

                        </div>

                        <!-- User information with better typography -->
                        <div class="mt-6 flex-col justify-center items-center text-center md:text-left text-white">
                            <h2 class="text-2xl md:text-3xl font-bold">{{ $user->name }}</h2>

                            <p class="text-indigo-100 mt-2 opacity-80">Member since
                                {{$user->created_at->format("D M Y")}}
                            </p>
                        </div>

                        <!-- Edit button repositioned and restyled -->
                        <div class="md:ml-auto">
                            <button type="button" data-modal-target="editProfileModal"
                                data-modal-toggle="editProfileModal"
                                class="flex items-center rounded-lg bg-white px-4 py-2.5 text-base font-medium text-indigo-700 hover:bg-indigo-50 transition duration-300 shadow-md">
                                <i class="fas fa-user-edit mr-2"></i>
                                Edit Profile
                            </button>
                        </div>
                    </div>

                    <!-- Decorative elements -->
                    <div class="absolute bottom-0 left-0 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-16 text-white"
                            fill="currentColor" preserveAspectRatio="none">
                            <path
                                d="M0,288L48,272C96,256,192,224,288,213.3C384,203,480,213,576,229.3C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- Profile details with improved layout -->
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 bg-indigo-100 p-2 rounded-full">
                            <i class="fas fa-id-card text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 ml-3">Personal Information</h3>
                    </div>

                    <!-- Info cards with enhanced visual appeal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div
                            class="bg-gray-50 rounded-xl border border-gray-100 p-5 hover:shadow-md transition duration-300">
                            <div class="flex items-center">
                                <div class="bg-indigo-100 p-3 rounded-full">
                                    <i class="fas fa-envelope text-indigo-600"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Full Name</p>
                                    <p class="text-lg font-medium text-gray-800">
                                        {{ $user->name }}</p>
                                </div>
                            </div>
                        </div>


                        <!-- Phone Card -->
                        <div
                            class="bg-gray-50 rounded-xl border border-gray-100 p-5 hover:shadow-md transition duration-300">
                            <div class="flex items-center">
                                <div class="bg-indigo-100 p-3 rounded-full">
                                    <i class="fas fa-phone text-indigo-600"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Phone</p>
                                    <!-- @if(isset($user->profile)) -->
                                    <p class="text-lg font-medium text-gray-800">{{ $user->profile->phone }}</p>
                                    <!-- @else
                            <p class="text-lg font-medium text-gray-400">Not provided</p>
                            @endif -->
                                </div>
                            </div>
                        </div>


                        <!-- Email Card (if needed) -->

                    </div>

                    <!-- Biography with improved styling -->
                    <div class="mt-8 bg-gray-50 rounded-xl border border-gray-100 p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-indigo-100 p-3 rounded-full">
                                <i class="fas fa-quote-left text-indigo-600"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800 ml-3">About Me</h4>
                        </div>
                        @if(isset($user->profile) && $user->profile->bio)
                        <p class="text-gray-700 leading-relaxed">{{ $user->profile->bio }}</p>
                        @else
                        <div class="flex items-center justify-center h-24 text-gray-400">
                            <i class="fas fa-edit mr-2"></i>
                            <p>No biography provided. Click "Edit Profile" to add information about yourself.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Enhanced Edit Modal -->
            <div id="editProfileModal" tabindex="-1" aria-hidden="true"
                class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full  bg-opacity-100 overflow-auto">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-xl shadow-xl animate-fadeIn">
                        <!-- Modal header -->
                        <div class="px-6 py-4 rounded-t-xl border-b border-gray-200 bg-indigo-50">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold text-indigo-800 flex items-center">
                                    <i class="fas fa-user-edit mr-2 text-indigo-600"></i>
                                    Edit My Profile
                                </h3>
                                <button type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition duration-200"
                                    data-modal-hide="editProfileModal">
                                    <i class="fas fa-times"></i>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        </div>

                        <!-- Modal body with improved styling -->
                        <div class="p-6">
                            <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Avatar section with enhanced UX -->
                                <div class="mb-8 flex flex-col items-center">
                                    <div class="relative inline-block group">
                                        <img id="preview-avatar"
                                            src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg"
                                            alt="Profile photo"
                                            class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 shadow-md group-hover:opacity-90 transition duration-300">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-full transition duration-300 flex items-center justify-center">
                                            <label for="avatar"
                                                class="absolute bottom-0 right-0 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full p-3 cursor-pointer shadow-lg transition duration-200 transform hover:scale-105">
                                                <i class="fas fa-camera"></i>
                                            </label>
                                        </div>
                                        <input type="file" name="avatar" id="avatar" class="hidden">
                                    </div>
                                    <p class="mt-3 text-sm text-gray-500 flex items-center">
                                        <i class="fas fa-info-circle mr-1 text-indigo-400"></i>
                                        Click the camera icon to change your photo
                                    </p>
                                </div>

                                <!-- Form in 2 columns with improved inputs -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Name -->
                                    <div class="mb-1">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Full
                                            Name</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <i class="fas fa-user text-indigo-400"></i>
                                            </div>
                                            <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition duration-200"
                                                placeholder="Your full name">
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-1">
                                        <label for="phone"
                                            class="block mb-2 text-sm font-medium text-gray-700">Phone</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <i class="fas fa-phone text-indigo-400"></i>
                                            </div>
                                            <input type="tel" id="phone" name="phone"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition duration-200"
                                                placeholder="+212 6XX XX XX XX"
                                                value="{{ $user->profile->phone ?? '' }}">
                                        </div>
                                    </div>




                                </div>

                                <!-- Biography with enhanced UI -->
                                <div class="mt-6">
                                    <label for="bio"
                                        class="block mb-2 text-sm font-medium text-gray-700">Biography</label>
                                    <div class="relative">
                                        <div class="absolute top-3 start-3 pointer-events-none">
                                            <i class="fas fa-quote-left text-indigo-400"></i>
                                        </div>
                                        <textarea id="bio" name="bio" rows="4"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 ps-10 transition duration-200"
                                            placeholder="Tell us about yourself...">{{ $user->profile->bio ?? '' }}</textarea>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-lightbulb mr-1 text-amber-400"></i>
                                        Share a brief description about yourself, your interests or professional
                                        background
                                    </p>
                                </div>

                                <!-- Modal footer with improved buttons -->
                                <div class="mt-8 pt-4 flex items-center justify-end border-t border-gray-200">
                                    <button data-modal-hide="editProfileModal" type="button"
                                        class="flex items-center text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg border border-gray-300 text-sm font-medium px-5 py-2.5 me-3 transition duration-300">
                                        <i class="fas fa-times mr-1.5"></i>
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="flex items-center text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-300">
                                        <i class="fas fa-save mr-1.5"></i>
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection