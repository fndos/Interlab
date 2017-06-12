<?php

include '../dbh.php';
$idMedicamento = $_POST['idMedicamento'];

$query = "DELETE FROM medicamento WHERE idMedicamento='$idMedicamento'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-medicamento-del.php");