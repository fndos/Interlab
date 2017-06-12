<?php

include '../dbh.php';
$idDemanda = $_POST['idDemanda'];
$idUsuario = $_POST['idUsuario'];
$idHallazgo = $_POST['idHallazgo'];
$idCorrectivo = $_POST['idCorrectivo'];
$idLista = $_POST['idLista'];
$fecha = $_POST['fecha'];
$fechaMax = $_POST['fechaMax'];
$fechaCierre = $_POST['fechaCierre'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];
$comentario = $_POST['comentario'];


$query = "INSERT INTO demanda (idDemanda, idUsuario, idHallazgo, idCorrectivo, idLista, fecha, fechaMax, fechaCierre, descripcion, estado, comentario) VALUES ('$idDemanda', '$idUsuario', '$idHallazgo', '$idCorrectivo', '$idLista', '$fecha', '$fechaMax', '$fechaCierre', '$descripcion', '$estado', '$comentario')";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-new.php");