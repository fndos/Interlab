<?php

include '../dbh.php';
$idEn = $_POST['idEn'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO tipoenfermedad (idEn, nombre) VALUES ('$idEn', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipoenfermedad.php");