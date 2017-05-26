<?php

include '../dbh.php';
$idTrabajo = $_POST['idTrabajo'];

$query = "DELETE FROM puestotrabajo WHERE idTrabajo='$idTrabajo'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-trabajo.php");