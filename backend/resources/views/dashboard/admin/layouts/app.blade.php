<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="{{ asset('css/dashboard/admin/admin.css') }}" rel="stylesheet">

</head>

<body class="bg-gray-50 font-sans text-gray-700">
    <div id="overlay" class="overlay"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('dashboard.admin.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            @include('dashboard.admin.partials.header')

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4">

                <div class="fixed top-5 right-5 z-50" id="session-messages">
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

                <div class="bg-white p-2 rounded-xl shadow-card h-full overflow-y-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Spinner de chargement avec effet de blur -->
    <div id="loader" class="loader fixed inset-0 z-50 bg-gray-100/20 flex items-center justify-center">
        <div class="spinner border-4 border-indigo-500 border-t-transparent rounded-full w-12 h-12 animate-spin"></div>
    </div>





    <script src="{{ asset('js/dashboard/admin/admin.js') }}"></script>
</body>

</html>