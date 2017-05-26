<?php

include '../dbh.php';
$idHallazgo = $_POST['idHallazgo'];
$idHall = $_POST['idHall'];
$nombre = $_POST['nombre'];


$query = "INSERT INTO hallazgo (idHallazgo, idHall, nombre) VALUES ('$idHallazgo', '$idHall', '$nombre')";

$result = mysqli_query($conn, $query);
header("Location: ../admin-hallazgo.php");