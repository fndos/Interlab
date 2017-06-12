<?php

include '../dbh.php';
$idInspeccion = $_POST['idInspeccion'];
$idUsuario = $_POST['idUsuario'];
$idLista = $_POST['idLista'];
$fecha = $_POST['fecha'];
$observacion = $_POST['observacion'];
$estado = $_POST['estado'];

$query = "INSERT INTO inspeccion (idInspeccion, idUsuario, idLista, fecha, observacion, estado) VALUES ('$idInspeccion', '$idUsuario', '$idLista', '$fecha', '$observacion', '$estado')";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-inspeccion-new.php");