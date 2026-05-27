<?php
session_start();
include '../config/conexion.php';

if(!isset($_SESSION['usuario'])){
    header("Location: ../login.php");
    exit();
}

if($_SESSION['usuario']['rol'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$sql = "SELECT compras.*, usuarios.nombre, peliculas.titulo
        FROM compras
        INNER JOIN usuarios 
        ON compras.usuario_id = usuarios.id
        INNER JOIN peliculas 
        ON compras.pelicula_id = peliculas.id";

$resultado = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Compras</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #65a0ff;
            color:white;
            font-family:Arial;
        }

        .container-box{
            padding:40px;
        }

        .titulo{
            margin-bottom:30px;
        }

        .table{
            background: #0e29f2;;
            border-radius:15px;
            overflow:hidden;
        }

        .table thead{
            background: #e50914;
            color:white;
        }

        .table td,
        .table th{
            vertical-align:middle;
            background: #0e29f2;
            padding:15px;
        }

        .btn-danger{
            background: #e50914;
            border:none;
        }

        .btn-danger:hover{
            background: #ff1f1f;
        }

        .badge-total{
            background: #871919;
            padding:8px 12px;
            border-radius:10px;
            font-size:14px;
        }

    </style>

</head>
<body>

<div class="container container-box">

    <div class="d-flex justify-content-between align-items-center titulo">

        <h1>💳 Historial de Compras</h1>

        <a href="dashboard.php" class="btn btn-danger">
            Volver
        </a>

    </div>

    <div class="table-responsive">

        <table class="table table-dark table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Película</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>

                <?php while($compra = mysqli_fetch_assoc($resultado)){ ?>

                <tr>

                    <td>
                        <?php echo $compra['id']; ?>
                    </td>

                    <td>
                        <?php echo $compra['nombre']; ?>
                    </td>

                    <td>
                        🎬 <?php echo $compra['titulo']; ?>
                    </td>

                    <td>
                        <?php echo $compra['cantidad']; ?>
                    </td>

                    <td>
                        <span class="badge-total">
                            $<?php echo $compra['total']; ?>
                        </span>
                    </td>

                    <td>
                        <?php echo $compra['fecha']; ?>
                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>