@if(count($contacts) == 0)
<div class="flex items-center justify-center h-full">
    <p class="text-gray-500 dark:text-gray-400">No contacts found.</p>
</div>
@else
<!-- <div class="flex items-center justify-center flex-wrap gap-4"> -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-3  justify-items-center">

    @foreach($contacts as $contact)
    <div
        class=" w-full max-w-md bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="flex flex-row items-center justify-between p-4">
            <img class=" w-24 h-24  rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg"
                alt="Bonnie image" />
            <div class="flex    flex-col justify-between px-4">
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$contact->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $contact->email }}</span>
            </div>
            <div class="flex mt-4 md:mt-6">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    friend</a>
                <!-- <a href="#"
                    class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Message</a> -->
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif