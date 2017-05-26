<?php

include '../dbh.php';
$idInforme = $_POST['idInforme'];
$idUsuario = $_POST['idUsuario'];
$idEpp = $_POST['idEpp'];
$fecha = $_POST['fecha'];
$cantidad = $_POST['cantidad'];
$observacion = $_POST['observacion'];

$query = "UPDATE informe SET idInforme='$idInforme', idUsuario='$idUsuario', idEpp='$idEpp', fecha='$fecha', cantidad='$cantidad', observacion='$observacion' WHERE idInforme='$idInforme'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-epp.php");