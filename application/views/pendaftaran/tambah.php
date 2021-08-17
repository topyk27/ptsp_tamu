<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tamu PTSP | Tambah</title>
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url('asset/plugin/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
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
							<h1>Pendaftaran Perkara</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('pendaftaran'); ?>">Pendaftaran</a></li>
								<li class="breadcrumb-item active">Tambah</li>
							</ol>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-sm-12" id="respon">
							<?php 
								$respon = $this->session->flashdata('respon');
								if(isset($respon)) : ?>
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
									<h3 class="card-title">Tambah</h3>
								</div>
								<form role="form" method="post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group">
											<label for="jenis_perkara">Jenis Perkara</label>
											<select class="form-control" id="jenis_perkara" name="jenis_perkara">
												<option value="0">Pilih Jenis Perkara</option>
												<option value="Pdt.G">Gugatan</option>
												<option value="Pdt.P">Permohonan</option>
											</select>
										</div>
										<div class="form-row" id="form_no_perkara" style="display: none;">
											<div class="col-md-6">
												<label for="no_perkara">Nomor Urut Perkara</label>
												<input type="text" name="no_perkara" class="form-control <?php echo form_error('no_perkara') ? 'is-invalid':'' ?>" value="<?php echo set_value('no_perkara'); ?>" placeholder="1262" required>
												<div class="invalid-feedback">
													<?php echo form_error('no_perkara'); ?>
												</div>
											</div>
											<div class="col-auto mt-auto">
												<button type="button" class="btn btn-success" id="btn_cek_perkara">Check</button>
											</div>
										</div>
										<div id="sembunyikan" style="display: none;">
											<div class="form-group">
												<label for="tanggal">Tanggal Pendaftaran</label>
												<input type="date" name="tanggal" class="form-control  <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" value="<?php echo set_value('no_perkara'); ?>" readonly>
												<div class="invalid-feedback">
													<?php echo form_error('tanggal'); ?>
												</div>
											</div>
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
															<img id="photo" alt="Gambar kamera akan muncul di kotak ini" class="col-md-12 h-auto">
														</div>
														<input type="hidden" class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" name="foto" id="foto" >
													</div>
												</div>
											</div>
											<div class="card-footer">
												<button type="submit" class="btn btn-primary">Simpan</button>
												<a href="<?php echo base_url("pendaftaran"); ?>" class="btn btn-danger">Batal</a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php $this->load->view("_partials/footer.php"); ?>
		<?php $this->load->view("_partials/loader.php"); ?>
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url('asset/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#sidebar_ptsp").addClass("active");
			$("#sidebar_ptsp_pendaftaran").addClass("active");
			var nama_pa_pendek = "<?php echo ($this->session->userdata('nama_pa_pendek')) ? $this->session->userdata('nama_pa_pendek') : 'kosong' ?>";
			var Toast = Swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 3000
			});
			function reset() {
				$("#sembunyikan").hide();
				$("select#jenis_perkara").prop("selectedIndex", 0);	
			}
			$("select#jenis_perkara").on('change', function(){
				if(this.value == "0")
				{
					$("#form_no_perkara").hide();
					$("#sembunyikan").hide();
				}
				else
				{
					$("#form_no_perkara").show();
					$("#sembunyikan").hide();
				}
			});
			$("#btn_cek_perkara").click(function(){
				$("#sembunyikan").hide();
				var d = new Date();
				var tahun = d.getFullYear();
				var no = $("input[name='no_perkara']").val().trim();
				var jenis_perkara = $("select#jenis_perkara").val();
				var no_perkara = no+"/"+jenis_perkara+"/"+tahun+"/"+nama_pa_pendek;
				$.ajax({
					url: "<?php echo base_url('pendaftaran/cek_data_perkara'); ?>",
					method: "POST",
					data: {no_perkara: no_perkara},
					dataType: "JSON",
					beforeSend: function()
					{
						$(".loading").show();
					},
					success: function(data)
					{
						if(data=="gak ada")
						{
							Toast.fire({
								icon : 'error',
								title : 'Nomor perkara tidak ditemukan'
							});
						}
						else if(data=="terdaftar")
						{
							Toast.fire({
								icon : 'error',
								title : 'Nomor perkara sudah terdaftar'
							});
						}
						else
						{
							$("#sembunyikan").show();
							$("input[name='tanggal']").val(data[0].tanggal_pendaftaran);
						}
						$(".loading").hide();
					},
					error: function(err)
					{
						// console.log(err);
						$(".loading").hide();
						Toast.fire({
							icon : 'error',
							title : 'Mohon periksa koneksi internet anda'
						});
					}
				});
			});

			$("input[name='no_perkara']").on("input", function(){
				$("#sembunyikan").hide();
			});

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

		});
	</script>
</body>
</html>