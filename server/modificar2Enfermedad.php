<?php

include '../dbh.php';
$idEn = $_POST['idEn'];
$nombre = $_POST['nombre'];


$query = "UPDATE tipoenfermedad SET idEn='$idEn', nombre='$nombre' WHERE idEn='$idEn'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipoenfermedad-mod.php");