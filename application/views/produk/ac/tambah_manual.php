<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tamu PTSP | Tambah</title>
	<?php $this->load->view("_partials/css.php") ?>
	<?php $nama_pa_pendek = $this->session->userdata('nama_pa_pendek'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datepicker/datepicker3.css') ?>">
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
							<h1>Manual Pengambilan Akta Cerai</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('produk/ac') ?>">Pengambilan Akta Cerai</a></li>
								<li class="breadcrumb-item active">Tambah Manual</li>
							</ol>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-12" id="respon">
							
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
									<h3 class="card-title">Tambah Manual</h3>
								</div>
								<form role="form" method="post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-row">
											<div class="col-md-6">
												<label for="no_perkara">Nomor Perkara</label>
												<input type="text" name="no_perkara" id="no_perkara" class="form-control <?php echo form_error('no_perkara') ? 'is-invalid' : '' ?>" value="<?php echo set_value('no_perkara'); ?>" placeholder="1262" required>
												<div class="invalid-feedback">
												  <?php echo form_error('no_perkara'); ?>
												</div>
											</div>
											<div class="col-md-6">
												<label for="no_perkara_tahun">Tahun</label>
												<input type="text" name="no_perkara_tahun" class="form-control <?php echo form_error('no_perkara_tahun') ? 'is-invalid' : '' ?>" value="<?php echo set_value('no_perkara_tahun'); ?>" placeholder="2019" required>
											</div>
											<div class="invalid-feedback">
											  <?php echo form_error('no_perkara_tahun'); ?>
											</div>
										</div>
										<div class="form-group">
											<label for="pihak">Pihak</label>
											<select class="form-control <?php echo form_error('pihak') ? 'is-invalid' : '' ?>" name="pihak">
												<option value="0">Pilih Pihak</option>
												<option value="p" <?php echo set_select('pihak', 'p'); ?>>Penggugat</option>
												<option value="t" <?php echo set_select('pihak', 't'); ?>>Tergugat</option>
											</select>
											<div class="invalid-feedback">
												<?php echo form_error('pihak'); ?>
											</div>
										</div>
										<div class="form-group">
											<label for="nama">Nama</label>
											<input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Nama Lengkap beserta bin" required>
											<div class="invalid-feedback">
											  <?php echo form_error('nama'); ?>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<label for="no_ac_aja">Nomor Akta Cerai</label>
												<input type="text" name="no_ac_aja" class="form-control <?php echo form_error('no_ac_aja') ? 'is-invalid' : '' ?>" value="<?php echo set_value('no_ac_aja'); ?>" placeholder="1234" required>
												<div class="invalid-feedback">
													<?php echo form_error('no_ac_aja'); ?>
												</div>
											</div>
											<div class="col-md-6">
												<label for="no_ac_tahun">Tahun</label>
												<input type="text" name="no_ac_tahun" class="form-control <?php echo form_error('no_ac_tahun') ? 'is-invalid' : '' ?>" value="<?php echo set_value('no_ac_tahun'); ?>" placeholder="2021" required>
												<div class="invalid-feedback">
													<?php echo form_error('no_ac_tahun'); ?>
												</div>
											</div>
											<input type="hidden" name="no_ac">
										</div>
										<div class="form-group">
											<label for="no_hp">Nomor HP</label>
											<input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp" value="<?php echo set_value('no_hp'); ?>" placeholder="Nomor HP" required>
											<div class="invalid-feedback">
											  <?php echo form_error('no_hp'); ?>
											</div>
										</div>
										<div class="form-group">
											<label for="tanggal">Tanggal</label>
											<input type="text" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" name="tanggal" value="<?php echo set_value('tanggal', date('Y-m-d')); ?>" required>
											<div class="invalid-feedback">
											  <?php echo form_error('tanggal'); ?>
											</div>
										</div>
						              	<div class="form-group">
						              		<label for="foto">Foto</label>
						              		<div class="row">
						              			<div class="camera col-md-6">
						              				<video id="video" class="col-md-12 h-auto">Video tidak tersedia</video>
						              			</div>
						              		</div>
			  		              			<div class="row mt-2 mb-2">
			  		              				<div class="col-md-6">
			  				              			<button id="startbutton" class="btn btn-warning btn-block">Ambil foto</button>
			  		              				</div>
			  		              			</div>
			  		              			<canvas id="canvas" style="display: none;"></canvas>
			  		              			<div class="row mt-2">
				  		              			<div class="output col-md-6 mb-2">
				  		              				<label for="hasil">Hasil Foto</label>
				  		              				<div class="row">
				  		              					<img id="photo" alt="Gambar kamera akan muncul di kotak ini" class="img-fluid">
				  		              				</div>
				  		              				<input type="hidden" class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" name="foto" id="foto" >
				  		              			</div>
			  		              			</div>
						              	</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a href="<?php echo base_url("produk/ac"); ?>" class="btn btn-danger">Batal</a>
										</div>
									</div>
								</form>
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
	<!-- datepicker -->
	<script src="<?php echo base_url('asset/plugin/datepicker/bootstrap-datepicker.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#sidebar_ptsp").addClass("active");
			$("#sidebar_ptsp_ac").addClass("active");
			var nama_pihak = [];
			var nama_pa_pendek = "<?php echo $nama_pa_pendek; ?>";
			var date_input=$('input[name="tanggal"]');
			var container=$('.content form').length>0 ? $('.content form').parent() : "body";
			var options={
			  format: 'yyyy-mm-dd',
			  container: container,
			  todayHighlight: true,
			  autoclose: true,
			};
			date_input.datepicker(options);
			// ambil gambar
			var width = 720;
			var height = 0;
			var streaming = false;
			var video = null;
			var canvas = null;
			var photo = null;
			var startbutton = null;
			var foto = null;
			startup();
			function startup()
			{
		  		video = document.getElementById('video');
	  		    canvas = document.getElementById('canvas');
	  		    photo = document.getElementById('photo');
	  		    startbutton = document.getElementById('startbutton');
	  		    foto = document.getElementById('foto');

	  		    navigator.mediaDevices.getUserMedia({ video: true, audio: false })
		        .then(function(stream) {
		            video.srcObject = stream;
		            video.play();
		        })
		        .catch(function(err) {
		            console.log("An error occurred: " + err);
		        });

		        video.addEventListener('canplay', function(ev){
		          if (!streaming) {
		            height = video.videoHeight / (video.videoWidth/width);

		            video.setAttribute('width', width);
		            video.setAttribute('height', height);
		            canvas.setAttribute('width', width);
		            canvas.setAttribute('height', height);
		            streaming = true;
		          }
		        }, false);

		        startbutton.addEventListener('click', function(ev){
	              takepicture();
	              ev.preventDefault();
	            }, false);

	            clearphoto();

	            function clearphoto() {
		           var context = canvas.getContext('2d');
		           context.fillStyle = "#AAA";
		           context.fillRect(0, 0, canvas.width, canvas.height);

		           var data = canvas.toDataURL('image/png');
		           photo.setAttribute('src', data);
		           foto.setAttribute('value', 'kosong');
		        }

		        function takepicture() {
		            var context = canvas.getContext('2d');
		            if (width && height) {
		              canvas.width = width;
		              canvas.height = height;
		              context.drawImage(video, 0, 0, width, height);

		              var data = canvas.toDataURL('image/png');
		              photo.setAttribute('src', data);
		              foto.setAttribute('value', data);
		            } else {
		              clearphoto();
		            }
		        }
			}
			// end ambil gambar

			$("input[name='no_ac_aja']").on("input", function(){
				$("input[name='no_ac']").val($("input[name='no_ac_aja']").val()+"/AC/"+$("input[name='no_ac_tahun']").val()+"/"+nama_pa_pendek);
				console.log($("input[name='no_ac']").val());
			});
			$("input[name='no_ac_tahun']").on("input", function(){
				$("input[name='no_ac']").val($("input[name='no_ac_aja']").val()+"/AC/"+$("input[name='no_ac_tahun']").val()+"/"+nama_pa_pendek);
				console.log($("input[name='no_ac']").val());
			});
			<?php
				if($this->session->userdata('respon')) :
					$respon = $this->session->userdata('respon');
			?>
			$("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Maaf</strong> <?php echo $respon; ?></div>")
			$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
			<?php endif; ?>
		});
	</script>
</body>
</html>