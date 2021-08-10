<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan | Akta Cerai</title>
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
	<?php $this->load->view("_partials/navbar.php") ?>
	<?php $this->load->view("_partials/sidebar_container.php") ?>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Akta Cerai</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
							<li class="breadcrumb-item">Laporan</li>
							<li class="breadcrumb-item active">Akta Cerai</li>
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
								<h3 class="card-title">Cetak Laporan Akta Cerai</h3>
							</div>
							<div class="card-body">
								<form class="form-inline" id="form_filter">
									<div class="input-group mb-2 mr-sm-2">
										<label for="bulan" class="mr-2">Bulan</label>
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
								<table id="dt_laporan_ac" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th></th>
											<th>NO.</th>
											<th>Nama</th>
											<th>NO. Perkara</th>
											<th>NO. Akta Cerai</th>
											<th>Pihak</th>
											<th>NO. HP</th>
											<th>Foto</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
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
<!-- datatables -->
<script src="<?php echo base_url('asset/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('asset/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Stuck JsZip -->
<script src="<?php echo base_url('asset/plugin/stuck-jszip/jszip.min.js') ?>"></script>
<!-- Moment -->
<script src="<?php echo base_url('asset/plugin/moment/moment-with-locales.min.js') ?>"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<!-- lightbox -->
<script src="<?php echo base_url('asset/plugin/lightbox2/dist/js/lightbox.min.js') ?>"></script>

<script type="text/javascript">
	var dt_laporan_ac;
	function filterData(data)
	{
	  $.ajax({
	    type: "POST",
	    url: "<?php echo base_url('laporan/data_laporan_filter/ac'); ?>",
	    data: data,
	    success: function(data){
	      dt_laporan_ac.clear()
	      dt_laporan_ac.rows.add(JSON.parse(data));
	      dt_laporan_ac.draw();
	    }
	  });
	}

	function cetak()
	{
		bulan = $("select[name='bulan']").val();
		tahun = $("select[name='tahun']").val();
		window.open("<?php echo base_url('laporan/cetak_laporan/ac/'); ?>"+bulan+'/'+tahun);
	}

	$(document).ready(function(){
		$("#sidebar_laporan").addClass("active");
		$("#sidebar_laporan_ac").addClass("active");
		moment.locale('id');
		$.fn.dataTable.moment('LL');
		dt_laporan_ac = $("#dt_laporan_ac").DataTable({
			dom : 'Bfrtip',
			order : [[1,'asc']],
			ajax : {
			  url: "<?php echo base_url('laporan/data_laporan/ac'); ?>",
			  dataSrc : "",
			},
			columns : [
			{data : "id"},
			{data : null, sortable: true, render: function(data,type,row,meta){
			  return meta.row + meta.settings._iDisplayStart + 1;
			}},
			{data : "nama"},
			{data : "no_perkara"},
			{data : "no_ac"},
			{data : "pihak"},
			{data : "no_hp"},
			{"data" : null, "sortable" : false, render: function(data,type,row,meta){
				return "<a href='<?php echo base_url('upload/ac/')?>"+row['foto']+"' data-lightbox="+row['foto']+" data-title='"+row['nama']+"'><img src='<?php echo base_url('upload/ac/')?>"+row['foto']+"' width='64' /></a>";
			}},
			{data : "tanggal"},
			],
			columnDefs : [
			{
				targets : [0],
				visible : false,
			},
			{
				targets : [8],
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

		$("#form_filter").on('submit', function(e){
		  e.preventDefault();
		  data = $(this).serialize();
		  filterData(data);
		});
	});
</script>
</body>
</html>