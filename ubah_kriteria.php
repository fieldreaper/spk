<?php
	session_start();
	require 'koneksi.php';

	if(isset($_POST['ubah'])) {
		$id_kriteria = $_POST['id'];
		$nama_kriteria = $_POST['nama'];
		$bobot_kriteria = $_POST['bobot'];
		$jenis_kriteria = $_POST['jenis'];

		$sql = "UPDATE kriteria SET nama = '$nama_kriteria', bobot = $bobot_kriteria, jenis = '$jenis_kriteria' WHERE id = $id_kriteria";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_kriteria'] = 3;
		} else {
			$_SESSION['status_kriteria'] = 2;
		}

		header('Location: kriteria.php');
	}
?>