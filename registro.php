<?php
include 'config/conexion.php';

if(isset($_POST['registrar'])){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nombre,correo,password)
            VALUES('$nombre','$correo','$password')";

    mysqli_query($conn,$sql);

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #65a0ff;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial;
        }

        .registro-box{
            width:400px;
            background: #0e29f2;
            padding:40px;
            border-radius:20px;
            box-shadow:0px 0px 20px rgba(0,0,0,0.5);
        }

        .registro-box h1{
            text-align:center;
            margin-bottom:30px;
            color:white;
            font-weight:bold;
        }

        .form-control{
            background: #2a2a2a;
            border:none;
            color:white;
            margin-bottom:20px;
            height:50px;
        }
        
        .form-control::placeholder{
            color:#bfbfbf;
        }

        .form-control:focus{
            background: #2a2a2a;
            color:white;
            box-shadow:none;
            border:1px solid #e50914;
        }

        .btn-danger{
            width:100%;
            height:50px;
            font-size:18px;
            background:#e50914;
            border:none;
        }

        .btn-danger:hover{
            background:#ff1f1f;
        }

        .login-link{
            text-align:center;
            margin-top:20px;
            color:white;
        }

        .login-link a{
            color: #e50914;
            text-decoration:none;
        }

    </style>

</head>
<body>

<div class="registro-box">

    <h1>Crear Cuenta</h1>

    <form method="POST">

        <input 
            type="text" 
            name="nombre" 
            class="form-control"
            placeholder="Nombre"
            required
        >

        <input 
            type="email" 
            name="correo"
            class="form-control"
            placeholder="Correo"
            required
        >

        <input 
            type="password"
            name="password"
            class="form-control"
            placeholder="Contraseña"
            required
        >

        <button name="registrar" class="btn btn-danger">
            Registrarse
        </button>

    </form>

    <div class="login-link">

        ¿Ya tienes cuenta?

        <a href="login.php">
            Inicia Sesión
        </a>

    </div>

</div>

</body>
</html>