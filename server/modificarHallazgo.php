<?php

include '../dbh.php';
$idHallazgo = $_POST['idHallazgo'];
$idHall = $_POST['idHall'];
$nombre = $_POST['nombre'];


$query = "UPDATE hallazgo SET idHallazgo='$idHallazgo', idHall='$idHall', nombre='$nombre' WHERE idHallazgo='$idHallazgo'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-hallazgo-mod.php");