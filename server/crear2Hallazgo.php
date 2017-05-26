<?php

include '../dbh.php';
$idHall = $_POST['idHall'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO tipohallazgo (idHall, nombre) VALUES ('$idHall', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipohallazgo.php");