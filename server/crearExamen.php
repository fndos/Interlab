<?php

include '../dbh.php';
$idExamen = $_POST['idExamen'];
$idEx = $_POST['idEx'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO examen (idExamen, idEx, nombre) VALUES ('$idExamen', '$idEx', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-examen.php");