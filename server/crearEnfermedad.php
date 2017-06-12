<?php

include '../dbh.php';
$idEnfermedad = $_POST['idEnfermedad'];
$idEn = $_POST['idEn'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO enfermedad (idEnfermedad, idEn, nombre) VALUES ('$idEnfermedad', '$idEn', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-enfermedad-new.php");