<?php

include '../dbh.php';
$idOsea = $_POST['idOsea'];
$idUsuario = $_POST['idUsuario'];
$fecha = $_POST['fecha'];
$contratista = $_POST['contratista'];
$servicio = $_POST['servicio'];
$monto = $_POST['monto'];
$observacion = $_POST['observacion'];
$estado = $_POST['estado'];

$query = "INSERT INTO osea (idOsea, idUsuario, fecha, contratista, servicio, monto, observacion, estado) VALUES ('$idOsea', '$idUsuario', '$fecha', '$contratista', '$servicio', '$monto', '$observacion', '$estado')";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-orden.php");