<?php
include '../config/conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM peliculas WHERE id='$id'";
$resultado = mysqli_query($conn,$sql);
$pelicula = mysqli_fetch_assoc($resultado);

if(isset($_POST['editar'])){

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $update = "UPDATE peliculas
               SET titulo='$titulo', descripcion='$descripcion'
               WHERE id='$id'";

    mysqli_query($conn,$update);

    header('Location: dashboard.php');
}
?>