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

if(isset($_POST['guardar'])){

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $horario = $_POST['horario'];
    $precio = $_POST['precio'];
    $trailer = $_POST['trailer'];

    $imagen = $_FILES['imagen']['name'];

    move_uploaded_file(
        $_FILES['imagen']['tmp_name'],
        '../assets/img/'.$imagen
    );

    $sql = "INSERT INTO peliculas
            (titulo,descripcion,imagen,trailer,horario,precio)
            VALUES
            ('$titulo','$descripcion','$imagen','$trailer','$horario','$precio')";

    mysqli_query($conn,$sql);

    $mensaje = "Película agregada correctamente";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Película</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #65a0ff;
            color:white;
            font-family:Arial;
        }

        .container-box{
            max-width:700px;
            margin:auto;
            margin-top:50px;
            background: #0e29f2;
            padding:40px;
            border-radius:20px;
        }

        .form-control{
            background:#2a2a2a;
            border:none;
            color:white;
            margin-bottom:20px;
        }
        
        .form-control::placeholder{
            color:#bfbfbf;
        }

        .form-control:focus{
            background:#2a2a2a;
            color:white;
            border:1px solid #e50914;
            box-shadow:none;
        }

        textarea{
            resize:none;
        }

        .btn-danger{
            background:#e50914;
            border:none;
        }

        .btn-danger:hover{
            background:#ff1f1f;
        }

        .titulo{
            margin-bottom:30px;
            text-align:center;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="container-box">

        <div class="titulo">
            <h1>🎬 Agregar Película</h1>
        </div>

        <?php if(isset($mensaje)){ ?>

            <div class="alert alert-success">
                <?php echo $mensaje; ?>
            </div>

        <?php } ?>

        <form method="POST" enctype="multipart/form-data">

            <input 
                type="text"
                name="titulo"
                class="form-control"
                placeholder="Título"
                required
            >

            <textarea 
                name="descripcion"
                class="form-control"
                rows="5"
                placeholder="Descripción"
                required
            ></textarea>

            <input 
                type="text"
                name="horario"
                class="form-control"
                placeholder="Horario"
                required
            >

            <input 
                type="number"
                name="precio"
                class="form-control"
                placeholder="Precio"
                required
            >

            <input 
                type="text"
                name="trailer"
                class="form-control"
                placeholder="Link Trailer YouTube"
            >

            <input 
                type="file"
                name="imagen"
                class="form-control"
                required
            >

            <div class="d-flex justify-content-between">

                <a href="dashboard.php" class="btn btn-secondary">
                    Volver
                </a>

                <button name="guardar" class="btn btn-danger">
                    Guardar Película
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>