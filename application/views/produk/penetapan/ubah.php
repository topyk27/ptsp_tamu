<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tamu PTSP | Ubah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view("_partials/css.php") ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datepicker/datepicker3.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<?php $this->load->view("_partials/navbar.php") ?>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<?php $this->load->view("_partials/sidebar_container.php") ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		  <!-- Content Header (Page header) -->
		  <section class="content-header">
		    <div class="container-fluid">
		      <div class="row mb-2">
		        <div class="col-sm-6">
		          <h1>Pengambilan Salinan Penetapan</h1>
		        </div>
		        <div class="col-sm-6">
		          <ol class="breadcrumb float-sm-right">
		            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
		            <li class="breadcrumb-item"><a href="<?php echo base_url('produk/penetapan'); ?>">Pengambilan Salinan Penetapan</a></li>
		            <li class="breadcrumb-item active">Ubah</li>
		          </ol>
		        </div>
		      </div>
		    </div><!-- /.container-fluid -->
		  </section>

		  <!-- Main content -->
		  <section class="content">
		    <div class="container-fluid">
		      <div class="row">
		        <div class="col-md-12">
		          <div class="card card-primary">
		            <div class="card-header">
		              <h3 class="card-title">Ubah</h3>
		            </div>
		            <form role="form" method="post" enctype="multipart/form-data">
		              <div class="card-body">
		                <div class="form-group">
		                	<label for="nama">Nama</label>
		                	<input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('nama'))) { echo $data_penetapan->nama; } else{ echo set_value('nama');} ?>" placeholder="Nama Lengkap" required readonly>
		                	<div class="invalid-feedback">
		                	  <?php echo form_error('nama') ?>
		                	</div>
		                </div>
		                <div class="form-group">
		                	<label for="no_perkara">NO Perkara</label>
		                	<input type="text" name="no_perkara" class="form-control <?php echo form_error('no_perkara') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('no_perkara'))) { echo $data_penetapan->no_perkara; } else{ echo set_value('no_perkara');} ?>" placeholder="Nomor Perkara" required readonly>
		                	<div class="invalid-feedback">
		                	  <?php echo form_error('no_perkara') ?>
		                	</div>
		                </div>
		                <input type="hidden" name="pihak" value="p">
		                
		                <div class="form-group">
		                	<label for="no_hp">Nomor HP</label>
		                	<input type="text" name="no_hp" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" value="<?php if(empty(set_value('no_hp'))) { echo $data_penetapan->no_hp; } else{ echo set_value('no_hp');} ?>" placeholder="Nomor HP" required>
		                	<div class="invalid-feedback">
		                	  <?php echo form_error('no_hp') ?>
		                	</div>
		                </div>
		                <div class="form-group">
		                  <label for="tanggal">Tanggal</label>
		                  <input type="text" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" name="tanggal" value="<?php if(empty(set_value('tanggal'))) { echo $data_penetapan->tanggal; } else{ echo set_value('tanggal', date('Y-m-d'));} ?>" required>
		                  <div class="invalid-feedback">
		                    <?php echo form_error('tanggal') ?>
		                  </div>
		                </div>
		                <!-- work -->
		                <!-- <div class="form-group">
		                	<label for="foto">Foto</label>
		                	<input type="file" class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" name="foto" value="<?php if(empty(set_value('foto'))) { echo $data_penetapan->foto; } else { echo set_value('foto'); } ?>">
		                	<img src="<?php echo base_url('upload/ac/'); echo $data_penetapan->foto; ?>" width="30%">
		                	<div class="invalid-feedback">
		                		<?php echo form_error('foto'); ?>
		                	</div>
		                	<input type="hidden" name="old_foto" value="<?php echo $data_penetapan->foto; ?>">
		                </div> -->
		                <!-- end work -->
		                <!-- tes ambil gambar -->
		                <div class="form-group">
		                	<label for='foto'>Foto</label>
		                	<div class="camera col-md-12">
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
			                			<img id="photo" class="col-md-12 h-auto" alt="Gambar kamera akan muncul di kotak ini" src="<?php echo base_url('upload/penetapan/'); echo $data_penetapan->foto; ?>">
		                			</div>
		                			<input type="hidden" class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" name="foto" id="foto" >
		                			<input type="hidden" name="old_foto" value="<?php echo $data_penetapan->foto; ?>">
		                		</div>
		                	</div>
		                </div>
		                <!-- end tes ambil gambar -->
		              </div>
		              <div class="card-footer">
		                <button type="submit" class="btn btn-primary">Simpan</button>
		                <a href="<?php echo base_url("produk/penetapan"); ?>" class="btn btn-danger">Batal</a>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		      <!-- /.row -->
		    </div><!-- /.container-fluid -->
		  </section>
		  <!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php $this->load->view("_partials/footer.php") ?>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
		  <!-- Control sidebar content goes here -->
		</aside>
	</div>
	<!-- ./wrapper -->
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
			$("#sidebar_ptsp_penetapan").addClass("active");
			// datepicker
			var date_input=$('input[name="tanggal"]'); //our date input has the name "date"
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