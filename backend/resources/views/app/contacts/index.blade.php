@extends('app.layouts.app')
@section('title', 'Home Page')

@section('content1-header')
<div class="grid grid-rows-2 gap-1 ">
    <div class="flex  items-center justify-between ">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Discussions</h5>
        <!-- modal add contact -->
        <button data-modal-target="large-modal" data-modal-toggle="large-modal"
            class="block w-full md:w-auto p-1.5 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            type="button">
            <i class="fa-solid fa-user-plus text-lg"></i>
        </button>

        <!-- Large Modal -->
        <div id="large-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-4xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <div class="w-full mr-8">
                            <!-- Contrôle la largeur du conteneur du formulaire -->
                            <form class="w-full md:w-3/4 lg:w-3/4">
                                <!-- Contrôle la largeur du formulaire -->
                                <div class="flex">
                                    <select id="countries"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm border border-gray-300 rounded-s-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100">
                                        <option selected>Shearch by</option>
                                        <option value="US">Email</option>
                                        <option value="CA">Phone</option>

                                    </select>

                                    <div class="relative w-full">
                                        <input type="search" id="location-search"
                                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                            placeholder="Search for city or address" required />
                                        <button type="submit"
                                            class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="large-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws
                            for its citizens, companies around the world are updating their terms of service agreements
                            to
                            comply.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="large-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-hide="large-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal -->
    </div>

    <div>
        <!-- serch -->
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
            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Neil Sims
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $320
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-4.jpg" alt="Bonnie image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Bonnie Green
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $3467
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Michael image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Michael Gough
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $67
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-12 h-12 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>

            <li class="py-3 sm:py-4">
                <div class="flex items-center ">
                    <div class="shrink-0">
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Lana image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            email@windster.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $367
                    </div>
                </div>
            </li>


        </ul>
    </div>
</div>
@endsection

@section('content2')
<p class="p-3 text-sm sm:text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur ducimus
    place placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremq placeat libero ipsa eos nemo dignissimos doloremque vel
    tempore
    blanditiis laudantium, nesciunt molestias pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    ue vel tempore blanditiis laudantium, nesciunt molestias pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    placeat libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias
    pariatur
    at libero ipsa eos nemo dignissimos doloremque vel tempore blanditiis laudantium, nesciunt molestias pariatur
    cumque eveniet quae necessitatibus illo tempora!</p>
@endsection