<?php

include '../dbh.php';
$idEn = $_POST['idEn'];

$query = "DELETE FROM tipoenfermedad WHERE idEn='$idEn'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipoenfermedad-del.php");