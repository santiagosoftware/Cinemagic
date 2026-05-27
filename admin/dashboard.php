<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../login.php");
    exit();
}

if($_SESSION['usuario']['rol'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #65a0ff;
            color:white;
            font-family:Arial;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background: #0e29f2;
            position:fixed;
            padding-top:30px;
        }

        .sidebar h2{
            text-align:center;
            margin-bottom:40px;
            color: #ffffff;
            font-weight:bold;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px 25px;
            transition:0.3s;
            font-size:18px;
        }

        .sidebar a:hover{
            background: #e50914;
        }

        .main{
            margin-left:250px;
            padding:30px;
        }

        .card-box{
            background: #0e29f2;
            padding:30px;
            border-radius:20px;
            text-align:center;
            transition:0.3s;
        }

        .card-box:hover{
            transform:translateY(-5px);
        }

        .card-box h3{
            font-size:40px;
        }

        .welcome{
            margin-bottom:30px;
        }

    </style>

</head>
<body>

<div class="sidebar">

    <h2>Cinemagic</h2>

    <a href="dashboard.php">
          Dashboard
    </a>

    <a href="agregar_pelicula.php">
          Agregar Película
    </a>

    <a href="ver_usuarios.php">
          Ver Usuarios
    </a>

    <a href="ver_compras.php">
          Ver Compras
    </a>

    <a href="../index.php">
          Ir al Sitio
    </a>

    <a href="../logout.php">
          Cerrar Sesión
    </a>

</div>

<div class="main">

    <div class="welcome">
        <h1>
            Bienvenido Admin 
        </h1>

        <p>
            Hola <?php echo $usuario['nombre']; ?>
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card-box">

                <h3>🎬</h3>

                <h4>Películas</h4>

                <p>
                    Gestiona la cartelera
                </p>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">

                <h3>👥</h3>

                <h4>Usuarios</h4>

                <p>
                    Administra usuarios
                </p>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">

                <h3>💳</h3>

                <h4>Compras</h4>

                <p>
                    Revisa ventas
                </p>

            </div>
        </div>

    </div>

</div>

</body>
</html>