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
    <style>
        .body{
            width: 100%;
        }
        .sidebar {
            background-color: #f8f9fa;
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
           /* padding:5%;*/
            display: flex;
            height: 100vh;
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-1 sidebar">
                <div class="content">
                    <img src="logo.png" alt="Logo" class="mb-4" style="width: 150px;">
                    <button class="btn btn-primary mb-2">Botón 1</button>
                    <button class="btn btn-secondary">Botón 2</button>
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
                <div id ="2,1 " class="divauxiliar col-1"><h1>2,1</h1></div>
                <div id ="2,2 " class="divauxiliar col-1"><h1>2,2</h1></div>
                <div id ="2,3 " class="divauxiliar col-1"><h1>2,3</h1></div>
                <div id ="2,4 " class="divauxiliar col-1"><h1>2,4</h1></div>
                <div id ="2,5 " class="divauxiliar col-1"><h1>2,5</h1></div>
                <div id ="2,6 " class="divauxiliar col-1"><h1>2,6</h1></div>
                <div id ="2,7 " class="divauxiliar col-1"><h1>2,7</h1></div>
                <div id ="2,8 " class="divauxiliar col-1"><h1>2,8</h1></div>
                <div id ="2,9 " class="divauxiliar col-1"><h1>2,9</h1></div>
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
});
    </script>
</body>
</html>
@endsection