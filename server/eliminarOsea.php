<?php

include '../dbh.php';
$idOsea = $_POST['idOsea'];

$query = "DELETE FROM osea WHERE idOsea='$idOsea'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-orden.php");