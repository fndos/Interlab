<?php

include '../dbh.php';
$idEnfermedad = $_POST['idEnfermedad'];

$query = "DELETE FROM enfermedad WHERE idEnfermedad='$idEnfermedad'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-enfermedad-del.php");