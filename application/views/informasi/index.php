<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tamu PTSP | Pengaduan & Informasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view("_partials/css.php") ?>
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <!-- lightbox -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/lightbox2/dist/css/lightbox.min.css'); ?>">
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
              <li class="breadcrumb-item active">Pengaduan & Informasi</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-2">
            <a href="informasi/tambah" class="btn btn-block bg-gradient-primary">
              <i class="fas fa-plus"></i>Tambah
            </a>
          </div>
        </div>
        <div class="row-mb-2">
          <div class="col-sm-12" id="respon">
            <!-- <div class="alert alert-success" role="alert" id="responMsg" style="display: none;"> -->
              
            </div>
          </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah</h3>
              </div>
              <div class="card-body"> -->
              <div class="card card-primary">
                <table id="dt_informasi" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>NO</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>HP/Telepon</th>
                      <th>Pekerjaan</th>
                      <th>Informasi yang diminta</th>
                      <th>Keterangan</th>
                      <th>Foto</th>
                      <th>Ubah</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            <!-- </div> -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <?php $this->load->view("_partials/numpang.php") ?>
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

<!-- hapus modal -->
<div id="hapusModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>
        <h4 class="modal-title w-100">Apakah anda yakin?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin menghapus data ini? Data ini tidak bisa dipulihkan kembali.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteButton">Hapus</button>
      </div>
    </div>
  </div>
</div>

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
<!-- datatables -->
<script src="<?php echo base_url('asset/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Moment -->
<script src="<?php echo base_url('asset/plugin/moment/moment-with-locales.min.js') ?>"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<!-- lightbox -->
<script src="<?php echo base_url('asset/plugin/lightbox2/dist/js/lightbox.min.js') ?>"></script>

<script type="text/javascript">
  var path = window.location.pathname; //jadinya /ptsp_tamu/informasi
  var namanya = path.split("/"); // jadinya ["", "ptsp", "tamu"]
  var host = window.location.hostname; //localhost
  var dt_informasi;
  function hapusData(id)
    {
      $.ajax({
        url: "<?php echo base_url('informasi/hapus/') ?>"+id,
        dataType: "text",
        success: function(respon)
        {
          if(respon="1")
          {
            // console.log("berhasil");
            dt_informasi.ajax.reload();
             $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Selamat</strong> Data berhasil dihapus</div>")
             $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
          }
          else
          {
            // console.log("gagal hapus data");
            $("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'><strong>Maaf</strong> Data gagal dihapus. Silahkan coba lagi.</div>")
            $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
          }
        }
      });
    }
  $(document).ready(function(){
    $("#sidebar_ptsp").addClass("active");
    $("#sidebar_ptsp_pengaduan").addClass("active");
    moment.locale('id');
    $.fn.dataTable.moment('LL');
    dt_informasi = $("#dt_informasi").DataTable({
      "order" : [[2, "desc"]],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>informasi/data_informasi",
        "dataSrc" : "",
      },
      "columns" : [
      {"data" : "id"},
      {"data" : null, "sortable" : false, render: function(data,type,row,meta){
        return meta.row + meta.settings._iDisplayStart + 1;
      }},
      // {"data" : null},
      {"data" : "tanggal"},        
      {"data" : "nama"},        
      {"data" : "alamat"},        
      {"data" : "telepon"},        
      {"data" : "pekerjaan"},        
      {"data" : "informasi"},        
      {"data" : "keterangan"},
      {"data" : null, "sortable" : false, render: function(data,type,row,meta){
        return "<a href='<?php echo base_url('upload/informasi/')?>"+row['foto']+"' data-lightbox="+row['foto']+" data-title='"+row['nama']+"'><img src='<?php echo base_url('upload/informasi/')?>"+row['foto']+"' width='64' /></a>";
      }},
      {"data" : null, "sortable" : false, render: function(data,type,row,meta){
        // return "<a href='#' class='btn btn-warning editButton'><i class='fas fa-edit'></i>Ubah</a>";
        return "<a href='<?php echo base_url('informasi/ubah/') ?>"+row['id']+"' class='btn btn-warning'><i class='fas fa-edit'></i>Ubah</a>";
      }},
      {"data" : null, "sortable" : false, render: function(data,type,row,meta){
        return "<a href='#' class='btn btn-danger deleteButton'><i class='fas fa-trash'></i>Hapus</a>";
      }}
      ],
      "columnDefs" : [
      {
        "targets" : [0], //target kolom id
        "visible" : false, //jangan tampilkan kolom id
      },
      {
        responsivePriority: 1,
        targets: [1,3],
      },
      {
        "targets" : [4,5,6,8],
        "orderable" : false,
      },
      {
        targets: 2,
        data: 'tanggal',
        render : function(data,type,row,meta){
          var dateObj = new Date(data);
          var momentObj = moment(dateObj);
          return momentObj.format('LL');
        }
      }
      ],
      responsive : true,
      autoWidth: false,
    });

    // dt_informasi.on('draw.dt', function(){
    //    dt_informasi.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //       cell.innerHTML = i+1;
    //   });
    // }).draw();

    $("#dt_informasi tbody").on('click', 'tr .deleteButton', function(e){
      e.preventDefault();
      // var currentRow = $(this).closest("tr");
      var currentRow = $(this).parents("tr");
      if(currentRow.hasClass('child'))
      {
        currentRow = currentRow.prev();
      }
      var data = $("#dt_informasi").DataTable().row(currentRow).data();
      $('#hapusModal').modal('show');
      $('#hapusModal').find('.modal-body').html("<p>Apakah anda ingin menghapus data "+data['nama']+"? Data ini tidak bisa dipulihkan kembali.");
      $('#hapusModal').find('#deleteButton').attr("onclick", "hapusData("+data['id']+")");
    });

    // });
    <?php
      if($this->session->userdata('success')) :
        $respon = $this->session->userdata('success');
    ?>
      $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><?php echo $respon; ?></div>")
      $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
    <?php endif; ?>
  });
</script>
</body>
</html>
