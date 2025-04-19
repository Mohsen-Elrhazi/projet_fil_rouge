<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        @include('app.partials.header')
        @include('app.partials.sidebar')

        <main class="p-4 md:ml-16 pt-18 h-screen overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full h-full overflow-y-auto">
                <div
                    class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 flex flex-col overflow-hidden">

                    <!-- Header fixe -->
                    <div class="bg-gray-100 p-3 ">
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
</body>

</html>