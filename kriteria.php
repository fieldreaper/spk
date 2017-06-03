<?php session_start(); ?>

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
									<h2>Data Kriteria</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="" data-toggle="modal" data-placement="right" data-target=".bs-example-modal-lg" title="Tambah Kriteria"><i class="fa fa-plus"></i></a></li>
									</ul>
									<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
													<h4 class="modal-title" id="myModalLabel">Tambah Data Kriteria</h4>
												</div>
												<form method="post" action="tambah_kriteria.php" data-parsley-validate class="form-horizontal form-label-left">
													<div class="modal-body">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kriteria <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<input type="text" name="nama" class="form-control col-md-7 col-xs-12" required />
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Bobot Kriteria <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<input type="text" name="bobot" class="form-control col-md-7 col-xs-12" required />
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kriteria <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<select name="jenis" class="form-control col-md-7 col-xs-12">
																	<option value="Biaya">Biaya</option>
																	<option value="Keuntungan">Keuntungan</option>
																</select>
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
										require 'koneksi.php';

										if(isset($_SESSION['status_tambah_kriteria'])) {
											if($_SESSION['status_tambah_kriteria'] == 1) {
									?>
												<div class="alert alert-success alert-dismissible fade in" role="alert">
													<button class="close" data-dimiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Sukses menambahkan kriteria!
												</div>
									<?php
											} else {
									?>
												<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button class="close" data-dimiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
													Gagal menambahkan kriteria!
												</div>
									<?php
											}
										}
										get_kriteria();
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