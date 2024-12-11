<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Responsiva</title>
    <!-- Enlazamos Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.0/fabric.min.js"></script>

    <style>
        body, html {
            height: 100%;
        }

        .container-fluid {
            height: 100%;
        }

        .botonera {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
        }

        .botonera button {
            margin-bottom: 10px;
        }

        .imagen-logo {
            width: 100%;
            height: auto;
            object-fit: cover;
            
        }

        .imagen-principal {
            width: 85%;
            height: auto;
            position: relative;

        }
        .auto {
            position: absolute;
            width: 50px;
            height: 100px;
            background-image: url('{{ asset('img/autoarriba.png') }}');
            background-size: cover;
            background-position: center;
        }
        .contenedor-imagen {
            position: relative;  /* Para que los elementos dentro se posicionen con respecto a este contenedor */
        }
        #canvas {
            border: 1px solid #e60101;  /* Opcional: solo para mostrar el borde del canvas */
        }
    </style>
</head>
<body>

    <div class="container-fluid d-flex">
        <!-- Columna izquierda con la botonera -->
        <div class="col-2 botonera">
            <!-- Logo o Imagen -->
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid mb-4">
            <!-- Botones -->
            <button class="btn btn-primary w-100">Botón 1</button>
            <button class="btn btn-secondary w-100">Botón 2</button>
        </div>

        <!-- Columna derecha con la imagen principal -->
        <div class="col-10 p-0 d-flex justify-content-center align-items-center contenedor-imagen ">
           <!-- <img src="{{ asset('img/parkin.png') }}" alt="Imagen Principal" class="imagen-principal">-->
            <canvas id="canvas" width="1052" height="450"></canvas> <!-- Lienzo con el tamaño de la imagen -->
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
   
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var canvas = new fabric.Canvas('canvas');  // Inicializamos el lienzo

        // Cargar la imagen de la zona de estacionamiento
        fabric.Image.fromURL('{{ asset('img/parkin.png') }}', function(img) {
            img.set({
                left: 0,
                top: 0,
                scaleX: canvas.width / img.width,  // Escalado proporcional en el eje X
                scaleY: canvas.height / img.height  // Escalado proporcional en el eje Y
            });

            canvas.add(img);
            
            // Ahora, agregamos los vehículos
            @foreach ($lugares as $lugar)
                @if ($lugar->ocupado)
                    var pos_x = ({{ $lugar->posx }} - 1) + (1052 / 11); // Cálculo proporcional de la posición X
                    var pos_y = ({{ $lugar->posy }} - 1) + (450 / 2); // Cálculo proporcional de la posición Y
                    pos_x=100;
                    pos_y=100;
                    console.log('Posición X:', pos_x, 'Posición Y:', pos_y);

                    // Cargar la imagen del auto en esa posición
                    fabric.Image.fromURL('{{ asset('img/autoarriba.png') }}', function(img) {
                        img.set({
                            left: pos_x,
                            top: pos_y,
                            width: 50,  // Tamaño del auto
                            height: 50  // Tamaño del auto
                        });
                        
                        // Añadir el auto al canvas
                        canvas.add(img);
                        canvas.renderAll();

                        console.log(canvas);
                    });
                @endif
            @endforeach
        });
    });
</script>
</body>
</html>
