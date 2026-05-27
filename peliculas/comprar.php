<?php
session_start();
include '../config/conexion.php';

if(!isset($_SESSION['usuario'])){
    header("Location: ../login.php");
    exit();
}

$id_pelicula = $_GET['id'];

$sqlPelicula = "SELECT * FROM peliculas WHERE id='$id_pelicula'";
$resultado = mysqli_query($conn,$sqlPelicula);
$pelicula = mysqli_fetch_assoc($resultado);

if(isset($_POST['comprar'])){

    $cantidad = $_POST['cantidad'];

    $total = $cantidad * $pelicula['precio'];

    $usuario_id = $_SESSION['usuario']['id'];

    $sql = "INSERT INTO compras
            (usuario_id,pelicula_id,cantidad,total)
            VALUES
            ('$usuario_id','$id_pelicula','$cantidad','$total')";

    mysqli_query($conn,$sql);

    $mensaje = "🎉 Compra realizada correctamente";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprar Entradas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#111;
            color:white;
            font-family:Arial;
        }

        .container-box{
            max-width:900px;
            margin:auto;
            margin-top:60px;
            background:#1c1c1c;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0px 0px 20px rgba(0,0,0,0.5);
        }

        .poster{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .info{
            padding:40px;
        }

        .titulo{
            font-size:40px;
            font-weight:bold;
            margin-bottom:20px;
        }

        .descripcion{
            color:#ccc;
            margin-bottom:20px;
        }

        .form-control{
            background:#2a2a2a;
            border:none;
            color:white;
            height:50px;
        }

        .form-control:focus{
            background:#2a2a2a;
            color:white;
            border:1px solid #e50914;
            box-shadow:none;
        }

        .btn-danger{
            background:#e50914;
            border:none;
            padding:12px 25px;
        }

        .btn-danger:hover{
            background:#ff1f1f;
        }

        .precio{
            font-size:25px;
            margin-bottom:20px;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="container-box">

        <div class="row g-0">

            <div class="col-md-4">

                <img 
                    src="../assets/img/<?php echo $pelicula['imagen']; ?>" 
                    class="poster"
                >

            </div>

            <div class="col-md-8">

                <div class="info">

                    <h1 class="titulo">
                        🎬 <?php echo $pelicula['titulo']; ?>
                    </h1>

                    <p class="descripcion">
                        <?php echo $pelicula['descripcion']; ?>
                    </p>

                    <div class="precio">
                        💲 Precio por entrada:
                        $<?php echo $pelicula['precio']; ?>
                    </div>

                    <div class="mb-4">
                        ⏰ Horario:
                        <?php echo $pelicula['horario']; ?>
                    </div>

                    <?php if(isset($mensaje)){ ?>

                        <div class="alert alert-success">
                            <?php echo $mensaje; ?>
                        </div>

                    <?php } ?>

                    <form method="POST">

                        <label class="mb-2">
                            Cantidad de entradas
                        </label>

                        <input 
                            type="number"
                            name="cantidad"
                            min="1"
                            class="form-control mb-4"
                            required
                        >

                        <div class="d-flex gap-3">

                            <button 
                                name="comprar"
                                class="btn btn-danger"
                            >
                                🎟 Comprar
                            </button>

                            <a 
                                href="detalle.php?id=<?php echo $pelicula['id']; ?>"
                                class="btn btn-secondary"
                            >
                                Volver
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>