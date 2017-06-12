<?php

include '../dbh.php';
$idInspeccion = $_POST['idInspeccion'];

$query = "DELETE FROM inspeccion WHERE idInspeccion='$idInspeccion'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-inspeccion-del.php");