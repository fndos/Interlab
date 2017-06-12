<?php

include '../dbh.php';
$idEsp = $_POST['idEsp'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO especialidad (idEsp, nombre) VALUES ('$idEsp', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-especialidad-new.php");