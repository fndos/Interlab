<?php

include '../dbh.php';
$idServicio = $_POST['idServicio'];

$query = "DELETE FROM servicio WHERE idServicio='$idServicio'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-servicio.php");