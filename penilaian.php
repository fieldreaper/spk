<?php require 'koneksi.php'; ?>

<!DOCTYPE html>

<html>

<head>
	<?php require 'layout/header.php'; ?>
</head>

<body class="nav-md footer_fixed">
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
									<h2>Penilaian</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<?php
										$sql = "SELECT * FROM alternatif";
										$query = mysqli_query($koneksi, $sql);

										$sql2 = "SELECT * FROM kriteria";
										$query2 = mysqli_query($koneksi, $sql2);

										$sql3 = "SELECT * FROM subkriteria";
										$query3 = mysqli_query($koneksi, $sql3);

										if(mysqli_num_rows($query) == 0 || mysqli_num_rows($query2) == 0 || mysqli_num_rows($query3) == 0) {
											echo "Untuk melakukan penilaian harap melengkapi / mengisi Kriteria, Subkriteria, dan Alternatif terlebih dahulu!";
										} else {
											$bobot_kriteria = array();
											$maxmin = array();
											$persentase = array(25, 20, 15, 10, 5, 3, 3, 3, 3, 3, 3, 3, 1, 1, 1, 1);
											while($row = mysqli_fetch_assoc($query2)) {
												$bobot_kriteria[] = $row['bobot'];
												if($row['jenis'] == "Keuntungan") {
													$sql4 = "SELECT max(bobot_".$row['id'].") FROM alternatif";
													$query4 = mysqli_query($koneksi, $sql4);
													$row4 = mysqli_fetch_assoc($query4);

													$maxmin[] = $row4['max(bobot_'.$row['id'].')'];
												} else {
													$sql4 = "SELECT min(bobot_".$row['id'].") FROM alternatif";
													$query4 = mysqli_query($koneksi, $sql4);
													$row4 = mysqli_fetch_assoc($query4);

													$maxmin[] = $row4['min(bobot_'.$row['id'].')'];
												}
											}
											$total_bobot = array_sum($bobot_kriteria);
											for($i = 0; $i < count($bobot_kriteria); $i++) {
												$bobot_kriteria[$i] /= $total_bobot;
											}

											// Normalisasi x Bobot
											while($row = mysqli_fetch_assoc($query)) {
												$hasil = 0;
												$i = 0;
												mysqli_data_seek($query2, 0);
												while($row2 = mysqli_fetch_assoc($query2)) {
													if($row2['jenis'] == "Keuntungan") {
														$hasil += ($row['bobot_'.$row2['id']] / $maxmin[$i]) * $bobot_kriteria[$i];
													} else {
														$hasil += ($maxmin[$i] / $row['bobot_'.$row2['id']]) * $bobot_kriteria[$i];
													}
													$i++;
												}

												$data[] = array('nama' => $row['nama'],
													'hasil' => $hasil);
											}

											foreach($data as $key => $isi) {
												$nama[$key] = $isi['nama'];
												$hasil1[$key] = $isi['hasil'];
											}

											array_multisort($hasil1, SORT_DESC, $data);
										}
									?>
									<table class="table table-striped">
										<tr>
											<th>Rank</th>
											<th>Nama Alternatif</th>
											<th>Nilai SAW</th>
											<th>Persentase Dana</th>
										</tr>
									<?php
										$no = 1;
										foreach($data as $item) {
									?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $item['nama']; ?></td>
												<td><?php echo $item['hasil']; ?></td>
												<td><?php echo $persentase[$no - 1]."%"; ?></td>
											</tr>
									<?php
											$no++;
										}
									?>
									</table>
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