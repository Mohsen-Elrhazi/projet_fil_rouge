<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--font font-awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- tailwind -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->

    <!--flowbite  -->
    <!-- Flowbite CSS (optionnel) -->
    <!-- <link href="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet" /> -->

    <!-- Flowbite JS -->
    <!-- <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script> -->

    <link href="{{ asset('css/Auth/auth.css') }}" rel="stylesheet">

    <title> @yield("title") </title>

</head>

<body>


    @yield("form")



    <script src="{{ asset('js/Auth/auth.js') }}"></script>
</body>

</html>