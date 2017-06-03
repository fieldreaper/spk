<?php
	require 'koneksi.php';

	if(isset($_POST['tambah'])) {
		$nama_kriteria = $_POST['nama'];
		$bobot_kriteria = $_POST['bobot'];
		$jenis_kriteria = $_POST['jenis'];

		$sql = "INSERT INTO kriteria VALUES(null, '$nama_kriteria', $bobot_kriteria, 'jenis_kriteria')";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_tambah_kriteria'] = 1;
		} else {
			$_SESSION['status_tambah_kriteria'] = 0;
		}

		header('Location: kriteria.php');
	}
?>