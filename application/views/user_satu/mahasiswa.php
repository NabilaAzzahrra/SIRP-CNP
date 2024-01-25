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
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('User_satu/perusahaan') ?>"><i class="fas fa-building"></i></a></span>

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
            <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('User_satu/telleseling') ?>"><i class="nav-icon fab fa-telegram-plane"></i></a></span>

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
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('User_satu/permintaan') ?>"><i class="fas fa-business-time"></i></a></span>

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
            <span class="info-box-icon bg-cc elevation-1"> <a href="<?= base_url('User_satu/mahasiswa') ?>">
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
                        <a href="<?= base_url('User_satu/mahasiswa_add') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Mahasiswa
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="<?= base_url('User_satu/mahasiswa') ?>" method="GET">
                            <div class="row">
                                <div class="col-md-2">
                                    <select class="form-control" id="ta" name="thn">
                                        <option value="">Pilih Tahun Angkatan</option>
                                        <option value="all">--ALL--</option>
                                        <?php foreach ($tahun_akademik as $val) { ?>
                                            <option value="<?= $val->tahun_akademik ?>"><?= $val->tahun_akademik ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="pr" name="prodi">
                                        <option value="">Pilih Prodi</option>
                                        <option value="all">--ALL--</option>
                                        <?php foreach ($prodi as $pr) { ?>
                                            <option value="<?= $pr->prodi ?>"><?= $pr->prodi ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-default"><span><i class="fas fa-search"></i> Tampilkan</span></button>
                                </div>
                            </div>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Mahasiswa</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Asal Sekolah</th>
                                    <th class="text-center">Tahun Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($mahasiswa as $m) {
                                   
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td tabindex="0" class="sorting_1"><a href="<?= base_url('') ?>user_satu/mahasiswa_id?nim=<?= $m->nim ?>"><?= $m->nim ?></a></td>
                                        <td><?= $m->nama_mhs ?></td>
                                        <td><?= $m->prodi ?></td>
                                        <td><?= $m->kelas ?></td>
                                        <td><?= $m->asal_sekolah ?></td>
                                        <td class="text-center"><?= $m->tahun_akademik ?></td>
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
                "url": "<?php echo base_url('User_satu/getdata'); ?>",
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
