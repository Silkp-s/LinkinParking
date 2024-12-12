@extends('layouts.app')

@section('content')
<style>
    /* Fondo general */
    body {
        background-color: #b0d4de;
    }

    /* Contenedor principal */
    .login-wrapper {
        min-height: calc(100vh - 56px); /* Altura completa menos el navbar */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .login-container {
        display: flex;
        background-color: #f5f5f5; /* Fondo del contenedor */
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        width: 1000px; /* Más ancho */
        height: 700px; /* Más alto */
    }

    /* Estilo del formulario */
    .form-container {
        background-color: #d4e9f2; /* Fondo del formulario */
        width: 50%;
        padding: 50px; /* Más espacio interno */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .form-container img {
        width: 180px; /* Logo más grande */
        height: auto;
        margin-bottom: 20px;
    }

    .form-container h1 {
        font-size: 2.2rem; /* Título más grande */
        color: #1565c0;
        margin-bottom: 30px;
    }

    .form-container label {
        color: #333;
        font-weight: bold;
        font-size: 1rem; /* Texto más grande */
    }

    .form-container input {
        width: 100%;
        padding: 15px; /* Inputs más grandes */
        margin: 15px 0;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f8f8f8;
        font-size: 1rem; /* Texto dentro del input más grande */
    }

    .form-container .btn-primary {
        width: 100%;
        padding: 15px; /* Botón más grande */
        background-color: #1565c0;
        border: none;
        color: white;
        font-size: 1.2rem; /* Texto del botón más grande */
        border-radius: 10px;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-container .btn-primary:hover {
        background-color: #0d47a1;
    }

    .form-container a {
        display: block;
        margin-top: 10px;
        color: #d32f2f;
        text-align: right;
        font-size: 0.9rem;
        font-weight: bold;
        text-decoration: none;
    }

    .form-container a:hover {
        text-decoration: underline;
    }

    /* Imagen de autos */
    .parking-image-container {
        width: 100%;
        background-color: #e7f4f8;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

</style>

<div class="login-wrapper">

    <a href="{{ route('index.vistaEmpleados') }}" class="ml-4  text-sm text-gray-700 dark:text-gray-500 underline">vistaEmpleadoTset</a>
    <a href="{{ route('index.estacionamiento') }}" >estacionamiento</a>
    <a href="{{ route('index.lugars') }}" >Lugares brr</a>
    <a href="{{ route('valors.index') }}" >Ver Valores</a>


    <div class="login-container">
        <div class="form-container">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Usuario:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password">Contraseña:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
        <div class="parking-image-container">

            <img src="{{ asset('img/autos.png') }}" alt="Autos">
        </div>
    </div>
</div>



@endsection