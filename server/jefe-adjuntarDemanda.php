<?php

if (!empty($_FILES['image']['tmp_name'])) { 
  if(getimagesize($_FILES['image']['tmp_name']) == FALSE) {
    //No se ha seleccionado imagen
    header("Location: ../jefe-non-adjuntar.php");
  } else {
    $image = addslashes($_FILES['image']['tmp_name']);
    $name = addslashes($_FILES['image']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);
    saveImage($name, $image);
  }
} else {
  //No se ha seleccionado imagen
  header("Location: ../jefe-non-adjuntar.php");
}

function saveImage($name, $image) { 
  include '../dbh.php';
  $idDemanda = $_POST['idDemanda'];
	$query = "INSERT INTO foto (idFoto, name, image) VALUES ('$idDemanda', '$name', '$image')";
	$result = mysqli_query($conn, $query);
  $query_update = "UPDATE foto SET name='$name', image='$image' WHERE idFoto='$idDemanda'";
  $result_update = mysqli_query($conn, $query_update);
	if ($result) {
	  //Image uploaded
		header("Location: ../jefe-adjuntar.php");
	} elseif ($result_update) {
	  //Image uploaded
    header("Location: ../jefe-adjuntar.php");
  } else {
    //No image uploaded
		header("Location: ../jefe-non-adjuntar.php");
  }
	
}