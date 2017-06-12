<?php

include '../dbh.php';
$idEstab = $_POST['idEstab'];

$query = "DELETE FROM establecimiento WHERE idEstab='$idEstab'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-establecimiento-del.php");