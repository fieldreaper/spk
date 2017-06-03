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
												<form method="post" action="tambah_kriteria.php">
													<div class="modal-body">
														<table>
															<tr>
																<td>Nama Kriteria</td>
																<td><input type="text" name="nama" /></td>
															</tr>
															<tr>
																<td>Bobot Kriteria</td>
																<td><input type="number" name="bobot" /></td>
															</tr>
															<tr>
																<td>Jenis Kriteria</td>
																<td>
																	<select name="jenis">
																		<option value="Keuntungan">Keuntungan</option>
																		<option value="Biaya">Biaya</option>
																	</select>
																</td>
															</tr>
														</table>	
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Tambah</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<h3>GGE</h3>
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