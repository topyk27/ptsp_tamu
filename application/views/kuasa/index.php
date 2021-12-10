<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu PTSP | Surat Kuasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view("_partials/css.php") ?>
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
                            <h1>Pendaftaran Surat Kuasa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Surat Kuasa</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-2">
                            <a href="<?php echo base_url('kuasa/tambah') ?>" class="btn btn-block bg-gradient-primary">
                                <i class="fas fa-plus"></i>Tambah
                            </a>
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
                                <table id="dt_sk" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>Surat Kuasa</th>
                                            <th>Tanggal</th>
                                            <th>Perkara</th>
                                            <th>Pihak</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
                    <p></p>
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

    <script type="text/javascript">
        var dt_sk;
        $(document).ready(function(){
            $("#sidebar_ptsp").addClass("active");
            $("#sidebar_ptsp_kuasa").addClass("active");
            moment.locale('id');
            $.fn.dataTable.moment('LL');
            dt_sk = $("#dt_sk").DataTable({
                order : [[3,"desc"]],
                ajax : {
                    url: "<?php echo base_url('kuasa/data_kuasa'); ?>",
                    dataSrc: "",
                },
                columns : [
                    {data:"id"},
                    {data: null, sortable: false, render: function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data:"no_sk"},
                    {data:"tanggal"},
                    {data:"no_perkara"},
                    {data:"pihak"},
                    {data: null, sortable: false, render: function(data,type,row,meta){
                        return "<a href='<?php echo base_url('kuasa/ubah/') ?>"+row['id']+"' class='btn btn-warning'><i class='fas fa-edit'></i>Ubah</a>";
                    }},
                    {data: null, sortable: false, render: function(data,type,row,meta){
                        return "<a href='#' class='btn btn-danger deleteButton'><i class='fas fa-trash'></i>Hapus</a>";
                    }}
                ],
                columnDefs : [
                    {
                        targets: [0],
                        visible: false,
                    },
                    {
                        responsivePriority : 1,
                        targets: [1,2],
                    },
                    {
                        targets: [5],
                        orderable: false,
                    },
                    {
                        targets: 3,
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
        });
    </script>
</body>
</html>