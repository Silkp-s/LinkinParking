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
        .fondo {
            background-color: #E7F1F3;
        }
        .sidebar {
            background-color: #BCE4EB;
            height: 100vh;
        }
        .sidebar .content {
            height: 100%;
            display: flex;
            margin-top: 20vh;
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
            padding-left: 2%;
        }
        .main-content img {
            max-width: 100%;
            height: auto;
        }
        .divauxiliar {
            height: 250px;
            width: 150px;
            border-right: 5px solid yellow;
            border-left: 5px solid yellow;
            margin-right: 2px;
            margin-left: 2px;
        }
        .boton {
            width: 120px; /* Ancho del botón */
            height: 40px; /* Alto del botón */
            background-color: #25509D; /* Color de fondo */
            color: white; /* Color del texto */
            border: black;
            border-radius: 25px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de la fuente */
            cursor: grab; /* Cambiar el cursor al pasar sobre el botón */
        }
        button:hover {
            background-color: #09ad11 !important;
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
                    <button class="btn mb-3 boton" data-bs-toggle="modal" data-bs-target="#estimadoModal">
                        Estimado <i class="bi bi-cash-coin"></i>
                    </button>
                    <button class="btn boton" data-bs-toggle="modal" data-bs-target="#pagarModal">
                        Pagar <i class="bi bi-wallet ml-1"></i>
                    </button>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-11 main-content">
                <div class="row">
                    <div id="1,1" class="divauxiliar col-1"><h1>1,1</h1></div>
                    <div id="1,2" class="divauxiliar col-1"><h1>1,2</h1></div>
                    <div id="1,3" class="divauxiliar col-1"><h1>1,3</h1></div>
                    <div id="1,4" class="divauxiliar col-1"><h1>1,4</h1></div>
                    <div id="1,5" class="divauxiliar col-1"><h1>1,5</h1></div>
                    <div id="1,6" class="divauxiliar col-1"><h1>1,6</h1></div>
                    <div id="1,7" class="divauxiliar col-1"><h1>1,7</h1></div>
                    <div id="1,8" class="divauxiliar col-1"><h1>1,8</h1></div>
                    <div id="1,9" class="divauxiliar col-1"><h1>1,9</h1></div>
                    <div id="1,10" class="divauxiliar col-1"><h1>1,10</h1></div>
                    <div id="2,1" class="divauxiliar col-1"><h1>2,1</h1></div>
                    <div id="2,2" class="divauxiliar col-1"><h1>2,2</h1></div>
                    <div id="2,3" class="divauxiliar col-1"><h1>2,3</h1></div>
                    <div id="2,4" class="divauxiliar col-1"><h1>2,4</h1></div>
                    <div id="2,5" class="divauxiliar col-1"><h1>2,5</h1></div>
                    <div id="2,6" class="divauxiliar col-1"><h1>2,6</h1></div>
                    <div id="2,7" class="divauxiliar col-1"><h1>2,7</h1></div>
                    <div id="2,8" class="divauxiliar col-1"><h1>2,8</h1></div>
                    <div id="2,9" class="divauxiliar col-1"><h1>2,9</h1></div>
                    <div id="2,10" class="divauxiliar col-1"><h1>2,10</h1></div>
                </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection