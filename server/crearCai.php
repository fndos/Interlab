<?php

include '../dbh.php';
$idCai = $_POST['idCai'];
$idUsuario = $_POST['idUsuario'];
$fechaInforme = $_POST['fechaInforme'];
$severidad = $_POST['severidad'];
$turno = $_POST['turno'];
$fechaSuceso = $_POST['fechaSuceso'];
$danosMateriales = $_POST['danosMateriales'];
$monto = $_POST['monto'];
$estado = $_POST['estado'];
$jornadasPerdidas = $_POST['jornadasPerdidas'];
$descripcion = $_POST['descripcion'];
$partesAfectadas = $_POST['partesAfectadas'];
$atendidoEn = $_POST['atendidoEn'];
$reposo = $_POST['reposo'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$recomendaciones = $_POST['recomendaciones'];
$accionesCorrectivas = $_POST['accionesCorrectivas'];
$elaborado = $_POST['elaborado'];

$query = "INSERT INTO cai (idCai, idUsuario, fechaInforme, severidad, turno, fechaSuceso, danosMateriales, monto, estado, jornadasPerdidas, descripcion, partesAfectadas, atendidoEn, reposo, desde, hasta, recomendaciones, accionesCorrectivas, elaborado) VALUES ('$idCai', '$idUsuario', '$fechaInforme', '$severidad', '$turno', '$fechaSuceso', '$danosMateriales', '$monto', '$estado', '$jornadasPerdidas', '$descripcion', '$partesAfectadas', '$atendidoEn', '$reposo', '$desde', '$hasta', '$recomendaciones', '$accionesCorrectivas', '$elaborado')";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-cai-new.php");