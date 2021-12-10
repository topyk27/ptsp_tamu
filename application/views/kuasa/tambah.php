<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu PTSP | Tambah</title>
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
                            <h1>Surat Kuasa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('kuasa') ?>">Surat Kuasa</a></li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row-mb-2">
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
                                <div class="card-header">
                                    <h3 class="card-title">Tambah</h3>
                                </div>
                                <form role="form" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="jenis">Jenis Perkara</label>
                                            <select id="select_jenis" class="form-control">
                                                <option value="0">Pilih Jenis Perkara</option>
                                                <option value="gugatan">Gugatan</option>
                                                <option value="permohonan">Permohonan</option>
                                            </select>
                                        </div>
                                        <div class="form-group"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>