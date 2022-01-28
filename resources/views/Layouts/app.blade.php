<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Dreams</title>
</head>
<body>
<main class="h-screen w-screen" id="app">
    <app csrf={{csrf_token()}} :routes="{{json_encode(Route::getRoutes()->compile())}}"></app>
    @yield('main')
</main>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
