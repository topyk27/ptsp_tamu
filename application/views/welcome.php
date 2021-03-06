<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tamu PTSP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
						<div class="col-md-12">
							<?php 
							// $this->config->load('ptsp_config',TRUE);
							 ?>
							<h1>PTSP Pengadilan Agama <?php echo $this->session->userdata('nama_pa'); ?></h1>
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
									<h3 class="card-title" id="title_statistik">Statistik Pelayanan</h3>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="barChart" style="min-height: 250px; max-height: 250px; max-width: 100%"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view("_partials/numpang.php") ?>
			</section>
		</div>
		<?php $this->load->view("_partials/footer.php") ?>
		<?php $this->load->view("_partials/loader.php") ?>
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('asset/plugin/chart.js/Chart.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
	<!-- Moment -->
	<script src="<?php echo base_url('asset/plugin/moment/moment-with-locales.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>

	<script type="text/javascript">
		var now = new Date();
		var tahun = now.getFullYear();
		var bulan = now.getMonth()+1;
		moment.locale('id');
		var nama_bulan = moment().format('MMMM');
		var tkn = "<?php echo $this->session->userdata('ptsp_tamu_tkn'); ?>";
		var nama_pa = "<?php echo $this->session->userdata('nama_pa'); ?>";
		var nama_pa_pendek = "<?php echo $this->session->userdata('nama_pa_pendek'); ?>";
		function jumlah_hari(bulan, tahun) {
			return new Date(tahun,bulan,0).getDate();
		}

		$(document).ready(function(){
			
			$.ajax({
				url: "https://raw.githubusercontent.com/topyk27/ptsp_tamu/main/asset/mine/token/token.json",
				method: 'GET',
				dataType: 'json',
				beforeSend: function(){
					$(".loader2").show();
				},
				success: function(data)
				{
					try{
						if(nama_pa==data[nama_pa_pendek][0].nama_pa && nama_pa_pendek==data[nama_pa_pendek][0].nama_pa_pendek && tkn==data[nama_pa_pendek][0].token)
						{
							
						}
						else
						{
							location.replace("<?php echo base_url('setting/awal'); ?>");
						}
					}
					catch(err)
					{
						location.replace("<?php echo base_url('setting/awal'); ?>");
					}
					$(".loader2").hide();
				},
				error: function()
				{
					$.ajax({
						url: "<?php echo base_url('asset/mine/token/token.json'); ?>",
						method: "GET",
						dataType: 'json',
						success: function(lokal)
						{
							if(nama_pa==lokal[nama_pa_pendek][0].nama_pa && nama_pa_pendek==lokal[nama_pa_pendek][0].nama_pa_pendek && tkn==lokal[nama_pa_pendek][0].token)
							{
								
							}
							else
							{
								location.replace("<?php echo base_url('setting/awal'); ?>");
							}
							$(".loader2").hide();
						},
						error: function(err)
						{
							$(".loader2").hide();
							alert('Gagal dapat data token, harap hubungi administrator');
						}
					});
				}
			});
			$("#title_statistik").text("Statistik Pengunjung Bulan "+nama_bulan);
			$("#sidebar_home").addClass("active");

			$.ajax({
				url: "<?php echo base_url('produk/statistik'); ?>",
				method: 'GET',
				dataType: 'json',
				success: function(data)
				{
					var hari = jumlah_hari(bulan,tahun);
					var label = [];
					var inf_val = [];
					var ac_val = [];
					var pts_val = [];
					var pnt_val = [];
					var daftar_val = [];
					var ketemu = false;
					var informasi = data.informasi;
					var ac = data.ac;
					var putusan = data.putusan;
					var penetapan = data.penetapan;
					var pendaftaran = data.pendaftaran;

					for(var aa=1; aa<=hari; aa++)
					{
						let a_ketemu = false;
						for(var a in informasi)
						{
							if(aa==informasi[a].tanggal)
							{
								inf_val.push(parseInt(informasi[a].total));
								a_ketemu = true;
								break;
							}
							else
							{
								a_ketemu = false;
							}
						}
						if(!a_ketemu)
						{
							inf_val.push(0);
						}
					}

					for(var bb=1; bb<=hari; bb++)
					{
						let b_ketemu = false;
						for(var b in ac)
						{
							if(bb==ac[b].tanggal)
							{
								ac_val.push(parseInt(ac[b].total));
								b_ketemu = true;
								break;
							}
							else
							{
								b_ketemu = false;
							}
						}
						if(!b_ketemu)
						{
							ac_val.push(0);
						}
					}

					for(var cc=1; cc<=hari; cc++)
					{
						let c_ketemu = false;
						for(var c in putusan)
						{
							if(cc==putusan[c].tanggal)
							{
								pts_val.push(parseInt(putusan[c].total));
								c_ketemu = true;
								break;
							}
							else
							{
								c_ketemu = false;
							}
						}
						if(!c_ketemu)
						{
							pts_val.push(0);
						}
					}

					for(var dd=1; dd<=hari; dd++)
					{
						let d_ketemu = false;
						for(var d in penetapan)
						{
							if(dd==penetapan[d].tanggal)
							{
								pnt_val.push(parseInt(penetapan[d].total));
								d_ketemu = true;
								break;
							}
							else
							{
								d_ketemu = false;
							}
						}
						if(!d_ketemu)
						{
							pnt_val.push(0);
						}
					}

					for(var ee=1; ee<=hari; ee++)
					{
						let e_ketemu = false;
						for(var e in pendaftaran)
						{
							if(ee==pendaftaran[e].tanggal)
							{
								daftar_val.push(parseInt(pendaftaran[e].total));
								e_ketemu = true;
								break;
							}
							else
							{
								e_ketemu = false;
							}
						}
						if(!e_ketemu)
						{
							daftar_val.push(0);
						}
					}

					for(var i =1; i<=hari; i++)
					{
						label.push(i);
					}

					// bar
					var areaChartData = {
						labels  : label,
						datasets: [
							{
								label : 'Informasi',
								backgroundColor : 'rgba(0,255,255,1)',
								borderColor : 'rgba(0,255,255,0.8)',
								pointRadius : false,
								pointColor : '#3b8bba',
								pointStrokeColor : 'rgba(60,141,188,1)',
								pointHighlightFill : '#fff',
								pointHighlightStroke : 'rgba(60,141,188,1)',
								data : inf_val,

							},
							{
								label : 'Akta Cerai',
								backgroundColor : 'rgba(255,0,255,1)',
								borderColor : 'rgba(255,0,255,0.8)',
								pointRadius : false,
								pointColor : '#3b8bba',
								pointStrokeColor : 'rgba(60,141,188,1)',
								pointHighlightFill : '#fff',
								pointHighlightStroke : 'rgba(60,141,188,1)',
								data : ac_val,

							},
							{
								label : 'Putusan',
								backgroundColor : 'rgba(255,255,0,1)',
								borderColor : 'rgba(255,255,0,0.8)',
								pointRadius : false,
								pointColor : '#3b8bba',
								pointStrokeColor : 'rgba(60,141,188,1)',
								pointHighlightFill : '#fff',
								pointHighlightStroke : 'rgba(60,141,188,1)',
								data : pts_val,

							},
							{
								label : 'Penetapan',
								backgroundColor : 'rgba(0,0,0,1)',
								borderColor : 'rgba(0,0,0,1,0.8)',
								pointRadius : false,
								pointColor : '#3b8bba',
								pointStrokeColor : 'rgba(60,141,188,1)',
								pointHighlightFill : '#fff',
								pointHighlightStroke : 'rgba(60,141,188,1)',
								data : pnt_val,

							},
							{
								label : 'Pendaftaran',
								backgroundColor : 'rgba(255,99,71,1)',
								borderColor : 'rgba(0,0,0,1,0.8)',
								pointRadius : false,
								pointColor : '#3b8bba',
								pointStrokeColor : 'rgba(60,141,188,1)',
								pointHighlightFill : '#fff',
								pointHighlightStroke : 'rgba(60,141,188,1)',
								data : daftar_val,

							},

						]
					}
					var barChartCanvas = $('#barChart').get(0).getContext('2d')
					var barChartData = jQuery.extend(true, {}, areaChartData)
					var temp0 = areaChartData.datasets[0];
					var temp1 = areaChartData.datasets[1];
					var temp2 = areaChartData.datasets[2];
					var temp3 = areaChartData.datasets[3];
					var temp4 = areaChartData.datasets[4];
					barChartData.datasets[0] = temp0;
					barChartData.datasets[1] = temp1;
					barChartData.datasets[2] = temp2;
					barChartData.datasets[3] = temp3;
					barChartData.datasets[4] = temp4;

					var barChartOptions = {
					  responsive              : true,
					  maintainAspectRatio     : false,
					  datasetFill             : false,
					  scales : {
					  	yAxes : [{
					  	    	ticks: {
					  	    		stepSize: 1,
					  	    	}
					  	    }],
					  },
					  tooltips : {
					  	enabled : true,
					  	mode : 'single',
					  	callbacks: {
					  		title: function(tooltipItems, data){
					  			return tooltipItems[0].xLabel + ' ' + moment().format('MMMM');
					  		}
					  	}
					  }
					}

					var barChart = new Chart(barChartCanvas, {
					  type: 'bar', 
					  data: barChartData,
					  options: barChartOptions
					});
					// end bar
				}
			});
		});
	</script>

</body>
</html>