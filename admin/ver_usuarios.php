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

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Usuarios</title>

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
            background: #0e29f2;
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
            background:#e50914;
            border:none;
        }

        .btn-danger:hover{
            background:#ff1f1f;
        }

    </style>

</head>
<body>

<div class="container container-box">

    <div class="d-flex justify-content-between align-items-center titulo">

        <h1>👥 Usuarios Registrados</h1>

        <a href="dashboard.php" class="btn btn-danger">
            Volver
        </a>

    </div>

    <div class="table-responsive">

        <table class="table table-dark table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                </tr>
            </thead>

            <tbody>

                <?php while($usuario = mysqli_fetch_assoc($resultado)){ ?>

                <tr>

                    <td>
                        <?php echo $usuario['id']; ?>
                    </td>

                    <td>
                        <?php echo $usuario['nombre']; ?>
                    </td>

                    <td>
                        <?php echo $usuario['correo']; ?>
                    </td>

                    <td>

                        <?php if($usuario['rol'] == 'admin'){ ?>

                            <span class="badge bg-danger">
                                Admin
                            </span>

                        <?php } else { ?>

                            <span class="badge bg-secondary">
                                Usuario
                            </span>

                        <?php } ?>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>