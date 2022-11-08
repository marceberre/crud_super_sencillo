<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include 'conexion.php';
	$sentencia = $bd->prepare("DELETE FROM alumnos WHERE id_alumno = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: ../index.php');
	}else{
		echo "Error";
	}

?>