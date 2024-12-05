@extends('layouts.app')

@section('content')
<style>
/* Fondo general */
body {
    background-color: #b0d4de;
    margin: 0;
    padding: 0;
}

/* Contenedor principal */
.login-wrapper {
    min-height: calc(100vh - 56px); /* Altura completa menos el navbar */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* Contenedor del formulario e imagen */
.login-container {
    display: flex;
    background-color: #f5f5f5; /* Fondo del contenedor */
    border-radius: 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    max-width: 1000px; /* Ancho máximo */
    width: 100%;
    height: 700px; /* Altura fija */
}

/* Sección izquierda: formulario */
.form-container {
    background-color: #d4e9f2; /* Fondo del formulario */
    width: 50%; /* Ocupa el 50% del contenedor */
    padding: 50px; /* Espaciado interno */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
}

.form-container img {
    width: 180px; /* Logo */
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

/* Sección derecha: imagen */
.image-container {
    width: 50%; /* Ocupa el 50% del contenedor */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #e7f4f8; /* Fondo */
}

.image-container img {
    max-width: 100%; /* Imagen responsiva */
    height: auto;
}
</style>

<div class="login-wrapper">
    <div class="login-container">
        <!-- Sección izquierda: formulario -->
        <div class="form-container">
            <h1>{{ __('Crear Cuenta') }}</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Correo') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Repite la Contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Sección derecha: imagen -->
        <div class="image-container">
            <img src="{{ asset('img/autos.png') }}" alt="Autos">
        </div>
    </div>
</div>
@endsection
