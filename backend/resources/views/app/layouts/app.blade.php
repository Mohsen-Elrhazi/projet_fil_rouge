<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Scripts and styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Styles particuliers pour cette page -->
    @yield('styles')
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Messages de session stylisés -->
        <!-- @if (session('success') || session('error')) -->
        <div class="fixed top-5 right-5 z-100" id="session-messages">
            @if (session('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg mb-3 relative overflow-hidden">
                    {{ session('success') }}
                    <div class="absolute bottom-0 left-0 h-1 bg-green-300 progress-bar"></div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-600 text-white px-4 py-3 rounded-lg shadow-lg relative overflow-hidden">
                    {{ session('error') }}
                    <div class="absolute bottom-0 left-0 h-1 bg-red-400 progress-bar"></div>
                </div>
            @endif
        </div>
        <!-- @endif -->
        <!-- Fin messages de session stylisés -->

        @include('app.partials.header')
        @include('app.partials.sidebar')

        <main class="p-4 md:ml-16 pt-18 h-screen overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full h-full overflow-y-auto">
                <div
                    class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 flex flex-col overflow-hidden">

                    <!-- Header fixe -->
                    <div class="bg-gray-100 px-3 py-1.5  ">
                        @yield("content1-header")
                    </div>

                    <!-- Contenu avec défilement -->
                    <div class="flex-1 overflow-y-auto ">
                        @yield('content1-body')
                    </div>
                </div>


                <!-- Deuxième élément -->
                <div
                    class="md:col-span-2 lg:col-span-3 border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 overflow-y-auto">
                    @yield('content2')
                </div>

            </div>
        </main>

    </div>
    <script>
        // messages sessions
        const messages = document.querySelectorAll('#session-messages > div');
        messages.forEach(message => {
            const progressBar = message.querySelector('.progress-bar');
            let width = 100;
            const interval = setInterval(() => {
                width -= 1;
                progressBar.style.width = width + '%';
                if (width <= 0) {
                    clearInterval(interval);
                    message.style.transition = 'opacity 0.5s';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }
            }, 50);
        });
    </script>

    <!-- Scripts stacked from views -->
    @stack('scripts')

</body>

</html>