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
        <!-- Botón Estimado -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#estimadoModal" style="display: flex; align-items: center; justify-content: center; background-color: #1e73be; color: white; text-decoration: none; font-size: 18px; padding: 15px; border-radius: 8px; cursor: pointer; border: none;">
          <img src="{{ asset('img/dinerillo.png') }}" alt="Estimado" style="width: 50px; height: 30px; margin-right: 1px;"> 
          Estimado
        </button>

        <!-- Botón Pagar -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#pagarModal" style="display: flex; align-items: center; justify-content: center; background-color: #1e73be; color: white; text-decoration: none; font-size: 18px; padding: 15px; border-radius: 8px; cursor: pointer; border: none;">
          <img src="{{ asset('img/dinero.png') }}" alt="Pagar" style="width: 30px; height: 30px; margin-right: 15px;">
          Pagar
        </button>
      </div>
    </div>
    

    <!-- Map Container -->
    <div style="width: 80%; display: flex; align-items: center; justify-content: center; padding: 20px;">
      <img src="{{ asset('img/estacionamiento.png') }}" alt="Estacionamiento" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;"> 
    </div>
  </div>
</div>

<!-- Modal Estimado -->
<div class="modal fade" id="estimadoModal" tabindex="-1" aria-labelledby="estimadoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #BBDEFB; color: black;">
      <div class="modal-header">
        <h5 class="modal-title" id="estimadoModalLabel">Precio Estimado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset('img/logo.png') }}" alt="LinkinParking Logo" style="width: 150px; margin-bottom: 20px;">
        <p>El precio estimado a cancelar es de ****</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Pagar -->
<div class="modal fade" id="pagarModal" tabindex="-1" aria-labelledby="pagarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #BBDEFB; color: black;">
      <div class="modal-header">
        <h5 class="modal-title" id="pagarModalLabel">Confirmar Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset('img/logo.png') }}" alt="LinkinParking Logo" style="width: 150px; margin-bottom: 20px;">
        <p>¿Debe cancelar la cantidad de $*******?</p>
        <p>Al presionar 'Aceptar' se realizará el cobro.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Lugar -->
<div class="modal fade" id="lugarModal" tabindex="-1" aria-labelledby="lugarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #BBDEFB; color: black;">
      <div class="modal-header">
        <h5 class="modal-title" id="lugarModalLabel">Lugar Estacionamiento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset('img/logo.png') }}" alt="LinkinParking Logo" style="width: 150px; margin-bottom: 20px;">
        <p>Su vehiculo fue aparcado en el lugar ************</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
@endsection
