<?php

include '../dbh.php';
$idExamen = $_POST['idExamen'];
$idEx = $_POST['idEx'];
$nombre = $_POST['nombre'];


$query = "UPDATE examen SET idExamen='$idExamen', idEx='$idEx', nombre='$nombre' WHERE idExamen='$idExamen'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-examen.php");