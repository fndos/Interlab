<?php

include '../dbh.php';
$idHall = $_POST['idHall'];
$nombre = $_POST['nombre'];


$query = "UPDATE tipohallazgo SET idHall='$idHall', nombre='$nombre' WHERE idHall='$idHall'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipohallazgo-mod.php");