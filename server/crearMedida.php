<?php

include '../dbh.php';
$idCorrectivo = $_POST['idCorrectivo'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO medidacorrectiva (idCorrectivo, nombre) VALUES ('$idCorrectivo', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-medida-new.php");