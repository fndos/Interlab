<?php

include '../dbh.php';
$idEsp = $_POST['idEsp'];
$nombre = $_POST['nombre'];


$query = "UPDATE especialidad SET idEsp='$idEsp', nombre='$nombre' WHERE idEsp='$idEsp'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-especialidad.php");