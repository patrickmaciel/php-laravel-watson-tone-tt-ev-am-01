<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teste Técnico Everis - AB InBev</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    @include('partials.header')

    <div id='wrapper' class="container-sm">
        @yield('content')

        @include('partials.footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
