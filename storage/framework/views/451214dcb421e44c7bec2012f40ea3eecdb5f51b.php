
<?php $__env->startSection('content'); ?>
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
                <div class="divauxiliar col-1"><h1>1,1</h1><img src="img/autoarriba.png" alt=""></div>
                <div class="divauxiliar col-1"><h1>1,2</h1></div>
                <div class="divauxiliar col-1"><h1>1,3</h1></div>
                <div class="divauxiliar col-1"><h1>1,4</h1></div>
                <div class="divauxiliar col-1"><h1>1,5</h1></div>
                <div class="divauxiliar col-1"><h1>1,6</h1></div>
                <div class="divauxiliar col-1"><h1>1,7</h1></div>
                <div class="divauxiliar col-1"><h1>1,8</h1></div>
                <div class="divauxiliar col-1" ><h1>1,9</h1></div>
                <div class="divauxiliar col-1"><h1>1,10</h1></div>
                <div class="divauxiliar col-1"><h1>2,1</h1></div>
                <div class="divauxiliar col-1"><h1>2,2</h1></div>
                <div class="divauxiliar col-1"><h1>2,3</h1></div>
                <div class="divauxiliar col-1"><h1>2,4</h1></div>
                <div class="divauxiliar col-1"><h1>2,5</h1></div>
                <div class="divauxiliar col-1"><h1>2,6</h1></div>
                <div class="divauxiliar col-1"><h1>2,7</h1></div>
                <div class="divauxiliar col-1"><h1>2,8</h1></div>
                <div class="divauxiliar col-1"><h1>2,9</h1></div>
                <div class="divauxiliar col-1"><h1>2,10</h1></div>

            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Daniel practica no Tocar\baCKEND\LinkinParking\resources\views/vistaEmpleado/index.blade.php ENDPATH**/ ?>