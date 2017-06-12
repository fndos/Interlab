<?php

include '../dbh.php';
$idCai = $_POST['idCai'];

$query = "DELETE FROM cai WHERE idCai='$idCai'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-cai-del.php");