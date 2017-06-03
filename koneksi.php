<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "spk";

	$koneksi = mysqli_connect($hostname, $username, $password, $dbname) or die(mysqli_error());

	function get_kriteria() {
		global $koneksi;
		$sql = "SELECT * FROM kriteria";
		$query = mysqli_query($koneksi, $sql);

		if(mysqli_num_rows($query) == 0) {
			echo "Belum ada kriteria";
		} else {
?>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama Kriteria</th>
					<th>Bobot Kriteria</th>
					<th>Jenis</th>
					<th>Aksi</th>
				</tr>
<?php
			$no = 1;
			while($row = mysqli_num_rows($query)) {
?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['bobot']; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td>
						<a href="ubah_kriteria.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
						<a href="hapus_kriteria.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
						<a href="subkriteria.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-tags"></i> Subkriteria</a>
					</td>
				</tr>
<?php
				$no++;
			}
?>
			</table>
<?php
		}
	}
?>