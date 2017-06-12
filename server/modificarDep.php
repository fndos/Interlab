<?php

include '../dbh.php';
$idDep = $_POST['idDep'];
$idEstab = $_POST['idEstab'];
$nombre = $_POST['nombre'];


$query = "UPDATE departamento SET idDep='$idDep', idEstab='$idEstab', nombre='$nombre' WHERE idDep='$idDep'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-departamento-mod.php");