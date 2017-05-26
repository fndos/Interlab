<?php

include '../dbh.php';
$idExamen = $_POST['idExamen'];

$query = "DELETE FROM examen WHERE idExamen='$idExamen'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-examen.php");