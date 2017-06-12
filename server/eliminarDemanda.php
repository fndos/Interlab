<?php

include '../dbh.php';
$idDemanda = $_POST['idDemanda'];

$query = "DELETE FROM demanda WHERE idDemanda='$idDemanda'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-del.php");