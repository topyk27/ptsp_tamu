<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tamu PTSP | Proses Sinkron</title>
	<?php $this->load->view("_partials/css.php"); ?>
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">

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
							<h1>Proses Sinkron Data Pendaftaran</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('pendaftaran'); ?>">Pendaftaran</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('pendaftaran/sinkron'); ?>">Sinkron</a></li>
								<li class="breadcrumb-item active">Proses</li>
							</ol>
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
									<h3 class="card-title">Mohon untuk tidak menutup tab ini selama proses sinkron</h3>
								</div>
								<div class="card-body">
									<table id="dt_pendaftaran" class="table table-bordered table-hover">
										<thead>
											<tr class="text-center">
												<th scope="col">NO</th>
												<th scope="col">Nomor Perkara</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Jenis Perkara</th>
												<th scope="col">Penggugat</th>
												<th scope="col">Tergugat</th>
												<th scope="col" style="display: none;">ID ini</th>
												<th scope="col">Proses</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; foreach($perkara as $key=>$val): ?>
												<tr class="data d<?php echo $no; ?>">
													<th scope="row" class="text-center"><?php echo $no; ?></th>
													<td class="no_perkara<?php echo $no; ?>"><?php echo $val->no_perkara; ?></td>
													<td class="tanggal_pendaftaran<?php echo $no; ?>"><?php echo $val->tanggal_pendaftaran; ?></td>
													<td class="jenis_perkara<?php echo $no; ?>"><?php echo $val->jenis_perkara_nama; ?></td>
													<td class="penggugat<?php echo $no; ?>"><?php echo $val->penggugat; ?></td>
													<td class="tergugat<?php echo $no; ?>"><?php echo $val->tergugat; ?></td>
													<td class="id<?php echo $no; ?>" style="display: none;"><?php echo $val->id; ?></td>
													<td class="status<?php echo $no; ?>">Menunggu</td>
												</tr>
												<?php $no++; ?>
											<?php endforeach; ?>
											<?php if(empty($perkara)) : ?>
												<tr>
													<td colspan="7" class="text-center">Tidak ada data</td>
												</tr>
											<?php endif; ?>
										</tbody>
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
	<div id="responModal" class="modal fade">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header flex-column">
					<div class="icon-box">
						<i class="material-icons" id="modal_icon">check</i>
					</div>
					<h4 class="modal-title w-100" id="modal_title">Berhasil</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p id="modal_body">Sinkron selesai</p>
				</div>
				<div class="modal-footer justify-content-center">
					<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
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
	<script type="text/javascript">
		
		$(document).ready(function(){
			$("#sidebar_ptsp").addClass("active");
			$("#sidebar_ptsp_pendaftaran").addClass("active");
			var jumlah_data = $("tr.data").length;
			var ygerror = 0;
			function update(n)
			{
				$.ajax({
					url: "<?php echo base_url("pendaftaran/proses_sinkron"); ?>",
					data: {
						perkara_id: $(".perkara_id"+n).html(),
						no_perkara: $(".no_perkara"+n).html(),
						tanggal_pendaftaran: $(".tanggal_pendaftaran"+n).html(),
						jenis_perkara: $(".jenis_perkara"+n).html(),
						penggugat: $(".penggugat"+n).html(),
						tergugat: $(".tergugat"+n).html(),
						id: $(".id"+n).html(),
					},
					method: "POST",
					beforeSend: function()
					{
						$("tr.d"+n).addClass("table-primary");
						$(".status"+n).html("Proses");
						jalan(n);
					},
					success: function(respon)
					{
						console.log("respon "+respon);
						$(".status"+n).html("Sukses");
						if(n<jumlah_data)
						{
							$("tr.d"+n).removeClass("table-primary");
							n++;
							update(n);
						}
						else
						{
							if(ygerror!=0)
							{
								modal_error();
							}
							else
							{
								modal_success();
							}
							$("#responModal").modal('show');
						}
					},
					error: function(err)
					{
						console.log(err);
						$(".status"+n).html("Gagal");
						$("tr.d"+n).addClass("table-danger");
						ygerror++;
						if(n<jumlah_data)
						{
							$("tr.d"+n).removeClass("table-primary");
							n++;
							update(n);
						}
						else
						{
							if(ygerror!=0)
							{
								modal_error();
							}
							else
							{
								modal_success();
							}
							$("#responModal").modal('show');
						}
					}
				});
			}
			if(jumlah_data!=0)
			{
				update(1);
			}
			function modal_error() {
				$("#modal_icon").html("error");
				$("#modal_title").html("Ada yang error");
				$("#modal_body").html("Silahkan periksa data yang error");
			}
			function modal_success() {
				$("#modal_icon").html("check");
				$("#modal_title").html("Berhasil");
				$("#modal_body").html("Sinkron selesai");
			}

			function jalan(el) {
				$('html, body').animate({
				       scrollTop: $("tr.d"+el).offset().top
				   }, 100);
			}
		});
	</script>
</body>
</html>