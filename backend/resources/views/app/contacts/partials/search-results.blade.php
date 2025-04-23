@if(count($users) == 0)
<div class="flex items-center justify-center h-full">
    <p class="text-gray-500 dark:text-gray-400">No contacts found.</p>
</div>
@else
<!-- <div class="flex items-center justify-center flex-wrap gap-4"> -->
<!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-3  justify-items-center"> -->

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
                    <img class="w-12 h-12 rounded-full" src="{{ asset('images/avatar profile.jpg') }}" alt="Neil image">
                    @endif
                </div>
                <div class="flex-1 min-w-0 ms-4">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{ $user->name }}
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        {{ $user->email }}
                    </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">


                    <a href="{{ route('app.chat.discussions.show', ['id' => $user->id]) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Send message
                    </a>


                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif