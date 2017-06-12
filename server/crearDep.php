<?php

include '../dbh.php';
$idDep = $_POST['idDep'];
$idEstab = $_POST['idEstab'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO departamento (idDep, idEstab, nombre) VALUES ('$idDep', '$idEstab', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-departamento-new.php");