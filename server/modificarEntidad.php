<?php

include '../dbh.php';
$idEntidad = $_POST['idEntidad'];
$nombre = $_POST['nombre'];
$titular = $_POST['titular'];
$email = $_POST['email'];


$query = "UPDATE entidad SET idEntidad='$idEntidad', nombre='$nombre', titular='$titular', email='$email' WHERE idEntidad='$idEntidad'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-entidad.php");