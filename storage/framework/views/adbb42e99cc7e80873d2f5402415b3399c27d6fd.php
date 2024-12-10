

<?php $__env->startSection('content'); ?>
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

<div class="login-wrapper">
<a href="<?php echo e(route('index.ve')); ?>">aca</a>
    <div class="login-container">
        <div class="form-container">
            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo">
            <h1>Login</h1>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <label for="email">Usuario:</label>
                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <label for="password">Contraseña:</label>
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <a href="<?php echo e(route('password.request')); ?>">¿Olvidaste tu contraseña?</a>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
        <div class="parking-image-container">

            <img src="<?php echo e(asset('img/autos.png')); ?>" alt="Autos">
        </div>
    </div>
</div>


<footer class="footer">
    © 2024 LinkinParking. Todos los derechos reservados.
</footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Daniel practica no Tocar\baCKEND\LinkinParking\resources\views/auth/login.blade.php ENDPATH**/ ?>