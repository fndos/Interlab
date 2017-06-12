<?php

include '../dbh.php';
$idUsuario = $_POST['idUsuario'];
$idTrabajo = $_POST['idTrabajo'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$birthday = $_POST['birthday'];
$sexo = $_POST['sexo'];
$estadoCivil = $_POST['estadoCivil'];
$educacion = $_POST['educacion'];
$idDep = $_POST['idDep'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$rol = $_POST['rol'];

$query = "UPDATE usuario SET idUsuario='$idUsuario', idTrabajo='$idTrabajo', nombres='$nombres', apellidos='$apellidos', birthday='$birthday', sexo='$sexo', estadoCivil='$estadoCivil', educacion='$educacion', idDep='$idDep', telefono='$telefono', celular='$celular', direccion='$direccion', email='$email', estado='$estado', user='$user', pass='$pass', rol='$rol' WHERE idUsuario='$idUsuario'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-mod.php");