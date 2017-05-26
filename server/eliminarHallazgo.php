<?php

include '../dbh.php';
$idHallazgo = $_POST['idHallazgo'];

$query = "DELETE FROM hallazgo WHERE idHallazgo='$idHallazgo'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-hallazgo.php");