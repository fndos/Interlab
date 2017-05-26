<?php

include '../dbh.php';
$idServicio = $_POST['idServicio'];
$idEsp = $_POST['idEsp'];
$nombre = $_POST['nombre'];
$costo = $_POST['costo'];


$query = "UPDATE servicio SET idServicio='$idServicio', idEsp='$idEsp', nombre='$nombre', costo='$costo' WHERE idServicio='$idServicio'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-servicio.php");