<?php

include '../dbh.php';
$idDemanda = $_POST['idDemanda'];
$comentario = $_POST['comentario'];


$query = "UPDATE demanda SET comentario='$comentario' WHERE idDemanda='$idDemanda'";

$result = mysqli_query($conn, $query);
header("Location: ../jefe.php");