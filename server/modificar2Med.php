<?php

include '../dbh.php';
$idMed = $_POST['idMed'];
$nombre = $_POST['nombre'];


$query = "UPDATE tipomedicamento SET idMed='$idMed', nombre='$nombre' WHERE idMed='$idMed'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipomedicamento-mod.php");