<?php
	session_start();
	require 'koneksi.php';

	if(isset($_POST['tambah'])) {
		$nama_alternatif = $_POST['nama'];
		$bobot_alternatif = implode(", ", $_POST['bobot']);

		$sql = "INSERT INTO alternatif VALUES(null, '$nama_alternatif', $bobot_alternatif)";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_alternatif'] = 1;
		} else {
			$_SESSION['status_alternatif'] = 0;
		}

		header('Location: kriteria.php');
	}

	if(isset($_POST['ubah'])) {
		$id_kriteria = $_POST['id'];
		$nama_kriteria = $_POST['nama'];

		$sql = "UPDATE kriteria SET nama = '$nama_kriteria', bobot = $bobot_kriteria, jenis = '$jenis_kriteria' WHERE id = $id_kriteria";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_alternatif'] = 3;
		} else {
			$_SESSION['status_alternatif'] = 2;
		}

		header('Location: kriteria.php');
	}

	if(isset($_POST['hapus'])) {
		$id_kriteria = $_POST['id'];

		$sql = "DELETE FROM kriteria WHERE id = $id_kriteria";
		$query = mysqli_query($koneksi, $sql);

		if($query) {
			$_SESSION['status_alternatif'] = 5;
		} else {
			$_SESSION['status_alternatif'] = 4;
		}

		header('Location: kriteria.php');
	}

	function get_alternatif() {
		global $koneksi;
		$sql = "SELECT * FROM alternatif";
		$query = mysqli_query($koneksi, $sql);

		if(mysqli_num_rows($query) == 0) {
			echo "Belum ada alternatif";
		} else {
?>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama Alternatif</th>
					<th>Aksi</th>
				</tr>
<?php
			$no = 1;
			while($row = mysqli_fetch_assoc($query)) {
?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td>
						<a class="btn btn-warning btn-xs" data-toggle="modal" data-placement="right" data-target="#modal_ubah_alternatif_<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i> Ubah</a>
						<a class="btn btn-danger btn-xs" data-toggle="modal" data-placement="right" data-target="#modal_hapus_alternatif_<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>

						<div id="modal_ubah_alternatif_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
										<h4 class="modal-title">Ubah Data Alternatif</h4>
									</div>
									<form method="post" action="crud_alternatif.php" data-parsley-validate class="form-horizontal form-label-left">
										<div class="modal-body">
											<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Alternatif <span class="required">*</span></label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $row['nama']; ?>" required />
												</div>
											</div>
											<?php
												$sql = "SELECT * FROM kriteria";
												$query = mysqli_query($koneksi, $sql);
												while($row = mysqli_fetch_assoc($query)) {
											?>
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Bobot <?php echo $row['nama']; ?> <span class="required">*</span></label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<select name="bobot[]" class="form-control col-md-7 col-xs-12">
															<?php
																$sql2 = "SELECT * FROM subkriteria WHERE id_kriteria = ".$row['id'];
																$query2 = mysqli_query($koneksi, $sql2);
																while($row2 = mysqli_fetch_assoc($query2)) {
															?>
																	<option value="<?php echo $row2['bobot']; ?>"><?php echo $row2['nama']; ?></option>
															<?php
																}
															?>	
															</select>
														</div>
													</div>
											<?php
												}
											?>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>

						<div id="modal_hapus_alternatif_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
										<h4 class="modal-title">Apakah anda yakin akan menghapus alternatif berikut:</h4>
									</div>
									<form method="post" action="crud_kriteria.php" data-parsley-validate class="form-horizontal form-label-left">
										<div class="modal-body">
											<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kriteria</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $row['nama']; ?>" readonly />
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