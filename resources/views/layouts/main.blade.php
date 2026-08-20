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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">

                <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents-logo.jpg" alt="HDC Events">
                </a>

                <div id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>

                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">
                                Criar eventos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Entrar
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Cadastrar
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>


    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>


    <footer>
        <p>HDC Events &copy; 2026</p>
    </footer>


    <script src="/js/scripts.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>

</body>

</html>
