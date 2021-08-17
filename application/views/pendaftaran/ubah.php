<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tamu PTSP | Ubah</title>
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
							<h1>Pendaftaran</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('pendaftaran'); ?>">Pendaftaran</a></li>
								<li class="breadcrumb-item active">Ubah</li>
							</ol>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-sm-12" id="respon">
							<?php 
								$respon = $this->session->flashdata('respon');
								if(isset($respon)) :
							 ?>
							 <div class='alert alert-warning' role='alert' id='responMsg'>
							 	<?php echo $respon; ?>
							 </div>
							<?php endif; ?>
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
									<h3 class="card-title">Ubah</h3>
								</div>
								<form role="form" method="post">
									<div class="card-body">
										<div class="form-group">
											<label for="jenis_perkara">Jenis Perkara</label>
											<input type="text" name="jenis_perkara" class="form-control <?php echo form_error('jenis_perkara') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('jenis_perkara'))) { echo (strpos($data_pendaftaran->no_perkara, "Pdt.G")) ? "Gugatan" : "Permohonan"; } else{ echo set_value('jenis_perkara');} ?>" required readonly>
											<div class="invalid-feedback">
												<?php echo form_error('jenis_perkara'); ?>
											</div>
										</div>
										<div class="form-group">
											<label for="no_perkara">NO Perkara</label>
											<input type="text" name="no_perkara" class="form-control <?php echo form_error('no_perkara') ? 'is-invalid' : '' ?>" value="<?php if(empty(set_value('no_perkara'))) { echo $data_pendaftaran->no_perkara; } else{ echo set_value('no_perkara');} ?>" required readonly>
											<div class="invalid-feedback">
												<?php echo form_error('no_perkara'); ?>
											</div>
										</div>
										<div class="form-group">
											<label for="tanggal">Tanggal Pendaftaran</label>
											<input type="text" name="tanggal" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('tanggal'))) { echo $data_pendaftaran->tanggal_pendaftaran; } else{ echo set_value('tanggal', date('Y-m-d'));} ?>" required readonly>
											<div class="invalid-feedback">
												<?php echo form_error('tanggal'); ?>
											</div>
										</div>
										<div class="form-group">
											<label for="penggugat">Penggugat</label>
											<input type="text" name="penggugat" class="form-control <?php echo form_error('penggugat') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('penggugat'))) { echo $data_pendaftaran->penggugat; } else{ echo set_value('penggugat');} ?>" required readonly>
											<div class="invalid-feedback">
												<?php echo form_error('penggugat'); ?>
											</div>
										</div>
										<?php if(strpos($data_pendaftaran->no_perkara, "Pdt.G")) : ?>
											<div class="form-group">
												<label for="tergugat">Tergugat</label>
												<input type="text" name="tergugat" class="form-control <?php echo form_error('tergugat') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('tergugat'))) { echo $data_pendaftaran->tergugat; } else{ echo set_value('tergugat');} ?>" required readonly>
												<div class="invalid-feedback">
													<?php echo form_error('tergugat'); ?>
												</div>
											</div>
										<?php endif; ?>
										<div class="form-group">
											<label for="foto">Foto</label>
											<div class="camera col-md-6">
												<div class="row">
													<video id="video" class="col-md-12 h-auto">Video tidak tersedia</video>
												</div>
												<div class="row mt-2 mb-2">
													<div class="col-md-12">
														<button id="startbutton" class="btn btn-warning btn-block">Ambil foto</button>
													</div>
												</div>
												<canvas id="canvas" style="display: none;"></canvas>
												<div class="output col-md-12">
													<div class="row">
														<img id="photo" class="col-md-12 h-auto" alt="Gambar kamera akan muncul di kotak ini" src="<?php echo base_url('upload/pendaftaran/'); echo $data_pendaftaran->foto; ?>">
													</div>
													<input type="hidden" class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" name="foto" id="foto" >
													<input type="hidden" name="old_foto" value="<?php echo $data_pendaftaran->foto; ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<a href="<?php echo base_url("pendaftaran"); ?>" class="btn btn-danger">Batal</a>
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

	<script type="text/javascript">
		$(document).ready(function(){
			$("#sidebar_ptsp").addClass("active");
			$("#sidebar_ptsp_pendaftaran").addClass("active");

			// ambil gambar
			var width = 720;
			var height = 0;
			var streaming = false;
			var video = null;
			var canvas = null;
			var photo = null;
			var startbutton = null;
			var foto = null;
			var imgsrc = $('#photo').attr('src');
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
		           // photo.setAttribute('src', data);
		           photo.setAttribute('src', imgsrc);
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
		});
	</script>
</body>
</html>