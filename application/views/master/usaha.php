<style>
    .fa-minus {
        color: #000000;
    }

    .fa-times {
        color: #000000;
    }

    .fa-plus {
        color: #fff;
    }

    .card-cc {
        background-color: #0073BD;
    }

    .card-title {
        color: #fff;
    }

    .fa-minus {
        color: #fff;
    }

    .fa-times {
        color: #fff;
    }

    .bg-cc {
        background-color: #0073BD;
    }

    .jdl {
        font-weight: bold;
    }

    .bg-dd {
        background-color: #ED1C24;
    }

    .btn-primary {
        background-color: #0073BD;
    }

    #load {
        width: 100%;
        height: 100%;
        position: fixed;
        text-indent: 100%;
        background: #e0e0e0 url('../assets/template/dist/img/images/loading.gif') no-repeat center;
        z-index: 1;
        opacity: 0.4;
        background-size: 8%;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('Master/perusahaan') ?>"><i class="fas fa-building"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Perusahaan</span>
                <span class="info-box-number"><?= count($perusahaan); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('Master/telleseling') ?>"><i class="nav-icon fab fa-telegram-plane"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Follow Up</span>
                <span class="info-box-number"><?= count($followup); ?>/20</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('Master/permintaan') ?>"><i class="fas fa-business-time"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Permintaan</span>
                <span class="info-box-number"><?= count($permintaan); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('Master/usaha') ?>"><i class="fas fa-business-time"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Wirausaha</span>
                <span class="info-box-number"><?= count($usaha); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"> <a href="<?= base_url('Master/mahasiswa') ?>">
                    <i class="fas fa-user-graduate"></i></a></span>
            <div class="info-box-content">
                <span class="info-box-text">Mahasiswa</span>
                <span class="info-box-number"><?= count($mhs); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('Master/usaha_add') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Usaha
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Mahasiswa</th>
                                    <th class="text-center">Usaha</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Tanggal Mulai</th>
                                    <th class="text-center">Omset</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($usaha as $m) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td tabindex="0" class="sorting_1"><a href="<?= base_url('') ?>master/usaha_id?id_usaha=<?= $m->id_usaha ?>"><?= $m->nim ?></a></td>
                                        <td><?= $m->nama_mhs ?></td>
                                        <td><?= $m->nama_usaha ?></td>
                                        <td><?= $m->alamat_usaha ?></td>
                                        <td><?= $m->tanggal_mulai ?></td>
                                        <td class="text-center"><?= $m->omset ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script>
    function myfun() {
        ("#tabelku").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                "url": "<?php echo base_url('Master/getdata'); ?>",
                "type": "post",
                "data": {
                    tahun_akademik: $('#ta').val(),
                    prodi: $('#pr').val(),
                }
            },
            bDestroy: true,
            dom: 'Ifrtip8',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
        $('#Modal').on('shown.bs.modal', function() {
            $('[name="id_owner"]').focus();
        });
        $('.select2').select2({
            dropdownParent: $('#Modal')
        });
        $('[name="harga_beli"]').inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            digits: 0,
            digitsOptional: true
        });
        $('[name="harga_jual"]').inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            digits: 0,
            digitsOptional: true
        });
        $('[name="form"]').validate({
            rules: {
                id_owner: {
                    required: true
                },
                id_kategori: {
                    required: true
                },
                nama_produk: {
                    required: true
                },
                qty: {
                    required: true
                },
                harga_beli: {
                    required: true
                },
                harga_jual: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#ta').change(function() {
            myfun();
        });

        $('#pr').change(function() {
            myfun();
        });

    }

    //myfun();
</script>
