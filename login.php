<?php
session_start();
include 'config/conexion.php';

if(isset($_POST['login'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";

    $resultado = mysqli_query($conn,$sql);

    if(mysqli_num_rows($resultado) > 0){

        $usuario = mysqli_fetch_assoc($resultado);

        if(password_verify($password,$usuario['password'])){

            $_SESSION['usuario'] = $usuario;

            if($usuario['rol'] == 'admin'){
                header('Location: admin/dashboard.php');
            }else{
                header('Location: index.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

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

        .login-box{
            width:400px;
            background: #0e29f2;
            padding:40px;
            border-radius:20px;
            box-shadow:0px 0px 20px rgba(0,0,0,0.5);
        }

        .login-box h1{
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

        .registro-link{
            text-align:center;
            margin-top:20px;
            color:white;
        }

        .registro-link a{
            color:#e50914;
            text-decoration:none;
        }

    </style>

</head>
<body>

<div class="login-box">

    <h1> Iniciar Sesión</h1>

    <form method="POST">

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

        <button name="login" class="btn btn-danger">
            Entrar
        </button>

    </form>

    <div class="registro-link">

        ¿No tienes cuenta?

        <a href="registro.php">
            Regístrate
        </a>

    </div>

</div>

</body>
</html>