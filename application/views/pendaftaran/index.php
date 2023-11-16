<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tamu PTSP | Pendaftaran</title>
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
							<h1>Pendaftaran</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active">Pendaftaran</li>
							</ol>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-sm-2">
							<a href="<?php echo base_url('pendaftaran/tambah'); ?>" class="btn btn-block bg-gradient-primary">
								<i class="fas fa-plus"></i> Tambah
							</a>
						</div>
						<div class="col-md-8"></div>
						<div class="col-sm-2">
							<a href="<?php echo base_url('pendaftaran/sinkron'); ?>" class="btn btn-block bg-gradient-success float-sm-right">
								<i class="fas fa-sync"></i> Sinkron
							</a>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-sm-12" id="respon">
							
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary">
								<table id="dt_pendaftaran" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th></th>
											<th>NO</th>
											<th>Nomor Perkara</th>
											<th>Tanggal</th>
											<th>Jenis Perkara</th>
											<th>Penggugat</th>
											<th>Tergugat</th>
											<th>Foto</th>
											<th>Ubah</th>
											<th>Hapus</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view("_partials/numpang.php") ?>
			</section>
		</div>
		<?php $this->load->view("_partials/footer.php") ?>
		<?php $this->load->view("_partials/loader.php"); ?>
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
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
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>
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
		var dt_pendaftaran;
		function hapusData(id)
		{
			$.ajax({
				url: "<?php echo base_url('pendaftaran/hapus/') ?>"+id,
				dataType: "TEXT",
				beforeSend: function()
				{
					$("loader2").show();
				},
				success: function(respon)
				{
					if(respon="1")
					{
						dt_pendaftaran.ajax.reload(null,false);
						$("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Selamat</strong> Data berhasil dihapus</div>")
						$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
					}
					else
					{
						$("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'><strong>Maaf</strong> Data gagal dihapus. Silahkan coba lagi.</div>")
						$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
					}
					$("loader2").hide();
				},
				error: function(err)
				{
					$("#respon").html("<div class='alert alert-warning' role='alert' id='responMsg'><strong>Error</strong> Mohon periksa koneksi internet anda.</div>")
					$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
				}
			});
		}

		$(document).ready(function(){
			<?php 
				$respon = $this->session->flashdata('success');
				if(isset($respon)) : ?>
					$("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Sukses</strong> <?php echo $respon; ?></div>")
					$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
			<?php endif; ?>
			 
			$("#sidebar_ptsp").addClass("active");
			$("#sidebar_ptsp_pendaftaran").addClass("active");
			moment.locale('id');
			$.fn.dataTable.moment('LL');
			dt_pendaftaran = $("#dt_pendaftaran").DataTable({
				order: [[3,"desc"]],
				ajax: {
					url: "<?php echo base_url('pendaftaran/data_pendaftaran'); ?>",
					dataSrc: "",
				},
				columns: [
				{data: "id"},
				{data: null, sortable: true, render: function(data,type,row,meta){
					return meta.row + meta.settings._iDisplayStart + 1;
				}},
				{data: "no_perkara"},
				{data: "tanggal_pendaftaran"},
				{data: "jenis_perkara"},
				{data: "penggugat"},
				{data: "tergugat"},
				{data: null, sortable: false, render: function(data,type,row,meta){
					return "<a href='<?php echo base_url('upload/pendaftaran/')?>"+row['foto']+"' data-lightbox="+row['foto']+" data-title='"+row['nama']+"'><img src='<?php echo base_url('upload/pendaftaran/')?>"+row['foto']+"' width='64' loading='lazy' /></a>";
				}},
				{data: null, sortable: false, render: function(data,type,row,meta){
					return "<a href='<?php echo base_url('pendaftaran/ubah/') ?>"+row['id']+"' class='btn btn-warning'><i class='fas fa-edit'></i>Ubah</a>";
				}},
				{data: null, sortable: false, render: function(data,type,row,meta){
					return "<a href='#' class='btn btn-danger deleteButton'><i class='fas fa-trash'></i>Hapus</a>";
				}}
				],
				columnDefs: [
				{
					targets: [0],
					visible: false,
				},
				{
					responsivePriority: 1,
					targets: [1,2,3],
				},
				{
					targets: [3],
					data: 'tanggal_pendaftaran',
					render: function(data,type,row,meta)
					{
						var dateObj = new Date(data);
						var momentObj = moment(dateObj);
						return momentObj.format('LL');
					}
				}
				],
				responsive : true,
				autoWidth: false,
			});

			$("#dt_pendaftaran tbody").on('click', 'tr .deleteButton', function(e)
			{
				e.preventDefault();
				var currentRow = $(this).closest('li').length ? $(this).closest('li') : $(this).closest('tr');
				var data = $("#dt_pendaftaran").DataTable().row(currentRow).data();
				$('#hapusModal').modal('show');
				$('#hapusModal').find('.modal-body').html("<p>Apakah anda ingin menghapus data "+data['no_perkara']+"? Data ini tidak bisa dipulihkan kembali.");
				$('#hapusModal').find('#deleteButton').attr("onclick", "hapusData("+data['id']+")");
			});

			<?php
				if($this->session->userdata('respon')) :
					$respon = $this->session->userdata('respon');
			?>
			$("#respon").html("<div class='alert alert-success' role='alert' id='responMsg'><strong>Selamat</strong> <?php echo $respon; ?></div>")
			$("#responMsg").hide().fadeIn(200).delay(2000).fadeOut(1000, function(){$(this).remove();});
			<?php endif; ?>
		});
	</script>
</body>
</html>