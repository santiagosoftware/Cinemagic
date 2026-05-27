<?php
session_start();
include '../config/conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM peliculas WHERE id='$id'";
$resultado = mysqli_query($conn,$sql);
$pelicula = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $pelicula['titulo']; ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #65a0ff;
            color:white;
            font-family:Arial;
        }

        .container-box{
            margin-top:50px;
        }

        .poster{
            width:100%;
            border-radius:20px;
            box-shadow:0px 0px 20px rgba(0,0,0,0.5);
        }

        .info-box{
            padding:20px;
        }

        .titulo{
            font-size:50px;
            font-weight:bold;
            margin-bottom:20px;
        }

        .descripcion{
            font-size:18px;
            color: #000000;
            margin-bottom:20px;
        }

        .extra{
            font-size:20px;
            margin-bottom:15px;
        }

        .btn-danger{
            background:#e50914;
            border:none;
            padding:12px 25px;
            font-size:18px;
        }

        .btn-danger:hover{
            background:#ff1f1f;
        }

        iframe{
            border-radius:20px;
            margin-top:30px;
        }

    </style>

</head>
<body>

<div class="container container-box">

    <div class="row align-items-center">

        <div class="col-md-4">

            <img 
                src="../assets/img/<?php echo $pelicula['imagen']; ?>" 
                class="poster"
            >

        </div>

        <div class="col-md-8">

            <div class="info-box">

                <h1 class="titulo">
                    <?php echo $pelicula['titulo']; ?>
                </h1>

                <p class="descripcion">
                    <?php echo $pelicula['descripcion']; ?>
                </p>

                <div class="extra">
                    ⏰ Horario:
                    <?php echo $pelicula['horario']; ?>
                </div>

                <div class="extra">
                    💲 Precio:
                    $<?php echo $pelicula['precio']; ?>
                </div>

                <div class="mt-4">

                    <a 
                        href="comprar.php?id=<?php echo $pelicula['id']; ?>"
                        class="btn btn-danger"
                    >
                        🎟 Comprar Entradas
                    </a>

                    <a 
                        href="../index.php"
                        class="btn btn-secondary"
                    >
                        Volver
                    </a>

                </div>

                <?php if(!empty($pelicula['trailer'])){ ?>

                    <div class="mt-5">

                        <h3>🎥 Trailer</h3>

                        <iframe 
                            width="100%" 
                            height="400"
                            src="<?php echo $pelicula['trailer']; ?>"
                            frameborder="0"
                            allowfullscreen
                        ></iframe>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

</body>
</html>