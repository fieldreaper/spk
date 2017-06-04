<?php
	session_start();
	require 'crud_subkriteria.php';
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
									<?php
										$sql = "SELECT * FROM kriteria WHERE id = " .$_GET['id'];
										$query = mysqli_query($koneksi, $sql);
										$row = mysqli_fetch_assoc($query);
									?>
									<h2>Data Subkriteria <?php echo $row['nama']; ?></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="" data-toggle="modal" data-placement="right" data-target="#modal_tambah_subkriteria" title="Tambah Subkriteria"><i class="fa fa-plus"></i></a></li>
									</ul>
									<div id="modal_tambah_subkriteria" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
													<h4 class="modal-title">Tambah Data Subkriteria</h4>
												</div>
												<form method="post" action="crud_subkriteria.php" data-parsley-validate class="form-horizontal form-label-left">
													<div class="modal-body">
														<input type="hidden" name="id_kriteria" value="<?php echo $_GET['id']; ?>">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Subkriteria <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<input type="text" name="nama" class="form-control col-md-7 col-xs-12" required />
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Bobot Subkriteria <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<input type="number" name="bobot" class="form-control col-md-7 col-xs-12" required />
															</div>
														</div>
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

										if(isset($_SESSION['status_subkriteria'])) {
											if($_SESSION['status_subkriteria'] == 1) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses menambahkan subkriteria!
												</div>
									<?php
											} else if($_SESSION['status_subkriteria'] == 0) {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal menambahkan subkriteria!
												</div>
									<?php
											} else if($_SESSION['status_subkriteria'] == 3) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses mengubah subkriteria!
												</div>
									<?php
											} else if($_SESSION['status_subkriteria'] == 2) {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal mengubah subkriteria!
												</div>
									<?php
											} else if($_SESSION['status_subkriteria'] == 5) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses menghapus subkriteria!
												</div>
									<?php
											} else if($_SESSION['status_subkriteria'] == 4) {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal menghapus subkriteria!
												</div>
									<?php
											}
											session_unset($_SESSION['status_subkriteria']);
										}
										get_subkriteria();
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