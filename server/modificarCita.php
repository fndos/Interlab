<?php

include '../dbh.php';
$idCita = $_POST['idCita'];
$idUsuario = $_POST['idUsuario'];
$idServicio = $_POST['idServicio'];
$profesional = $_POST['profesional'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$observacion = $_POST['observacion'];
$asistio = $_POST['asistio'];
$estado = $_POST['estado'];
$idImagen = $_POST['idImagen'];
$idExamen = $_POST['idExamen'];
$idEnfermedad = $_POST['idEnfermedad'];
$idMedicamento = $_POST['idMedicamento'];

$query = "UPDATE cita SET idCita='$idCita', idUsuario='$idUsuario', idServicio='$idServicio', profesional='$profesional', fecha='$fecha', hora='$hora', observacion='$observacion', asistio='$asistio', estado='$estado', idImagen='$idImagen', idExamen='$idExamen', idEnfermedad='$idEnfermedad', idMedicamento='$idMedicamento' WHERE idCita='$idCita'";

$result = mysqli_query($conn, $query);
header("Location: ../doctor-cita-mod.php");