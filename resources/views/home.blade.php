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
    <link href="https://fonts.googleapis.com/css?family=Nunito|Roboto" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    /* Estilos generales */
    body {
        font-family: 'Nunito', 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f8ff; /* Fondo azul claro */
        color: #003366; /* Texto azul oscuro */
    }

    /* Navbar */
    .navbar {
        background: #0066cc; /* Azul medio */
        border-bottom: 2px solid #004080; /* Línea azul oscuro */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra */
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
        color: #ffffff !important; /* Texto blanco */
    }

    /* Sidebar */
    .sidebar {
        height: 100vh;
        background-color: #cce7ff; /* Fondo azul claro */
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 1rem;
        width: 250px;
        overflow-y: auto;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    }

    .sidebar-header {
        text-align: center;
        margin-bottom: 1rem;
        font-size: 1.2rem;
        color: #004080; /* Azul oscuro */
        font-weight: bold;
        border-bottom: 1px solid #80bfff;
        padding-bottom: 0.5rem;
    }

    .sidebar a {
        color: #003366; /* Azul oscuro */
        text-decoration: none;
        margin: 0.5rem 0;
        padding: 0.8rem 1rem;
        display: block;
        font-size: 1rem;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #80bfff; /* Fondo azul más claro */
        color: #ffffff; /* Texto blanco */
    }

    .sidebar a.active {
        background-color: #0066cc; /* Azul medio */
        color: #ffffff;
    }

    .sidebar a i {
        margin-right: 10px;
    }

    /* Contenido principal */
    .main-content {
        margin-left: 250px; /* Espacio para el sidebar */
        padding: 2rem;
    }

    /* Header dentro del contenido principal */
    .content-header {
        background-color: #e6f3ff; /* Azul pálido */
        padding: 1rem;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .content-header h1 {
        font-size: 1.5rem;
        color: #003366; /* Azul oscuro */
    }

    .content-header .clock {
        font-size: 1.2rem;
        color: #003366;
    }

    .content-header .btn-help {
        background-color: #0066cc;
        border: none;
        color: #fff;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    .content-header .btn-help:hover {
        background-color: #004080;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
        }
    }

    /* Footer */
    footer {
        background-color: #004080; /* Azul oscuro */
        color: white;
        text-align: center;
        padding: 15px 0;
        width: 100%;
    }
</style>
    </style>

    <script>
        // Reloj en tiempo real
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        window.onload = updateClock;
    </script>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                Linkinparking
            </div>
            <a href="{{ route('index.vehiculo') }}" class="{{ request()->routeIs('index.vehiculo') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Vehiculo
            </a>
            <a href="{{ route('index.cliente') }}" class="{{ request()->routeIs('index.cliente') ? 'active' : '' }}">
                <i class="bi bi-tv"></i> Cliente
            </a>
            <a href="{{ route('index.vistaCliente') }}" class="{{ request()->routeIs('index.vistaCliente') ? 'active' : '' }}">
                <i class="bi bi-tv"></i> Vista Cliente
            </a>
            <a href="{{ route('index.vistaEmpleados') }}" class="{{ request()->routeIs('index.vistaEmpleados') ? 'active' : '' }}">
                <i class="bi bi-tv"></i> Vista Empleados
            </a>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="content-header">
                <h1>Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}!</h1>
                <div class="clock" id="clock"></div>
            </div>
            

        </div>
    </div>


</body>
</html>