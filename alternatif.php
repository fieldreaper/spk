<?php
	require 'crud_alternatif.php';
?>

<!DOCTYPE html>

<html>

<head>
	<?php require 'layout/header.php'; ?>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<?php
				require 'layout/side_menu.php';
				require 'layout/top_navigation.php';
			?>

			<div class="right_col" role="main">
				<div class="">

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Data Alternatif</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="" data-toggle="modal" data-placement="right" data-target="#modal_tambah_alternatif" title="Tambah Alternatif"><i class="fa fa-plus"></i></a></li>
									</ul>
									<div id="modal_tambah_alternatif" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
													<h4 class="modal-title">Tambah Data Alternatif</h4>
												</div>
												<form method="post" action="crud_alternatif.php" data-parsley-validate class="form-horizontal form-label-left">
													<div class="modal-body">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Alternatif <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<input type="text" name="nama" class="form-control col-md-7 col-xs-12" required />
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
														<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<?php
										if(isset($_SESSION['status_alternatif'])) {
											if($_SESSION['status_alternatif'] == 1) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses menambahkan alternatif!
												</div>
									<?php
											} else if($_SESSION['status_alternatif'] == 0) {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal menambahkan alternatif!
												</div>
									<?php
											} else if($_SESSION['status_alternatif'] == 3) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses mengubah alternatif!
												</div>
									<?php
											} else if($_SESSION['status_alternatif'] == 2) {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal mengubah alternatif!
												</div>
									<?php
											} else if($_SESSION['status_alternatif'] == 5) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses menghapus alternatif!
												</div>
									<?php
											} else if($_SESSION['status_alternatif'] == 4) {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal menghapus alternatif!
												</div>
									<?php
											}
											session_unset($_SESSION['status_alternatif']);
										}
										get_alternatif();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php require 'layout/footer.php'; ?>
		</div>
	</div>

	<?php require 'layout/script.php'; ?>
</body>

</html>