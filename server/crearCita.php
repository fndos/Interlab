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

$query = "INSERT INTO cita (idCita, idUsuario, idServicio, profesional, fecha, hora, observacion, asistio, estado, idImagen, idExamen, idEnfermedad, idMedicamento) VALUES ('$idCita', '$idUsuario', '$idServicio', '$profesional', '$fecha', '$hora', '$observacion', '$asistio', '$estado', '$idImagen', '$idExamen', '$idEnfermedad', '$idMedicamento')";

$result = mysqli_query($conn, $query);
header("Location: ../doctor-cita-new.php");