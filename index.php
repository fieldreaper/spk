<?php session_start(); ?>

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
									<h2>Beranda</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<h3><strong>Selamat datang di Aplikasi Pendukung Keputusan terhadap Pembagian Dana Proker BEM FMIPA UNS</strong></h3> <br>
									<p>
										Aplikasi ini  membantu Anda dalam membagi dana fakultas sesuai dengan bobot atau tingkat kepentingan dari Proker tersebut. Pada aplikasi ini terdapat beberapa feature, yaitu:
										<ul>
											<li><strong>Menu Kriteria</strong> <i class="fa fa-long-arrow-right"></i> berfungsi menambahkan kriteria penilaian.</li>
											<li><strong>Menu Alternatif</strong> <i class="fa fa-long-arrow-right"></i> berfungsi untuk memasukan proker yang dapat didanai oleh Fakultas</li>
											<li><strong>Menu Penilaian</strong> <i class="fa fa-long-arrow-right"></i> berfungsi menampilkan hasil seberapa besar persentase dana yang diterima setiap proker.</li>
										</ul>
										<br>
										Semoga aplikasi ini dapat membantu Anda, terima kasih :) <br>
										by kelompok 3 Sistem Pendukung Keputusan Informatika UNS
									</p>
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