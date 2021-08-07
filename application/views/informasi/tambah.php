<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tamu PTSP | Tambah</title>
  <!-- Tell the browser to be responsive to screen width -->
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
            <h1>Pengaduan & Informasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('informasi') ?>">Pengaduan & Informasi</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
                <h3 class="card-title">Tambah</h3>
              </div>
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" name="tanggal" value="<?php echo set_value('tanggal', date('Y-m-d')); ?>" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('tanggal') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Nama Lengkap" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Alamat Lengkap" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('alamat') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telepon">HP / Telepon</label>
                    <input type="text" class="form-control <?php echo form_error('telepon') ? 'is-invalid':'' ?>" name="telepon" value="<?php echo set_value('telepon'); ?>" placeholder="HP / Telepon" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('telepon') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>" name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" placeholder="Pekerjaan" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('pekerjaan') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="informasi">Jenis Informasi</label>
                    <select class="form-control <?php echo form_error('informasi') ? 'is-invalid':'' ?>" name="informasi">
                      <option value="perkara" <?php echo set_select('informasi', 'perkara', TRUE); ?>>Perkara</option>
                      <option value="non perkara" <?php echo set_select('informasi', 'non perkara'); ?>>Non Perkara</option>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo form_error('informasi') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan Informasi</label>
                    <input type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>" name="keterangan" value="<?php echo set_value('keterangan'); ?>" placeholder="Keterangan Informasi" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('keterangan') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label>
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
                          <img id="photo" class="col-md-12 h-auto" alt="Gambar kamera akan muncul di kotak ini">
                        </div>
                        <input type="hidden" class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" name="foto" id="foto" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?php echo base_url("informasi"); ?>" class="btn btn-danger">Batal</a>
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
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- bs-custom-file-input -->
<!-- <script src="<?php echo base_url('asset/js/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script> -->
<!-- <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
<!-- <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script> -->

<!-- datepicker -->
<script src="<?php echo base_url('asset/plugin/datepicker/bootstrap-datepicker.js') ?>"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#sidebar_ptsp").addClass("active");
    $("#sidebar_ptsp_pengaduan").addClass("active");

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
