<?php

include '../dbh.php';
$idHall = $_POST['idHall'];

$query = "DELETE FROM tipohallazgo WHERE idHall='$idHall'";

$result = mysqli_query($conn, $query);
header("Location: ../admin-tipohallazgo.php");