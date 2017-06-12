<?php

include '../dbh.php';
$idMed = $_POST['idMed'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO tipomedicamento (idMed, nombre) VALUES ('$idMed', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipomedicamento-new.php");