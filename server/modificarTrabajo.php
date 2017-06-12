<?php

include '../dbh.php';
$idTrabajo = $_POST['idTrabajo'];
$nombre = $_POST['nombre'];


$query = "UPDATE puestotrabajo SET idTrabajo='$idTrabajo', nombre='$nombre' WHERE idTrabajo='$idTrabajo'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-trabajo-mod.php");