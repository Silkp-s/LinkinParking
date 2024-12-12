@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseño</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
  
        .fondo{
            background-color: #E7F1F3
        }
        .sidebar {
            background-color: #BCE4EB;
            height: 100vh;
        }
        .sidebar .content {
            height: 100%;
            display: flex;
            margin-top:20vh;
            flex-direction: column;
            justify-content: start;
            align-items: center;
        }
        .main-content {
            display: flex;
            margin-top: 5%;
            height: 70vh;
            background-image: url('img/fondoconcreto.jpg');
            background-size: cover;            
            background-position: center; 
            background-repeat: repeat;
            padding-left:2%;
        }
        .main-content img {
            max-width: 100%;
            height: auto;
        }
        .divauxiliar{
            height:250px;
            width:150px;
            border-right: 5px solid yellow;
            border-left: 5px solid yellow;
            margin-right:2px;
            margin-left:2px;
        }
        .boton{
            width: 120px; /* Ancho del botón */
             height: 40px; /* Alto del botón */
            background-color: #25509D; /* Color de fondo */
             color: white; /* Color del texto */
             border:black; 
            border-radius: 25px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de la fuente */
            cursor: grab; /* Cambiar el cursor al pasar sobre el botón */
        }
        
        button:hover {
        background-color: #09ad11 !important; 
        }

        .logomodal{
            width: 50%;
            margin-left: 25%;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row fondo">
            <!-- Sidebar -->
            <div class="col-1 sidebar">
                <div class="content">
                    <img src="img/logo.png" alt="Logo" class="mb-4" style="width: 200px;">
                    <button class="btn  mb-3 boton"data-bs-toggle="modal" data-bs-target="#agendar">Agendar <i class="bi bi-journal-check"></i></button>
                    <button class="btn  boton"data-bs-toggle="modal" data-bs-target="#liberar">Liberar <i class="bi bi-unlock ml-1"></i></button>  
                    <img src="{{ asset('img/usuario.png') }}" alt="Usuario" style="width: 50px; height: 50px; border-radius: 50%;"> 
                    <h1 style="font-size: 16px; color: #333;">{{ Auth::user()->name ?? 'Usuario' }}</h1>        
                </div>

              <!-- Modal reservar -->
<div class="modal fade" id="agendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content" style="background-color: #BBDEFB; color: black;">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hola!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img class="logomodal" src="img/logo.png" alt="">
            <h1>Crear Reserva</h1>
            <form action="{{ route('store.reservacion') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ciudad">lugares</label>
                    <select name="lugar_id" id="lugar_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione un lugar</option>
                        @foreach ($lugares as $lugar)
                        @if($lugar->ocupado <= 0)
                            <option value="{{ $lugar->id }}"> {{$lugar->posx}},{{ $lugar->posy }}</option>
                         @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select name="cliente_id" id="cliente_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione un Cliente</option>
                        @foreach ($clientes as $cliente)
                            
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->rut }}</option>
                           
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="auto_id">vehiculo</label>
                    <select name="auto_id" id="auto_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione un Vehiculo</option>
                        @foreach ($vehiculos as $vehiculo)
                            <option value="{{ $vehiculo->id }}">{{$vehiculo->patente}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_inicio">Hora actual</label>
                    <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary my-2">Crear Reservacion</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </form>
        </div>
        <div class="modal-footer"> 
        </div>
      </div>
    </div>
  </div> 
  <!-- Modal liberar -->
<div class="modal fade" id="liberar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #BBDEFB; color: black;">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pago Reservacion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <img class="logomodal" src="img/logo.png" alt="">
         <form action="{{ route('eliminar.reservacion') }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <label for="ciudad">lugares</label>
                <select name="lugar_id" id="lugar_id" class="form-control" required>
                    <option value="" disabled selected>Seleccione un lugar</option>
                    @foreach ($lugares as $lugar)
                    @if($lugar->ocupado > 0)
                        <option value="{{ $lugar->id }}"> {{$lugar->posx}},{{ $lugar->posy }}</option>
                     @endif
                    @endforeach
                </select>
            </div>
            <div id="lugarDetalles" class="mt-3">
                <!-- Aquí se actualizará la información -->
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>

        </div>
      </div>
    </div>
  </div>     

            </div>
            <!-- Main content -->
            <div class="col-11 main-content">
                <div class="row">  
                <div id ="1,1" class="divauxiliar col-1"><h1>1,1</h1></div>
                <div id ="1,2" class="divauxiliar col-1"><h1>1,2</h1></div>
                <div id ="1,3" class="divauxiliar col-1"><h1>1,3</h1></div>
                <div id ="1,4" class="divauxiliar col-1"><h1>1,4</h1></div>
                <div id ="1,5" class="divauxiliar col-1"><h1>1,5</h1></div>
                <div id ="1,6" class="divauxiliar col-1"><h1>1,6</h1></div>
                <div id ="1,7" class="divauxiliar col-1"><h1>1,7</h1></div>
                <div id ="1,8" class="divauxiliar col-1"><h1>1,8</h1></div>
                <div id ="1,9" class="divauxiliar col-1" ><h1>1,9</h1></div>
                <div id ="1,10" class="divauxiliar col-1"><h1>1,10</h1></div>
                <div id ="2,1" class="divauxiliar col-1"><h1>2,1</h1></div>
                <div id ="2,2" class="divauxiliar col-1"><h1>2,2</h1></div>
                <div id ="2,3" class="divauxiliar col-1"><h1>2,3</h1></div>
                <div id ="2,4" class="divauxiliar col-1"><h1>2,4</h1></div>
                <div id ="2,5" class="divauxiliar col-1"><h1>2,5</h1></div>
                <div id ="2,6" class="divauxiliar col-1"><h1>2,6</h1></div>
                <div id ="2,7" class="divauxiliar col-1"><h1>2,7</h1></div>
                <div id ="2,8" class="divauxiliar col-1"><h1>2,8</h1></div>
                <div id ="2,9" class="divauxiliar col-1"><h1>2,9</h1></div>
                <div id ="2,10" class="divauxiliar col-1"><h1>2,10</h1></div>

            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const lugares = @json($lugares); // Convierte el array PHP a JSON


document.addEventListener("DOMContentLoaded", function() {
    lugares.forEach(lugar => {
        if (lugar.ocupado) {
            const id = `${lugar.posx},${lugar.posy}`;
            const celda = document.getElementById(id);
            if (celda) {
                const img = document.createElement('img');
                img.src = '/img/autoarriba.png';
                img.alt = 'Auto';
                celda.appendChild(img);
            }
        }
    });


$('#liberar').on('shown.bs.modal', function () {
    const selectElement = document.getElementById('lugar_id');
    if (selectElement) {
        selectElement.addEventListener('change', function () {
            console.log('Evento change ejecutado desde el modal');
        });
    }
});

document.addEventListener('change', function (e) {
    if (e.target && e.target.id === 'lugar_id') {
        const lugar_Id = e.target.value;
        console.log('Lugar seleccionado:', lugar_Id);

        // Realizar una solicitud AJAX al backend
        fetch("{{ route('detalles.lugar') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ lugar_id: lugar_Id })
        })
        .then(response => {
            if (!response.ok) {
                // Si el servidor devuelve un error (404, 500, etc.)
                throw new Error('No existe reservación');
            }
            return response.json();
        })
        .then(data => {
            if (data.message) {
                // Mostrar mensaje si no hay vehículo asociado
                document.querySelector('#lugarDetalles').innerHTML = `<p>${data.message}</p>`;
            } else {
                // Actualizar modal con datos del vehículo
                document.querySelector('#lugarDetalles').innerHTML = `
                    <p><strong>Vehículo:</strong> ${data.vehiculo}</p>
                    <p><strong>Tiempo de uso:</strong> ${data.tiempo_ocupacion} horas</p>
                    <p><strong>Total a pagar:</strong> $${data.monto}</p>
                    <button id="pagarReserva" class="btn btn-primary">Pagar</button>`;

                    document.getElementById('pagarReserva').addEventListener('click', function () {
                    pagarReserva(lugar_Id);
                });
            }
        })
        .catch(error => {
            // Manejo de errores, mostrar mensaje en el modal
            console.error('Error al obtener los detalles:', error);
            document.querySelector('#lugarDetalles').innerHTML = `<p>No existe reservación.</p>`;
        });
    }
});

function pagarReserva(lugar_Id) {
    console.log(`Intentando eliminar la reservación para el lugar con ID: ${lugar_Id}`);
    fetch("{{ route('eliminar.reservacion') }}", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ lugar_id: lugar_Id }) // Enviar el lugar_id para eliminar la reservación
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al eliminar la reservación');
        }
        return response.json();
    })
    .then(data => {
        alert('Pago realizado con éxito. La reservación ha sido eliminada.');
        window.location.href = data.redirect;
    })
    .catch(error => {
        console.error('Error al procesar el pago:', error);
        alert('Hubo un error al procesar el pago.');
    });
    }
});

    </script>
</body>
</html>
@endsection