@extends('dashboard.admin.layouts.app')

@section('title', 'Account Settings')

@section('content')
<div class="container mx-auto px-4 py-8">
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
                    <img src="" alt="Profile photo"
                        class="w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-white shadow-lg bg-white">
                    @endif
                    <div
                        class="absolute -bottom-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-2 border-white flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white text-xs"></i>
                    </div>
                </div>

                <!-- User information with better typography -->
                <div class="text-center md:text-left text-white">
                    <h2 class="text-2xl md:text-3xl font-bold">Account Settings</h2>
                    <div class="inline-flex items-center bg-white bg-opacity-20 px-3 py-1 rounded-full mt-2">
                        <i class="fas fa-user-shield mr-2 text-green-400"></i>
                        <span class="font-medium text-white">Manage your account security</span>
                    </div>
                    <p class="text-indigo-100 mt-2 opacity-80">Last updated: {{$user->created_at->format("D M Y")}}</p>
                </div>

                <!-- Edit button repositioned and restyled -->
                <div class="md:ml-auto">
                    <button type="button" data-modal-target="editAccountInfos" data-modal-toggle="editAccountInfos"
                        class="flex items-center rounded-lg bg-white px-4 py-2.5 text-base font-medium text-indigo-700 hover:bg-indigo-50 transition duration-300 shadow-md">
                        <i class="fas fa-user-lock mr-2"></i>
                        Update Security
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

        <!-- Account details with improved layout -->
        <div class="p-8">
            <div class="flex items-center mb-6">
                <div class="flex-shrink-0 bg-indigo-100 p-2 rounded-full">
                    <i class="fas fa-shield-alt text-indigo-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 ml-3">Security Information</h3>
            </div>

            <!-- Info cards with enhanced visual appeal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Email Card -->
                <div class="bg-gray-50 rounded-xl border border-gray-100 p-5 hover:shadow-md transition duration-300">
                    <div class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-envelope text-indigo-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Email Address</p>
                            <p class="text-lg font-medium text-gray-800">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Password Card -->
                <div class="bg-gray-50 rounded-xl border border-gray-100 p-5 hover:shadow-md transition duration-300">
                    <div class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-lock text-indigo-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Password</p>
                            <p class="text-lg font-medium text-gray-800">••••••••</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Security Features -->
            <!-- <div class="mt-8 bg-gray-50 rounded-xl border border-gray-100 p-6">

            </div> -->
        </div>
    </div>

    <!-- Enhanced Edit Modal -->
    <div id="editAccountInfos" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full bg-opacity-100 overflow-auto">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-xl shadow-xl animate-fadeIn">
                <!-- Modal header -->
                <div class="px-6 py-4 rounded-t-xl border-b border-gray-200 bg-indigo-50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-indigo-800 flex items-center">
                            <i class="fas fa-user-shield mr-2 text-indigo-600"></i>
                            Update Account Security
                        </h3>
                        <button type="button"
                            class="text-gray-500 bg-white hover:bg-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition duration-200"
                            data-modal-hide="editAccountInfos">
                            <i class="fas fa-times"></i>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                </div>

                <!-- Modal body with improved styling -->
                <div class="p-6">
                    <form action="{{ url('/admin/account-settings/update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Form with improved inputs -->
                        <div class="space-y-6">
                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email
                                    Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <i class="fas fa-envelope text-indigo-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition duration-200"
                                        placeholder="your.email@example.com">
                                </div>
                                <!-- <p class="mt-1 text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-info-circle mr-1 text-indigo-400"></i>
                                    We'll send a verification email if you change this
                                </p> -->
                            </div>

                            <!-- Current Password -->
                            <div>
                                <label for="current_password"
                                    class="block mb-2 text-sm font-medium text-gray-700">Current Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <i class="fas fa-lock text-indigo-400"></i>
                                    </div>
                                    <input type="password" id="current_password" name="current_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition duration-200"
                                        placeholder="••••••••">
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-200"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500">Change Password (Optional)</span>
                                </div>
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-700">New
                                    Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <i class="fas fa-key text-indigo-400"></i>
                                    </div>
                                    <input type="password" id="new_password" name="new_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition duration-200"
                                        placeholder="••••••••">
                                </div>
                                <!-- <div class="mt-1 text-xs text-gray-500">
                                    <p class="flex items-center"><i class="fas fa-check-circle mr-1 text-green-500"></i>
                                        At least 8 characters</p>
                                    <p class="flex items-center"><i class="fas fa-check-circle mr-1 text-green-500"></i>
                                        Mix of letters, numbers & symbols</p>
                                </div> -->
                            </div>

                            <!-- Confirm New Password -->
                            <div>
                                <label for="confirm_password"
                                    class="block mb-2 text-sm font-medium text-gray-700">Confirm New Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <i class="fas fa-check-circle text-indigo-400"></i>
                                    </div>
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition duration-200"
                                        placeholder="••••••••">
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer with improved buttons -->
                        <div class="mt-8 pt-4 flex items-center justify-end border-t border-gray-200">
                            <button data-modal-hide="editAccountInfos" type="button"
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
@endsection