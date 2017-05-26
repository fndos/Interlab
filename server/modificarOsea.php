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

$query = "UPDATE osea SET idOsea='$idOsea', idUsuario='$idUsuario', fecha='$fecha', contratista='$contratista', servicio='$servicio', monto='$monto', observacion='$observacion', estado='$estado' WHERE idOsea='$idOsea'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-orden.php");