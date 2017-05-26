<?php

include '../dbh.php';
$idServicio = $_POST['idServicio'];
$idEsp = $_POST['idEsp'];
$nombre = $_POST['nombre'];
$costo = $_POST['costo'];


$query = "INSERT INTO servicio (idServicio, idEsp, nombre, costo) VALUES ('$idServicio', '$idEsp', '$nombre', '$costo')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-servicio.php");