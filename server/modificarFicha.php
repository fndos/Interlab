<?php

include '../dbh.php';
$idFicha = $_POST['idFicha'];
$idUsuario = $_POST['idUsuario'];
$fechaIngreso = $_POST['fechaIngreso'];
$vulnerabilidad = $_POST['vulnerabilidad'];
$detalle = $_POST['detalle'];
$grupoSanguineo = $_POST['grupoSanguineo'];
$nombreEmergencia = $_POST['nombreEmergencia'];
$celularEmergencia = $_POST['celularEmergencia'];
$peso = $_POST['peso'];
$talla = $_POST['talla'];
$imc = $_POST['imc'];
$pa = $_POST['pa'];
$fc = $_POST['fc'];
$fr = $_POST['fr'];
$quirurgicos = $_POST['quirurgicos'];
$traumaticos = $_POST['traumaticos'];
$alergicos = $_POST['alergicos'];
$enfermedades = $_POST['enfermedades'];
$medicamento = $_POST['medicamento'];
$medicamentoDetalle = $_POST['medicamentoDetalle'];

$query = "UPDATE ficha SET idFicha='$idFicha', idUsuario='$idUsuario', fechaIngreso='$fechaIngreso', vulnerabilidad='$vulnerabilidad', detalle='$detalle', grupoSanguineo='$grupoSanguineo', nombreEmergencia='$nombreEmergencia', celularEmergencia='$celularEmergencia', peso='$peso', talla='$talla', imc='$imc', pa='$pa', fc='$fc', fr='$fr', quirurgicos='$quirurgicos', traumaticos='$traumaticos', alergicos='$alergicos', enfermedades='$enfermedades', medicamento='$medicamento', medicamentoDetalle='$medicamento' WHERE idFicha='$idFicha'";

$result = mysqli_query($conn, $query);
header("Location: ../doctor.php");