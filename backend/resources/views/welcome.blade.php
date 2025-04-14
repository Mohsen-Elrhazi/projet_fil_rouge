<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <h1>home page</h1>



    @session('success')
    <div class="mt-3 text-green-400">
        {{ $value }}
    </div>
    @endsession

    @if (session('error'))
    <div class="mt-3 text-red-600">
        {{ $value}}
    </div>
    @endif
</body>

</html>