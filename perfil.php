<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #65a0ff;
            color:white;
        }

        .perfil-box{
            max-width:500px;
            margin:auto;
            margin-top:100px;
            background: #0e29f2;
            padding:30px;
            border-radius:15px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="perfil-box">

        <h1 class="mb-4">👤 Mi Perfil</h1>

        <h4>Nombre:</h4>
        <p><?php echo $usuario['nombre']; ?></p>

        <h4>Correo:</h4>
        <p><?php echo $usuario['correo']; ?></p>

        <h4>Rol:</h4>
        <p><?php echo $usuario['rol']; ?></p>

        <a href="index.php" class="btn btn-danger">
            Volver al Inicio
        </a>

        <a href="logout.php" class="btn btn-outline-light">
            Cerrar Sesión
        </a>

    </div>

</div>

</body>
</html>