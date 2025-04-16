@extends('dashboard.admin.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Profile card -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-6">
            <div class="flex flex-row items-center gap-6">
                <!-- Avatar -->
                <div class="relative">
                    <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg"
                        alt="Profile photo"
                        class="w-24 h-24 rounded-full object-cover border-2 border-gray-200 shadow-sm bg-white">
                </div>

                <!-- Basic information -->
                <div class="text-left">
                    <h2 class="text-2xl font-bold text-gray-800">John Doe</h2>
                    <!-- <p class="text-gray-600">Member since March 15, 2023</p> -->
                    <p class="text-red-500">Admin</p>
                </div>

                <!-- Edit button repositioned -->
                <div class="ml-auto">
                    <button type="button" data-modal-target="editProfileModal" data-modal-toggle="editProfileModal"
                        class="flex items-center rounded-lg bg-indigo-100 px-4 py-2 text-sm font-medium text-indigo-700 hover:bg-indigo-200 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>

        <!-- Separator -->
        <div class="border-t border-gray-200"></div>

        <!-- Profile details -->
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Phone -->
                <div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-phone text-gray-500 mr-2 w-5"></i>
                        <span class="text-gray-700 font-medium">Phone</span>
                    </div>
                    <p class="text-gray-600 ml-7">+212 6XX XX XX XX</p>
                </div>

                <!-- Address -->
                <div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt text-gray-500 mr-2 w-5"></i>
                        <span class="text-gray-700 font-medium">Address</span>
                    </div>
                    <p class="text-gray-600 ml-7">123, Example Street, City, Country</p>
                </div>

                <!-- Date of birth -->
                <div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-calendar-alt text-gray-500 mr-2 w-5"></i>
                        <span class="text-gray-700 font-medium">Date of Birth</span>
                    </div>
                    <p class="text-gray-600 ml-7">05/15/1985</p>
                </div>

                <!-- Email -->
                <div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-envelope text-gray-500 mr-2 w-5"></i>
                        <span class="text-gray-700 font-medium">Email</span>
                    </div>
                    <p class="text-gray-600 ml-7">johndoe@example.com</p>
                </div>
            </div>

            <!-- Biography -->
            <div class="mt-8">
                <div class="flex items-center mb-3">
                    <i class="fas fa-user text-gray-500 mr-2 w-5"></i>
                    <span class="text-gray-700 font-medium">About Me</span>
                </div>
                <p class="text-gray-600 ml-7">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal with Flowbite - Styled -->
<div id="editProfileModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-xl shadow-xl">
            <!-- Modal header -->
            <div class="p-4 md:p-5 rounded-t-xl border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Edit My Profile
                    </h3>
                    <button type="button"
                        class="text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition duration-200"
                        data-modal-hide="editProfileModal">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            </div>

            <!-- Modal body -->
            <div class="p-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Avatar section -->
                    <div class="mb-6 flex flex-col items-center">
                        <div class="relative inline-block">
                            <img id="preview-avatar"
                                src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg"
                                alt="Profile photo"
                                class="w-28 h-28 rounded-full object-cover border-2 border-gray-300 shadow-md">
                            <label for="avatar"
                                class="absolute bottom-0 right-0 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full p-2 cursor-pointer shadow-md transition duration-200">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Click on the camera icon to change your photo</p>
                    </div>

                    <!-- Form in 2 columns -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fas fa-user text-gray-500"></i>
                                </div>
                                <input type="text" id="name" name="name" value="John Doe"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-2.5 transition duration-200"
                                    placeholder="Your full name">
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fas fa-phone text-gray-500"></i>
                                </div>
                                <input type="tel" id="phone" name="phone" value="+212 6XX XX XX XX"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-2.5 transition duration-200"
                                    placeholder="+212 6XX XX XX XX">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-500"></i>
                                </div>
                                <input type="text" id="address" name="address"
                                    value="123, Example Street, City, Country"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-2.5 transition duration-200"
                                    placeholder="Your complete address">
                            </div>
                        </div>

                        <!-- Date of birth -->
                        <div class="mb-4">
                            <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Date of
                                Birth</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fas fa-calendar text-gray-500"></i>
                                </div>
                                <input datepicker datepicker-format="mm/dd/yyyy" type="text" id="birth_date"
                                    value="05/15/1985" name="birth_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-2.5 transition duration-200"
                                    placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                    </div>

                    <!-- Biography -->
                    <div class="mb-6">
                        <label for="bio" class="block mb-2 text-sm font-medium text-gray-900">Biography</label>
                        <div class="relative">
                            <div class="absolute top-3 start-3 pointer-events-none">
                                <i class="fas fa-quote-left text-gray-500"></i>
                            </div>
                            <textarea id="bio" name="bio" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 ps-10 transition duration-200"
                                placeholder="Tell us about yourself...">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b bg-gray-50">
                <button data-modal-hide="editProfileModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 me-3 shadow-sm transition duration-200">
                    Cancel
                </button>
                <button type="button"
                    class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition duration-200">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Script for avatar preview -->
<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview
    document.getElementById('avatar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-avatar').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});
</script> -->

<!-- Include Flowbite JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
@endsection