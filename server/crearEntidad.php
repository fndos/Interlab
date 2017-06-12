<?php

include '../dbh.php';
$idEntidad = $_POST['idEntidad'];
$nombre = $_POST['nombre'];
$titular = $_POST['titular'];
$email = $_POST['email'];


$query = "INSERT INTO entidad (idEntidad, nombre, titular, email) VALUES ('$idEntidad', '$nombre', '$titular', '$email')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-entidad-new.php");