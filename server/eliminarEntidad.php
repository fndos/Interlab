<?php

include '../dbh.php';
$idEntidad = $_POST['idEntidad'];

$query = "DELETE FROM entidad WHERE idEntidad='$idEntidad'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-entidad-del.php");