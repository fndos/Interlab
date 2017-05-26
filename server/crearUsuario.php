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

$query = "INSERT INTO usuario (idUsuario, idTrabajo, nombres, apellidos, birthday, sexo, estadoCivil, educacion, idDep, telefono, celular, direccion, email, estado, user, pass, rol) VALUES ('$idUsuario', '$idTrabajo', '$nombres', '$apellidos', '$birthday', '$sexo', '$estadoCivil', '$educacion', '$idDep', '$telefono', '$celular', '$direccion', '$email', '$estado', '$user', '$pass', '$rol')";

$result = mysqli_query($conn, $query);
header("Location: ../admin.php");