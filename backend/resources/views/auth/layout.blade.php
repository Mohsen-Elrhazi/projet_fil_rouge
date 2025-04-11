<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

    <title> @yield("title") </title>


    <link href="{{ asset('css/Auth/auth.css') }}" rel="stylesheet">

</head>

<body>
    @yield("form")

</body>

</html>