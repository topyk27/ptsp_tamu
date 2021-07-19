<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tamu PTSP | Setting</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view("_partials/css.php") ?>
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
						<h1>Sistem</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
							<li class="breadcrumb-item active">Sistem</li>
						</ol>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12" id="respon"></div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Setting</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="ketua">Ketua</label>
									<div class="row">
										<div class="col-md-4">
											<input type="text" id="ketua" class="form-control" value="<?php echo $ttd->ketua; ?>" readonly>
										</div>
										<div class="col-md-6">
											<a href="#" id="ketua_ubah" class="btn btn-warning">Ubah</a>
											<select class="form-control" name="ketua" style="display: none;">
												<?php foreach($hakim as $key=> $val) : ?>
													<option value="<?php echo($val->nama_gelar."#".$val->nip); ?>"><?php echo $val->nama_gelar; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-2">
											<a href="#" id="ketua_simpan" class="btn btn-primary" style="display: none;">Simpan</a>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="panitera">Panitera</label>
									<div class="row">
										<div class="col-md-4">
											<input type="text" id="panitera" class="form-control" value="<?php echo $ttd->panitera; ?>" readonly>
										</div>
										<div class="col-md-6">
											<a href="#" id="panitera_ubah" class="btn btn-warning">Ubah</a>
											<select class="form-control" name="panitera" style="display: none;">
												<?php foreach($panitera as $key=> $val) : ?>
													<option value="<?php echo($val->nama_gelar."#".$val->nip); ?>"><?php echo $val->nama_gelar; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-2">
											<a href="#" id="panitera_simpan" class="btn btn-primary" style="display: none;">Simpan</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	$(document).ready(function(){
		$("#sidebar_setting").addClass("active");
		$("#sidebar_setting_sistem").addClass("active");
		$("#ketua_ubah").click(function(){
			$("select[name='ketua']").show();
			$("#ketua_simpan").show();
			$(this).hide();
		});
		$("#ketua_simpan").click(function(){
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('setting/ketua_save'); ?>',
				data: {ketua: $("select[name='ketua']").val()},
				dataType: 'json',
				success: function(data)
				{
					if(data.respon)
					{
						$("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'>Data berhasil diubah</div>")
						$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
						$("select[name='ketua']").hide();
						$("#ketua_simpan").hide();
						$("#ketua_ubah").show();
						$("#ketua").val(data.nama);
					}
					else
					{
						$("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'>Data gagal diubah. Silahkan coba lagi.</div>")
						$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
					}
				},
				error: function(err)
				{
					console.log(err);
					$("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'>Data gagal diubah. Silahkan coba lagi.</div>")
					$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
				},

			});
		});

		$("#panitera_ubah").click(function(){
			$("select[name='panitera']").show();
			$("#panitera_simpan").show();
			$(this).hide();
		});
		$("#panitera_simpan").click(function(){
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('setting/panitera_save'); ?>',
				data: {panitera: $("select[name='panitera']").val()},
				dataType: 'json',
				success: function(data)
				{
					if(data.respon)
					{
						$("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'>Data berhasil diubah</div>")
						$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
						$("select[name='panitera']").hide();
						$("#panitera_simpan").hide();
						$("#panitera_ubah").show();
						$("#panitera").val(data.nama);
					}
					else
					{
						$("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'>Data gagal diubah. Silahkan coba lagi.</div>")
						$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
					}
				},
				error: function(err)
				{
					console.log(err);
					$("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'>Data gagal diubah. Silahkan coba lagi.</div>")
					$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
				},

			});
		});
	});
</script>
</body>
</html>