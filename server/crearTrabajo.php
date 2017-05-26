<?php

include '../dbh.php';
$idTrabajo = $_POST['idTrabajo'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO puestotrabajo (idTrabajo, nombre) VALUES ('$idTrabajo', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-trabajo.php");