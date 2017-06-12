<?php
session_start();
include '../dbh.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$administrador = "SELECT * FROM usuario WHERE user='$user' AND pass='$pass' AND rol='Administrador'";
$doctor_enfermero = "SELECT * FROM usuario WHERE user='$user' AND pass='$pass' AND rol='Doctor/Enfermero'";
$tecnico_seguridad ="SELECT * FROM usuario WHERE user='$user' AND pass='$pass' AND rol='Tecnico/Seguridad'";
$jefe_lider = "SELECT * FROM usuario WHERE user='$user' AND pass='$pass' AND rol='Jefe/Lider'";

$admin = mysqli_query($conn, $administrador);
$doctor = mysqli_query($conn, $doctor_enfermero);
$seguridad = mysqli_query($conn, $tecnico_seguridad);
$jefe = mysqli_query($conn, $jefe_lider);

if ($row = $admin->fetch_assoc()) {
	//Administrador
	$_SESSION['user'] = $row['user']; 
	header("Location: ../admin.php");
} elseif ($row = $doctor->fetch_assoc()) {
	//Doctor/Enfermero
	$_SESSION['user'] = $row['user']; 
	header("Location: ../doctor.php");	
} elseif ($row = $seguridad->fetch_assoc()) {
	//Tenico/Seguridad
	$_SESSION['user'] = $row['user']; 
	header("Location: ../seguridad.php");	
} elseif ($row = $jefe->fetch_assoc()) {
	//Jefe/Lider
	$_SESSION['user'] = $row['user']; 
	header("Location: ../jefe.php");	
} else {
	header("Location: ../index-error.php");	
}

