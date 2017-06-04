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
												<form method="post" action="" data-parsley-validate class="form-horizontal form-label-left">
													<div class="modal-body">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Alternatif <span class="required">*</span></label>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<input type="text" name="nama" class="form-control col-md-7 col-xs-12" required />
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
									<h4>Konten Alternatif</h4>
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