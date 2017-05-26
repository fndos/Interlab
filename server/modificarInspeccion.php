<?php

include '../dbh.php';
$idInspeccion = $_POST['idInspeccion'];
$idUsuario = $_POST['idUsuario'];
$idLista = $_POST['idLista'];
$fecha = $_POST['fecha'];
$observacion = $_POST['observacion'];
$estado = $_POST['estado'];

$query = "UPDATE inspeccion SET idInspeccion='$idInspeccion', idUsuario='$idUsuario', idLista='$idLista', fecha='$fecha', observacion='$observacion', estado='$estado' WHERE idInspeccion='$idInspeccion'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-inspeccion.php");