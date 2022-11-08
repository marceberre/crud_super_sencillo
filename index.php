<?php

include 'php/conexion.php';
$sentencia = $bd->query("SELECT * FROM alumnos ORDER BY apellido;");
$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>



<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escuela</title>
    <link rel="icon" type="image/x-icon" href="images/alumno.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid text-center bg-dark text-white fs-2">
        Escuela
    </div>
    <div class="container pt-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        Alumno
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nuevo alumno</h5>
                        <p class="card-text">
                        <form action="php/agregar_alumno.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="dni" placeholder="Número de documento" autofocus required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="apellido" placeholder="Apellido(s)" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)" required>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="oculto" value="124986">
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        Curso
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Listado de alumnos del curso</h5>
                        <p class="card-text">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">DNI</th>
                                    <th scope="col">APELLIDO(S)</th>
                                    <th scope="col">NOMBRE(S)</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($alumnos as $dato) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $dato->dni; ?></th>
                                        <td><?php echo $dato->apellido; ?></td>
                                        <td><?php echo $dato->nombre; ?></td>
                                        <td>
                                            <a href="php/editar_alumno.php?id=<?php echo $dato->id_alumno; ?>">
                                                <img src="images/edit.png" width="35" alt="editar">
                                            </a>
                                            <a href="php/eliminar_alumno.php?id=<?php echo $dato->id_alumno; ?>">
                                                <img src="images/delete.png" width="35" alt="eliminar">
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>