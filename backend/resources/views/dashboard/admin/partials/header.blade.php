<header class="bg-white shadow-sm z-20 border-b">
    <div class="flex items-center justify-between px-6 py-3">
        <!-- Left side: Toggle and Search -->
        <div class="flex items-center">
            <button id="sidebar-toggle" class="sidebar-toggle focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
            <div class="search-container hidden md:block">
                <input type="text" placeholder="Rechercher ou saisir une commande..."
                    class="search-input focus:outline-none">
                <span class="search-shortcut">⌘K</span>
            </div>
        </div>

        <!-- Right side: Dark Mode, Notifications and Profile -->
        <div class="flex items-center space-x-4">
            <!-- Dark Mode Toggle -->
            <button class="header-icon focus:outline-none">
                <i class="fas fa-moon"></i>
            </button>

            <!-- Notifications -->
            <div class="relative">
                <button class="header-icon focus:outline-none">
                    <i class="fas fa-bell"></i>
                    <span class="notification-dot"></span>
                </button>
            </div>

            <!-- Profile -->
            <div class="relative">
                <div class="flex items-center cursor-pointer" id="profile-dropdown-toggle">
                    <div class="profile-avatar mr-2">
                        @if(isset($user->profile->avatar))
                        <img src="{{asset('storage/' . $user->profile->avatar) }}" alt="Photo de profil"
                            class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="hidden md:block mr-2">
                        <p class="text-sm font-medium">{{ $user->name }}</p>
                        <p class="bg-indigo-100 text-indigo-600 rounded-full px-2  py-0.5 text-sm font-medium">
                            {{$user->role->name}}</p>
                    </div>
                    <div class="profile-toggle">
                        <i class="fas fa-chevron-down text-xs opacity-70"></i>
                    </div>
                </div>

                <!-- Profile Dropdown -->
                <div id="profile-dropdown" class="dropdown-profile bg-white rounded-xl mt-2">
                    <div class="p-4 border-b border-gray-100">
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-lg overflow-hidden border-2 border-gray-200 mr-3">
                                @if(isset($user->profile->avatar))
                                <img src="{{asset('storage/' . $user->profile->avatar) }}" alt="Photo de profil"
                                    class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                <p class="text-xs mt-1">
                                    <span
                                        class="bg-indigo-100 text-indigo-600 rounded-full px-2 py-0.5 text-xs font-medium">
                                        {{ $user->role->name }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <ul>
                            <li>
                                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Edit profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.account') }}" class="dropdown-item">
                                    <i class="fas fa-cog"></i>
                                    <span>Account settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">
                                    <i class="fas fa-question-circle"></i>
                                    <span>Support</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="border-t py-2">
                        <form method="POST" action="{{url('logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item text-red-500 w-full text-left">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- fin profile -->
        </div>
    </div>
</header>