<?php

include '../dbh.php';
$idCorrectivo = $_POST['idCorrectivo'];
$nombre = $_POST['nombre'];


$query = "UPDATE medidacorrectiva SET idCorrectivo='$idCorrectivo', nombre='$nombre' WHERE idCorrectivo='$idCorrectivo'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-medida-mod.php");