<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Help</title>
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
							<h1>Help</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active">Help</li>
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
									<h3 class="card-title">Pengaduan & Informasi</h3>
								</div>
								<div class="card-body">
									<p class="lead">Ini berfungsi untuk mendata pengunjung yang memerlukan informasi atau ingin melakukan pengaduan. Berikut petunjuknya :</p>
                                    <ol>
                                        <li>Pilih menu <a href="<?php echo base_url('informasi'); ?>">Pengaduan & Informasi</a></li>
										<li>Pilih tombol <a href="<?php echo base_url('informasi/tambah'); ?>">Tambah</a></li>
										<li>Isikan semua kolom yang tersedia</li>
										<li>Lalu klik tombol simpan</li>
                                    </ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Pendaftaran</h3>
								</div>
								<div class="card-body">
									<p class="lead">Mencatat pengunjung yang mendaftar melalui PTSP Pengadilan. Fitur ini hanya bisa digunakan apabila pihak sudah mendapatkan nomor perkara. Fitur ini berguna menyimpan foto pihak yang mendaftar, sehingga ketika pengambilan produk, petugas bisa membandingkan pihak yang mendaftar dan pihak yang mengambil. Berikut petunjuknya :</p>
									<ol>
										<li>Pilih menu <a href="<?php echo base_url('pendaftaran'); ?>">Pendaftaran</a></li>
										<li>Klik tombol <a href="<?php echo base_url('pendaftaran/tambah'); ?>">Tambah</a></li>
										<li>Pilih jenis perkara</li>
										<li>Masukkan nomor perkara</li>
										<li>Klik tombok check</li>
										<li>Ambil foto pihak</li>
										<li>Klik tombol simpan</li>
									</ol>
									<p class="lead">Terdapat fitur sinkron, ini berguna untuk menyinkronkan data pihak yang ada di sipp dengan data pihak yang ada di aplikasi ini.</p>
									<ol>
										<li>Klik tombol <a href="<?php echo base_url('pendaftaran/sinkron'); ?>">Sinkron</a></li>
										<li>Pilih tahun dan bulan</li>
										<li>Klik sinkron</li>
										<li>Sistem akan menyinkronkan data pihak, tunggu saja hingga selesai</li>
									</ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Akta Cerai</h3>
								</div>
								<div class="card-body">
									<p class="lead">Untuk mendata pihak yang mengambil akta cerai</p>
									<ol>
										<li>Klik menu <a href="<?php echo base_url('produk/ac'); ?>">Akta Cerai</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/ac_tambah'); ?>">Tambah</a></li>
										<li>Masukkan nomor perkaranya saja tanpa Pdt dan lainnya</li>
										<li>Masukkan tahun perkaranya</li>
										<li>Klik tombol check</li>
										<li>Pilih pihak</li>
										<li>Masukkan semua kolom yang tersedia</li>
										<li>Pada tahap pengambilan foto, terdapat foto pihak pada saat melakukan pendaftaran. Anda bisa membandingkan pihak yang mendaftar dan yang mengambil apakah orang yang sama</li>
										<li>Klik tombol simpan</li>
									</ol>
									<p class="lead">Apabila perkara di tahun yang lama dan tidak terdata pada aplikasi SIPP, anda bisa mengisi data pengambilan akta cerai secara manual.</p>
									<ol>
										<li>Klik menu <a href="<?php echo base_url('produk/ac'); ?>">Akta Cerai</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/ac_tambah'); ?>">Tambah</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/ac/manual'); ?>">Tambah Manual</a></li>
										<li>Isikan semua kolom yang tersedia</li>
									</ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Salinan Putusan</h3>
								</div>
								<div class="card-body">
									<p class="lead">Untuk mendata pihak yang mengambil salinan putusan</p>
									<ol>
										<li>Klik menu <a href="<?php echo base_url('produk/putusan'); ?>">Salinan Putusan</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/putusan_tambah'); ?>">Tambah</a></li>
										<li>Masukkan nomor perkaranya saja tanpa Pdt dan lainnya</li>
										<li>Masukkan tahun perkaranya</li>
										<li>Klik tombol check</li>
										<li>Pilih pihak</li>
										<li>Masukkan semua kolom yang tersedia</li>
										<li>Pada tahap pengambilan foto, terdapat foto pihak pada saat melakukan pendaftaran. Anda bisa membandingkan pihak yang mendaftar dan yang mengambil apakah orang yang sama</li>
										<li>Klik tombol simpan</li>
									</ol>
									<p class="lead">Apabila perkara di tahun yang lama dan tidak terdata pada aplikasi SIPP, anda bisa mengisi data pengambilan salinan putusan secara manual.</p>
									<ol>
										<li>Klik menu <a href="<?php echo base_url('produk/putusan'); ?>">Salinan Putusan</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/putusan_tambah'); ?>">Tambah</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/putusan/manual'); ?>">Tambah Manual</a></li>
										<li>Isikan semua kolom yang tersedia</li>
									</ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Salinan Penetapan</h3>
								</div>
								<div class="card-body">
									<p class="lead">Untuk mendata pihak yang mengambil salinan penetapan</p>
									<ol>
										<li>Klik menu <a href="<?php echo base_url('produk/penetapan'); ?>">Salinan Penetapan</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/penetapan_tambah'); ?>">Tambah</a></li>
										<li>Masukkan nomor perkaranya saja tanpa Pdt dan lainnya</li>
										<li>Masukkan tahun perkaranya</li>
										<li>Klik tombol check</li>										
										<li>Masukkan semua kolom yang tersedia</li>
										<li>Pada tahap pengambilan foto, terdapat foto pihak pada saat melakukan pendaftaran. Anda bisa membandingkan pihak yang mendaftar dan yang mengambil apakah orang yang sama</li>
										<li>Klik tombol simpan</li>
									</ol>
									<p class="lead">Apabila perkara di tahun yang lama dan tidak terdata pada aplikasi SIPP, anda bisa mengisi data pengambilan salinan penetapan secara manual.</p>
									<ol>
										<li>Klik menu <a href="<?php echo base_url('produk/penetapan'); ?>">Salinan penetapan</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/penetapan_tambah'); ?>">Tambah</a></li>
										<li>Klik tombol <a href="<?php echo base_url('produk/penetapan/manual'); ?>">Tambah Manual</a></li>
										<li>Isikan semua kolom yang tersedia</li>
									</ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Kamera tidak terbaca</h3>
								</div>
								<div class="card-body">
									<p class="lead">Apabila pada saat pengambilan gambar kamera tidak terbaca, silahkan ikuti petunjuk berikut. Petunjuk di bawah ini untuk pengguna google chrome. Untuk pengguna browser lain bisa dicari caranya di internet dengan kata kunci <a href="https://web-pemula-ku.blogspot.com/search?q=treat+insecure+origin+as+secure">treat insecure origin as secure</a></p>
									<ol>
										<li>
											<p>Copy alamat berikut, dan paste kan pada halaman url address lalu tekan enter</p>
											<blockquote class="blockquote">
												chrome://flags/#unsafely-treat-insecure-origin-as-secure
											</blockquote>
										</li>
										<li>
											<p>Masukkan alamat server anda di kotak <code>Insecure origins treated as secure</code> setelah itu pilih dropdown di sebelahnya menjadi Enabled.</p>
											<img src="<?php echo base_url('asset/img/img-1.png'); ?>" class="img-fluid mb-3">
										</li>
										<li>
											<p>Kemudian apabila muncul gambar seperti di bawah ini, silahkan pilih Allow.</p>
											<img src="<?php echo base_url('asset/img/img-2.png'); ?>" class="img-fluid mb-3">
										</li>
									</ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Gagal Upload Foto</h3>
								</div>
								<div class="card-body">
									<p class="lead">Gagal mengupload foto disebabkan karena hak akses ke folder upload. Ikuti petunjuk berikut</p>
									<ol>
										<li>Buka folder aplikasi ini di server, biasanya saya menggunakan filezilla</li>
										<li>Cari folder yang bernama upload</li>
										<li>
											<p>Klik kanan folder upload dan pilih <code>File Permissions</code></p>
											<img src="<?php echo base_url('asset/img/img-3.png'); ?>" class="img-fluid mb-3">
										</li>
										<li>
											<p>Ubah attribute seperti gambar ini</p>
											<img src="<?php echo base_url('asset/img/img-4.png'); ?>" class="img-fluid mb-3">
										</li>
									</ol>
								</div>
							</div>
							<div class="card card-primary">
								<div class="card-body">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sl5141PeRqQ" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('asset/js/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('asset/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#sidebar_help").addClass("active");
		});
	</script>
</body>
</html>