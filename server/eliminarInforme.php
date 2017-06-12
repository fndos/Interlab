<?php

include '../dbh.php';
$idInforme = $_POST['idInforme'];

$query = "DELETE FROM informe WHERE idInforme='$idInforme'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-epp-del.php");