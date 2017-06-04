<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "spk";

	$koneksi = mysqli_connect($hostname, $username, $password, $dbname) or die(mysqli_error());
?>