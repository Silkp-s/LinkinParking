<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
/* Estilo del Navbar */
.navbar {
    background-image: linear-gradient(to right, #1565c0, #42a5f5); /* Degradado azul */
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
    margin-bottom: 0; /* Elimina el margen inferior */
}

.navbar a.navbar-brand {
    color: white; /* Color del texto */
    font-size: 1.5rem; /* Tamaño del texto */
    font-weight: bold; /* Negrita */
    text-transform: uppercase; /* Texto en mayúsculas */
    text-decoration: none; /* Sin subrayado */
}

.navbar-toggler {
    border-color: white; /* Color del borde del botón */
}


.navbar-nav .nav-link {
    color: white !important; /* Color blanco */
    font-weight: 500; /* Grosor medio */
    font-size: 1rem; /* Tamaño del texto */
    text-decoration: none; /* Sin subrayado */
}

.navbar-nav .nav-link:hover {
    color: #ffd600; /* Color amarillo al pasar el cursor */
    text-decoration: underline; /* Subrayado al pasar el cursor */
}

/* Footer */
.footer {
    background-color: #1565c0; /* Color del footer */
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: 0; /* Elimina el margen superior */
    font-size: 1rem; /* Texto más grande */
}

.footer a {
    color: #ffd600; /* Contraste con el fondo */
    text-decoration: none;
    font-weight: bold;
}

.footer a:hover {
    text-decoration: underline;
}
</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    LinkinParking
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Crear Usuario') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        © 2024 LinkinParking. Todos los derechos reservados.
    </footer>
</body>
</html>
