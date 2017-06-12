<?php

include '../dbh.php';
$idDep = $_POST['idDep'];

$query = "DELETE FROM departamento WHERE idDep='$idDep'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-departamento-del.php");