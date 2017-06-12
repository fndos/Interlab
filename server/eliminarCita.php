<?php

include '../dbh.php';
$idCita = $_POST['idCita'];

$query = "DELETE FROM cita WHERE idCita='$idCita'";

$result = mysqli_query($conn, $query);
header("Location: ../doctor-cita-del.php");