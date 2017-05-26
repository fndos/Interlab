<?php

include '../dbh.php';
$idMedicamento = $_POST['idMedicamento'];
$idMed = $_POST['idMed'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO medicamento (idMedicamento, idMed, nombre) VALUES ('$idMedicamento', '$idMed', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-medicamento.php");