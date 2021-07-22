<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan | Pengaduan & Informasi</title>
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
            <h1>Laporan Pengaduan & Informasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item">Laporan</li>
              <li class="breadcrumb-item active">Pengaduan & Informasi</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-12" id="respon">
            
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
                <h3 class="card-title">Cetak Laporan Pengaduan & Informasi</h3>
              </div>
              <div class="card-body">
                  <form class="form-inline" id="form_filter">
                    <div class="input-group mb-2 mr-sm-2">
                      <label for="bulan" class="mr-2">Bulan</label>
                      <!-- <input type="date" name="tanggal_awal" class="form-control <?php echo form_error('tanggal_awal') ? 'is-invalid' : '' ?>" value="<?php echo set_value('tanggal_awal', date('Y-m-d')); ?>" required> -->
                      <select name='bulan'>
                          <?php 
                            for($i=1;$i<=12;$i++)
                            {
                              $bulan;
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
                      <div class="invalid-feedback">
                        <?php echo form_error('bulan'); ?>
                      </div>
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                      <label for="tahun" class="mr-2">Tahun</label>
                      <!-- <input type="date" name="tanggal_akhir" class="form-control <?php echo form_error('tanggal_akhir') ? 'is-invalid' : '' ?>" value="<?php echo set_value('tanggal_akhir', date('Y-m-d')); ?>" required> -->
                      <select name="tahun">
                        <?php 
                          for($tahun=2021;$tahun<=date("Y");$tahun++)
                          {
                            echo "<option value='$tahun'>$tahun</option>";
                          }
                         ?>
                      </select>
                      <div class="invalid-feedback">
                        <?php echo form_error('tahun'); ?>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mr-sm-2">Filter</button>
                    <button type="button" class="btn btn-secondary mb-2 mr-sm-2" onclick="cetak()">Cetak</button>
                  </form>
                <table id="dt_laporan_pengaduan" class="table table-bordered table-hover">
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
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
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
<!-- export datatables -->
<!-- <script src="<?php echo base_url('asset/plugin/datatables-button/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-button/buttons.html5.min.js') ?>"></script> -->
<!-- Stuck JsZip -->
<script src="<?php echo base_url('asset/plugin/stuck-jszip/jszip.min.js') ?>"></script>
<!-- Moment -->
<script src="<?php echo base_url('asset/plugin/moment/moment-with-locales.min.js') ?>"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<!-- lightbox -->
<script src="<?php echo base_url('asset/plugin/lightbox2/dist/js/lightbox.min.js') ?>"></script>

<script type="text/javascript">
  var dt_laporan_pengaduan;
  function filterData(data)
  {
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url('laporan/data_laporan_filter_informasi'); ?>',
      data: data,
      success: function(data){
        dt_laporan_pengaduan.clear()
        dt_laporan_pengaduan.rows.add(JSON.parse(data));
        dt_laporan_pengaduan.draw();
      }
    });
  }
  function cetak() {
      bulan = $("select[name='bulan']").val();
      tahun = $("select[name='tahun']").val();
      window.open('<?php echo base_url('laporan/cetak_laporan_informasi/'); ?>'+bulan+'/'+tahun);
    }
  // function hapusData(id)
  // {
  //   $.ajax({
  //     url: "<?php echo base_url('informasi/hapus/') ?>"+id,
  //     dataType: 'text',
  //     success: function(respon)
  //     {
  //       if(respon=="1")
  //       {
  //         $("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Selamat</strong> Data berhasil dihapus</div>");
  //         $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
  //         filterData($("#form_filter").serialize());
  //       }
  //       else
  //       {
  //         console.log("gagal hapus data");
  //         $("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'><strong>Maaf</strong> Data gagal dihapus. Silahkan coba lagi.</div>")
  //         $("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
  //       }
  //     }
  //   });
  // }

  $(document).ready(function(){
    $("#sidebar_laporan").addClass("active");
    $("#sidebar_laporan_pengaduan").addClass("active");
    moment.locale('id');
    $.fn.dataTable.moment('LL');
    dt_laporan_pengaduan = $("#dt_laporan_pengaduan").DataTable({
      dom : 'Bfrtip',
      // buttons : [
      //     {
      //         extend: 'excelHtml5',
      //         exportOptions: {
      //             columns: [1,2,3,4,5,6,7,8]
      //         }
      //     }
      // ],
      order : [[1,'asc']],
      ajax : {
        url: '<?php echo base_url('laporan/data_laporan_informasi'); ?>',
        dataSrc : "",
      },
      columns : [
      {data : "id"},
      {data : null, sortable: true, render: function(data,type,row,meta){
        return meta.row + meta.settings._iDisplayStart + 1;
      }},
      {data : "tanggal"},
      {data : "nama"},
      {data : "alamat"},
      {data : "telepon"},
      {data : "pekerjaan"},
      {data : "informasi"},
      {data : "keterangan"},
      {"data" : null, "sortable" : false, render: function(data,type,row,meta){
        return "<a href='<?php echo base_url('upload/informasi/')?>"+row['foto']+"' data-lightbox="+row['foto']+" data-title='"+row['nama']+"'><img src='<?php echo base_url('upload/informasi/')?>"+row['foto']+"' width='64' /></a>";
      }},
      // {data : null, sortable: false, render:function(data,type,row,meta){
      //   return "<a href='<?php echo base_url('informasi/ubah/') ?>"+row['id']+"' class='btn btn-warning'><i class='fas fa-edit'></i>Ubah</a><a href='#' class='btn btn-danger deleteButton'><i class='fas fa-trash'></i>Hapus</a>";
      // }},
      ],
      columnDefs : [
      {
        targets : [0],
        visible : false,
      },
      {
        targets : [2],
        data : 'tanggal',
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

    // $("#dt_laporan_pengaduan tbody").on('click','tr .deleteButton', function(e){
    //   e.preventDefault();
    //   // var currentRow = $(this).closest("tr");
    //   var currentRow = $(this).closest('li').length ? $(this).closest('li') : $(this).closest('tr');
    //   var data = $("#dt_laporan_pengaduan").DataTable().row(currentRow).data();
    //   $('#hapusModal').modal('show');
    //   $('#hapusModal').find('.modal-body').html("<p>Apakah anda ingin menghapus data "+data['nama']+"? Data ini tidak bisa dipulihkan kembali.");
    //   $('#hapusModal').find('#deleteButton').attr("onclick", "hapusData("+data['id']+")");
    // });

    $("#form_filter").on('submit', function(e){
      e.preventDefault();
      data = $(this).serialize();
      filterData(data);
    });
  });
</script>
</body>
</html>
