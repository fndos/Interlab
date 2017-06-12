<?php

include '../dbh.php';
$idCorrectivo = $_POST['idCorrectivo'];

$query = "DELETE FROM medidacorrectiva WHERE idCorrectivo='$idCorrectivo'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-medida-del.php");