<?php

include '../dbh.php';
$idEstab = $_POST['idEstab'];
$idEntidad = $_POST['idEntidad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];


$query = "UPDATE establecimiento SET idEstab='$idEstab', idEntidad='$idEntidad', direccion='$direccion', telefono='$telefono', ciudad='$ciudad', estado='$estado' WHERE idEstab='$idEstab'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-establecimiento-mod.php");