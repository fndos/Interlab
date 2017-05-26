<?php

include '../dbh.php';
$idFicha = $_POST['idFicha'];

$query = "DELETE FROM ficha WHERE idFicha='$idFicha'";

$result = mysqli_query($conn, $query);
header("Location: ../doctor.php");