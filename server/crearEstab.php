<?php

include '../dbh.php';
$idEstab = $_POST['idEstab'];
$idEntidad = $_POST['idEntidad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];


$query = "INSERT INTO establecimiento (idEstab, idEntidad, direccion, telefono, ciudad, estado) VALUES ('$idEstab', '$idEntidad', '$direccion', '$telefono', '$ciudad', '$estado')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-establecimiento-new.php");