<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- nav -->
        <!-- end nav -->

        <!-- aside -->
        <!--end aside  -->

        <main class="p-4 md:ml-16 pt-20 h-screen overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full h-full ">
                <!-- Premier élément avec contenu texte divisé en deux -->
                <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 flex flex-col">
                    <!-- Première partie - hauteur automatique -->
                    <div class=" border-b border-gray-300 dark:border-gray-600 w-full max-w-md p-4 bg-white">
                        @yield('content1-header')
                    </div>

                    <!-- Deuxième partie - prend le reste de l'espace avec défilement si nécessaire -->
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