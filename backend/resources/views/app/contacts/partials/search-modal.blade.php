<div id="large-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-hidden md:inset-0 h-screen  ">
    <div class="relative w-full max-w-2xl h-full flex items-start justify-center">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 w-full max-h-[90vh] flex flex-col">
            <!-- Modal header - fixed -->
            <div
                class="sticky top-0 z-10 flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 bg-white dark:bg-gray-700">
                <div class="w-full mr-8">
                    <form id="searchForm" class="w-full md:w-3/4 lg:w-3/4">
                        <div class="flex">
                            <div class="relative w-full">
                                <input type="search" name="query" id="search-query"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Search for city or address" required />
                                <button type="submit"
                                    class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body - scrollable -->
            <div class="overflow-y-auto flex-grow py-4 px-2 md:p-5 space-y-4">
                <div id="search-results" class="space-y-4">
                    <div class="flex items-center justify-center h-full">
                        <p class="text-gray-500 dark:text-gray-400">Enter search terms to find contacts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>