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

$query = "UPDATE cai SET idCai='$idCai', idUsuario='$idUsuario', fechaInforme='$fechaInforme', severidad='$severidad', turno='$turno', fechaSuceso='$fechaSuceso', danosMateriales='$danosMateriales', monto='$monto', estado='$estado', jornadasPerdidas='$jornadasPerdidas', descripcion='$descripcion', partesAfectadas='$partesAfectadas', atendidoEn='$atendidoEn', reposo='$reposo', desde='$desde', hasta='$hasta', recomendaciones='$recomendaciones', accionesCorrectivas='$accionesCorrectivas', elaborado='$elaborado' WHERE idCai='$idCai'";

$result = mysqli_query($conn, $query);
header("Location: ../seguridad-cai.php");