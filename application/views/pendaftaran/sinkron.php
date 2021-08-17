<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tamu PTSP | Sinkron</title>
	<?php $this->load->view("_partials/css.php"); ?>
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php $this->load->view("_partials/navbar.php") ?>
		<?php $this->load->view("_partials/sidebar_container.php") ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Sinkron Data Pendaftaran</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('pendaftaran'); ?>">Pendaftaran</a></li>
								<li class="breadcrumb-item active">Sinrkon</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Data yang akan disinkronkan adalah data yang sudah dimasukkan ke aplikasi ini</h3>
								</div>
								<div class="card-body">
									<div class="form-row">
										<div class="col-md-2">
											<label for="tahun">Tahun</label>
											<select name="tahun" class="form-control">
												<?php 
													for($i=2021;$i<=date('Y');$i++)
													{
														echo "<option value='$i'>$i</option>";
													}
												 ?>
											</select>
										</div>
										<div class="col-md-2">
											<label for="bulan">Bulan</label>
											<select name="bulan" class="form-control">
												<option value="0">Semua</option>
												<?php 
													$bulan;
													for($i=1;$i<=12;$i++)
													{
														switch ($i) {
														  case 1:
														    $bulan = "Januari";
														    break;
														  case 2:
														    $bulan = "Februari";
														    break;
														  case 3:
														    $bulan = "Maret";
														    break;
														  case 4:
														    $bulan = "April";
														    break;
														  case 5:
														    $bulan = "Mei";
														    break;
														  case 6:
														    $bulan = "Juni";
														    break;
														  case 7:
														    $bulan = "Juli";
														    break;
														  case 8:
														    $bulan = "Agustus";
														    break;
														  case 9:
														    $bulan = "September";
														    break;
														  case 10:
														    $bulan = "Oktober";
														    break;
														  case 11:
														    $bulan = "November";
														    break;
														  case 12:
														    $bulan = "Desember";
														    break;
														}
														echo "<option value='$i'>$bulan</option>";
													}
												 ?>
											</select>
										</div>
										<div class="col-auto mt-auto">
											<button type="button" class="btn btn-success" onclick="sinkron()">Sinkron</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view("_partials/numpang.php") ?>
			</section>
		</div>
		<?php $this->load->view("_partials/footer.php") ?>
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>

	<script type="text/javascript">
		function sinkron() {
			tahun = $("select[name='tahun']").val();
			bulan = $("select[name='bulan']").val();
			window.open("<?php echo base_url('pendaftaran/data/'); ?>"+tahun+'/'+bulan);
		}
	</script>
</body>
</html>