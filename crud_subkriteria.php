<?php
	require 'koneksi.php';

	if(isset($_POST['tambah'])) {
		$id_kriteria = $_POST['id_kriteria'];
		$nama_subkriteria = $_POST['nama'];
		$bobot_subkriteria = $_POST['bobot'];

		$sql = "INSERT INTO subkriteria VALUES(null, '$nama_subkriteria', $bobot_subkriteria, $id_kriteria)";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_subkriteria'] = 1;
		} else {
			$_SESSION['status_subkriteria'] = 0;
		}

		header('Location: subkriteria.php?id='.$id_kriteria);
	}

	if(isset($_POST['ubah'])) {
		$id_kriteria = $_POST['id_kriteria'];
		$id_subkriteria = $_POST['id_subkriteria'];
		$nama_subkriteria = $_POST['nama'];
		$bobot_subkriteria = $_POST['bobot'];

		$sql = "UPDATE subkriteria SET nama = '$nama_subkriteria', bobot = $bobot_subkriteria WHERE id = $id_subkriteria";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_subkriteria'] = 3;
		} else {
			$_SESSION['status_subkriteria'] = 2;
		}

		header('Location: subkriteria.php?id='.$id_kriteria);
	}

	if(isset($_POST['hapus'])) {
		$id_kriteria = $_POST['id_kriteria'];
		$id_subkriteria = $_POST['id_subkriteria'];

		$sql = "DELETE FROM subkriteria WHERE id = $id_subkriteria";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_subkriteria'] = 5;
		} else {
			$_SESSION['status_subkriteria'] = 4;
		}

		header('Location: subkriteria.php?id='.$id_kriteria);
	}

	function get_subkriteria() {
		global $koneksi;
		$sql = "SELECT * FROM subkriteria WHERE id_kriteria = " .$_GET['id'];
		$query = mysqli_query($koneksi, $sql);

		if(mysqli_num_rows($query) == 0) {
			echo "Belum ada subkriteria";
		} else {
?>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama Subkriteria</th>
					<th>Bobot Subkriteria</th>
					<th>Aksi</th>
				</tr>
<?php
			$no = 1;
			while($row = mysqli_fetch_assoc($query)) {
?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['bobot']; ?></td>
					<td>
						<a class="btn btn-warning btn-xs" data-toggle="modal" data-placement="right" data-target="#modal_ubah_subkriteria_<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i> Ubah</a>
						<a class="btn btn-danger btn-xs" data-toggle="modal" data-placement="right" data-target="#modal_hapus_subkriteria_<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>

						<div id="modal_ubah_subkriteria_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
										<h4 class="modal-title">Ubah Data Subkriteria</h4>
									</div>
									<form method="post" action="crud_subkriteria.php" data-parsley-validate class="form-horizontal form-label-left">
										<div class="modal-body">
											<input type="hidden" name="id_kriteria" value="<?php echo $_GET['id']; ?>">
											<input type="hidden" name="id_subkriteria" value="<?php echo $row['id']; ?>">
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Subkriteria <span class="required">*</span></label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $row['nama']; ?>" required />
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Bobot Subkriteria <span class="required">*</span></label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="number" name="bobot" class="form-control col-md-7 col-xs-12" value="<?php echo $row['bobot']; ?>" required />
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>

						<div id="modal_hapus_subkriteria_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
										<h4 class="modal-title">Apakah anda yakin akan menghapus subkriteria berikut:</h4>
									</div>
									<form method="post" action="crud_subkriteria.php" data-parsley-validate class="form-horizontal form-label-left">
										<div class="modal-body">
											<input type="hidden" name="id_kriteria" value="<?php echo $_GET['id']; ?>">
											<input type="hidden" name="id_subkriteria" value="<?php echo $row['id']; ?>">
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Subkriteria</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $row['nama']; ?>" readonly />
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Bobot Subkriteria</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="bobot" class="form-control col-md-7 col-xs-12" value="<?php echo $row['bobot']; ?>" readonly />
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-default" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
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