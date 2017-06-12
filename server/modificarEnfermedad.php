<?php

include '../dbh.php';
$idEnfermedad = $_POST['idEnfermedad'];
$idEn = $_POST['idEn'];
$nombre = $_POST['nombre'];


$query = "UPDATE enfermedad SET idEnfermedad='$idEnfermedad', idEn='$idEn', nombre='$nombre' WHERE idEnfermedad='$idEnfermedad'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-enfermedad-mod.php");