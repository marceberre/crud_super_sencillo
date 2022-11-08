<?php 

	include 'conexion.php';
	$id = $_POST['id'];
	$dni = $_POST['dni'];
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];

	$sentencia = $bd->prepare("UPDATE alumnos SET dni = ?, apellido = ?, nombre = ? WHERE id_alumno = ?;");
	$resultado = $sentencia->execute([$dni, $apellido, $nombre, $id]);

	if ($resultado === TRUE) {
		header('Location: ../');
	}else{
		echo "Error";
	}
?>