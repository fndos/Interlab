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

$query = "UPDATE demanda SET idDemanda='$idDemanda', idUsuario='$idUsuario', idHallazgo='$idHallazgo', idCorrectivo='$idCorrectivo', idLista='$idLista', fecha='$fecha', fechaMax='$fechaMax', fechaCierre='$fechaCierre', descripcion='$descripcion', estado='$estado', comentario='$comentario' WHERE idDemanda='$idDemanda'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-mod.php");