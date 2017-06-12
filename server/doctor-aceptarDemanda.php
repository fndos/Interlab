<?php

include '../dbh.php';
$idDemanda = $_POST['idDemanda'];
$estado = $_POST['estado'];


$query = "UPDATE demanda SET estado='$estado' WHERE idDemanda='$idDemanda'";

$result = mysqli_query($conn, $query);
header("Location: ../doctor-demanda-aceptar.php");