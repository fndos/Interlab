<?php

include '../dbh.php';
$idEsp = $_POST['idEsp'];

$query = "DELETE FROM especialidad WHERE idEsp='$idEsp'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-especialidad.php");