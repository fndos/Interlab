<?php

include '../dbh.php';
$idInforme = $_POST['idInforme'];
$idUsuario = $_POST['idUsuario'];
$idEpp = $_POST['idEpp'];
$fecha = $_POST['fecha'];
$cantidad = $_POST['cantidad'];
$observacion = $_POST['observacion'];

$query = "INSERT INTO informe (idInforme, idUsuario, idEpp, fecha, cantidad, observacion) VALUES ('$idInforme', '$idUsuario', '$idEpp', '$fecha', '$cantidad', '$observacion')";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-epp.php");