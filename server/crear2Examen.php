<?php

include '../dbh.php';
$idEx = $_POST['idEx'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO tipoexamen (idEx, nombre) VALUES ('$idEx', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipoexamen.php");