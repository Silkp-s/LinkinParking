@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; margin-top: 20px;">
  <div style="display: flex; flex-direction: row; background: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 600px;">
    <!-- Sidebar -->
    <div style="width: 20%; background-color: #cceaf6; display: flex; flex-direction: column; align-items: center; padding: 20px;">
      <div style="text-align: center; margin-bottom: 40px;">
        <img src="{{ asset('img/logo.png') }}" alt="LinkinParking Logo" style="width: 90%;"> 
      </div>
      <div style="display: flex; flex-direction: column; width: 100%; gap: 20px;">
        <a href="#" style="display: flex; align-items: center; justify-content: center; background-color: #1e73be; color: white; text-decoration: none; font-size: 18px; padding: 15px; border-radius: 8px; cursor: pointer;">
          <br><img src="{{ asset('img/agendar.png') }}" alt="Agendar" style="width: 30px; margin-right: 15px;"> 
          Agendar
        </a>
        <a href="#" style="display: flex; align-items: center; justify-content: center; background-color: #1e73be; color: white; text-decoration: none; font-size: 18px; padding: 15px; border-radius: 8px; cursor: pointer;">
          <img src="{{ asset('img/candado.png') }}" alt="Liberar" style="width: 30px; margin-right: 15px;">
          Liberar
        </a>
      </div>
      <div style="margin-top: auto; display: flex; align-items: center; gap: 15px;">
        <img src="{{ asset('img/usuario.png') }}" alt="Usuario" style="width: 50px; height: 50px; border-radius: 50%;"> 
        <span style="font-size: 16px; color: #333;">Nombre Empleado</span>
      </div>
    </div>

    <!-- Map Container -->
    <div style="width: 80%; display: flex; align-items: center; justify-content: center; padding: 20px;">
      <img src="{{ asset('img/estacionamiento.png') }}" alt="Estacionamiento" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;"> 
    </div>
  </div>
</div>
<footer class="footer">
    © 2024 LinkinParking. Todos los derechos reservados.
</footer>
<style>
/* Footer */
    .footer {
        background-color: #1565c0; /* Color del footer */
        color: white;
        text-align: center;
        padding: 15px 0;
        margin-top: 20px;
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
@endsection