<?php

include '../dbh.php';
$idUsuario = $_POST['idUsuario'];

$query = "DELETE FROM usuario WHERE idUsuario='$idUsuario'";

$result = mysqli_query($conn, $query);
header("Location: ../admin.php");