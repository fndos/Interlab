<?php

include '../dbh.php';
$idMedicamento = $_POST['idMedicamento'];
$idMed = $_POST['idMed'];
$nombre = $_POST['nombre'];


$query = "UPDATE medicamento SET idMedicamento='$idMedicamento', idMed='$idMed', nombre='$nombre' WHERE idMedicamento='$idMedicamento'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-medicamento.php");