<?php

//$conn = mysqli_connect("localhost", "root", "", "interlab");
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b66c7419282515", "356d4f0f", "heroku_1ea109cdfa054b7");

if (!$conn) {
	die("Connection falied: ".mysqli_connect_error());
}
