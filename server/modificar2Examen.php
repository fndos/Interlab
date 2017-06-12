<?php

include '../dbh.php';
$idEx = $_POST['idEx'];
$nombre = $_POST['nombre'];


$query = "UPDATE tipoexamen SET idEx='$idEx', nombre='$nombre' WHERE idEx='$idEx'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipoexamen-mod.php");