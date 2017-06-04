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
									<h2>Penilaian</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<h4>Konten Penilaian</h4>
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