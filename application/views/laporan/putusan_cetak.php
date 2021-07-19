<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Salinan Putusan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view("_partials/css.php") ?>
	<style type="text/css">
		@media print{@page {size:landscape;}}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-items-center">
				<div class="text-center">
					<?php 
						$this->config->load('ptsp_config',TRUE);
						$nama_pa = $this->config->item('nama_pa','ptsp_config');
					 ?>
					<h3 class="text-uppercase">LAPORAN PENGAMBILAN SALINAN PUTUSAN<br>PADA PENGADILAN AGAMA <span class="text-uppercase"><?php echo $nama_pa; ?></span><br>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?></h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr class="text-center">
								<th scope="col">NO</th>
								<th scope="col">Nama</th>
								<th scope="col">NO. Perkara</th>
								<th scope="col">Pihak</th>
								<th scope="col">NO. HP</th>
								<th scope="col">Tanggal</th>
							</tr>
							<tbody>
								<?php 
									$no = 1;
									function tgl_indo($tanggal){
										$bulan = array (
											1 =>   'Januari',
											'Februari',
											'Maret',
											'April',
											'Mei',
											'Juni',
											'Juli',
											'Agustus',
											'September',
											'Oktober',
											'November',
											'Desember'
										);
										$pecahkan = explode('-', $tanggal);
										
										// variabel pecahkan 0 = tanggal
										// variabel pecahkan 1 = bulan
										// variabel pecahkan 2 = tahun
									 
										return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
									}
									foreach($laporan as $key=>$val):
								 ?>
								 <tr>
								 	<th scope="row" class="text-center"><?php echo $no; ?></th>
								 	<td><?php echo $val->nama; ?></td>
								 	<td><?php echo $val->no_perkara; ?></td>
								 	<td class="text-uppercase text-center"><?php echo $val->pihak; ?></td>
								 	<td><?php echo $val->no_hp; ?></td>
								 	<td style="white-space: nowrap; width: 1%;"><?php echo tgl_indo($val->tanggal); ?></td>
								 </tr>
								 <?php $no++; endforeach; ?>
							</tbody>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td style="width: 20%;"></td>
						<td style="width: 30%;">Mengetahui,<br>Ketua,<br><br><br><br><?php echo $ttd->ketua; ?><br>NIP. <?php echo $ttd->ketua_nip; ?></td>
						<td style="width: 20%;"></td>
						<td style="width: 30%;"><span class="text-capitalize"><?php echo $nama_pa; ?></span>, <?php echo $now; ?><br>Panitera,<br><br><br><br><?php echo $ttd->panitera; ?><br>NIP. <?php echo $ttd->panitera_nip; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>