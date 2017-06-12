<?php

include '../dbh.php';
$idMed = $_POST['idMed'];

$query = "DELETE FROM tipomedicamento WHERE idMed='$idMed'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipomedicamento-del.php");