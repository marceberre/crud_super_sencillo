<?php

if ($_POST['oculto'] <> 124986){
    echo('error');
}

include('conexion.php');

$dni = $_POST['dni'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];

$sentencia = $bd->prepare("INSERT INTO alumnos(dni,apellido,nombre) VALUES (?,?,?);");
$resultado = $sentencia->execute([$dni,$apellido,$nombre]);

if ($resultado === TRUE) {
    //echo "Insertado correctamente";
    header('Location: ../index.php');
}else{
    echo "Error";
}