<?php
	session_start();
	require 'koneksi.php';

	if(isset($_POST['hapus'])) {
		$id_kriteria = $_POST['id'];

		$sql = "DELETE FROM kriteria WHERE id = $id_kriteria";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_kriteria'] = 5;
		} else {
			$_SESSION['status_kriteria'] = 4;
		}

		header('Location: kriteria.php');
	}
?>