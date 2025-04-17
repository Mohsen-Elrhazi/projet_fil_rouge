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
                    <h2 class="text-2xl font-bold text-gray-800">nom</h2>
                    <!-- <p class="text-gray-600">Member since March 15, 2023</p> -->
                    <p class="text-red-500">role</p>
                </div>

                <!-- Edit button repositioned -->
                <div class="ml-auto">
                    <!-- Modal toggle -->
                    <button data-modal-target="editAccountInfos" data-modal-toggle="editAccountInfos"
                        class="block rounded-lg bg-indigo-100 px-4 py-2 text-base font-medium text-indigo-700 hover:bg-indigo-200 transition duration-200"
                        type="button">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
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
                <!-- Email -->
                <div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-envelope text-gray-500 mr-2 w-5"></i>
                        <span class="text-gray-700 font-medium">Email</span>
                    </div>
                    <p class="text-gray-600 ml-7">example@gmail.com</p>
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-phone text-gray-500 mr-2 w-5"></i>
                        <span class="text-gray-700 font-medium">Password</span>
                    </div>
                    <p class="text-gray-600 ml-7">********</p>
                    <!-- <p class="p-2 text-gray-700   ml-7 border-l border-gray-400"></p> -->
                </div>


            </div>

        </div>
    </div>





    <!-- Main modal -->
    <div id="editAccountInfos" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Sign in to our platform
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editAccountInfos">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="name@company.com" required />
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>
                        <div>
                            <label for="confirm_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="password" name="password" id="confirm_password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                        </div>

                        <!-- <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button> -->
                        <!-- Modal footer -->
                        <div
                            class=" flex items-center justify-end border-t   rounded-t dark:border-gray-600 border-gray-200">
                            <button data-modal-hide="editAccountInfos" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 me-3 shadow-sm transition duration-200 cursor-pointer">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition duration-200 cursor-pointer">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    @endsection