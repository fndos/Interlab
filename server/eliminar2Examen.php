<?php

include '../dbh.php';
$idEx = $_POST['idEx'];

$query = "DELETE FROM tipoexamen WHERE idEx='$idEx'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipoexamen-del.php");