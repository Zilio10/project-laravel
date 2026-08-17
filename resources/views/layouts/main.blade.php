<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <link rel="stylesheet" href="/css/styles.css">
        
        <script src="/js/scripts.js"></script>

    </head>
    <body>
        @yield('content')
        <footer>
            <p>HDC Events &copy; 2026</p>
        </footer>
    </body>
</html>
