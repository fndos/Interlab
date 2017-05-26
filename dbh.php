<?php

$conn = mysqli_connect("localhost", "root", "", "interlab");

if (!$conn) {
	die("Connection falied: ".mysqli_connect_error());
}