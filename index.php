<?php
session_start();
include 'config/conexion.php';

$query = "SELECT * FROM peliculas";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cinemagic</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #65a0ff;
            color:white;
        }

        .card{
            background: #fff7f7;
            color: #000000;
            transition:0.3s;
            border:none;
            overflow:hidden;
        }

        .card:hover{
            transform:scale(1.03);
        }

        .banner{
            height:500px;
            background:url('assets/img/banner.jpg');
            background-size:cover;
            background-position:center;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .banner h1{
            font-size:70px;
            font-weight:bold;
            text-shadow:2px 2px 10px #000000;
        }

        .navbar{
            padding:15px;
            color: #000000;
        }

        .navbar-brand{
            font-size:30px;
            color: #fff7f7;
            font-weight:bold;
        }

        .card-body h3{
            color: #000000;
        }

        .btn-danger{
            background: #e50914;
            border:none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg"
     style="background: #0e29f2;">
    <div class="container">

        <a class="navbar-brand" href="#">
            🎬 Cinemagic
        </a>

        <div>

            <?php if(isset($_SESSION['usuario'])){ ?>

                <a href="perfil.php" class="btn btn-outline-light">
                    👤 Mi Perfil
                </a>

                <?php if($_SESSION['usuario']['rol'] == 'admin'){ ?>

                    <a href="admin/dashboard.php" class="btn btn-warning">
                        ⚙️ Admin
                    </a>

                <?php } ?>

                <a href="logout.php" class="btn btn-danger">
                    Cerrar Sesión
                </a>

            <?php } else { ?>

                <a href="login.php" class="btn btn-danger">
                    Iniciar Sesión
                </a>

                <a href="registro.php" class="btn btn-outline-light">
                    Registro
                </a>

            <?php } ?>

        </div>
    </div>
</nav>

<div class="banner">
    <h1>Bienvenido a Cinemagic</h1>
</div>

<div class="container mt-5">

    <h2 class="mb-4">🎥 Cartelera</h2>

    <div class="row">

        <?php while($pelicula = mysqli_fetch_assoc($resultado)){ ?>

        <div class="col-md-4 mb-4">

            <div class="card h-100">

                <img 
                    src="assets/img/<?php echo $pelicula['imagen']; ?>" 
                    class="card-img-top"
                    height="450"
                    style="object-fit:cover;"
                >

                <div class="card-body">

                    <h3>
                        <?php echo $pelicula['titulo']; ?>
                    </h3>

                    <p>
                        <?php echo substr($pelicula['descripcion'],0,100); ?>...
                    </p>

                    <p>
                        ⏰ <?php echo $pelicula['horario']; ?>
                    </p>

                    <p>
                        💲<?php echo $pelicula['precio']; ?>
                    </p>

                    <a 
                        href="peliculas/detalle.php?id=<?php echo $pelicula['id']; ?>" 
                        class="btn btn-danger"
                    >
                        Ver Película
                    </a>

                </div>
            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>