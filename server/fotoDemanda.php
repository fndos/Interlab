<?php

displayImage();

function displayImage() {
  include '../dbh.php';
  $idDemanda = $_POST['idDemanda'];
  $query = "SELECT * FROM foto WHERE idFoto='$idDemanda'";
  $result = mysqli_query($conn, $query);
  if (!mysqli_num_rows($result)==0) { 
  	header("Location: ../seguridad-foto.php?idDemanda=$idDemanda ");
  } else {
  	header ("Location: ../seguridad-non-foto.php?idDemanda=$idDemanda ");
  }
}