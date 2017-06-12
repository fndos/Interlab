<?php

include '../dbh.php';
$idDemanda = $_POST['idDemanda'];
$idUsuario = $_POST['idUsuario'];
$estado = $_POST['estado'];


$query = "UPDATE demanda SET idUsuario='$idUsuario', estado='$estado' WHERE idDemanda='$idDemanda'";

$result = mysqli_query($conn, $query);
header("Location: ../jefe-redirigir.php");