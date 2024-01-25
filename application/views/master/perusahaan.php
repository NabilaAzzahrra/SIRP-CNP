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


<div class="card">
    <div class="card-header">
        <a href="<?= base_url('Master/perusahaan_add') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Perusahaan
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('Master/perusahaan') ?>" method="GET">
            <div class="row">
                <div class="col-md-2">
                    <select class="form-control" name="bidang">
                        <option value="">Pilih Bidang</option>
                        <option value="all">--ALL--</option>
                        <?php foreach ($bidang as $val) { ?>
                            <option value="<?= $val->bidang ?>"><?= $val->bidang ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="wilayah">
                        <option value="">Pilih Wilayah</option>
                        <option value="all">--ALL--</option>
                        <?php foreach ($kota as $k) { ?>
                            <option value="<?= $k->kota ?>"><?= $k->kota ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="relasi">
                        <option value="">Pilih Relasi</option>
                        <option value="all">--ALL--</option>
                        <?php foreach ($relasi as $r) { ?>
                            <option value="<?= $r->relasi ?>"><?= $r->relasi ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-default"><span><i class="fas fa-search"></i> Tampilkan</span></button>
                </div>
            </div>
        </form>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Perusahaan</th>
                    <th class="text-center">Bidang</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Kontak Person</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">MOU</th>
                    <th class="text-center">Relasi</th>
                    <th class="text-center">Account Executive</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($perusahaan as $p) {
                    if ($p->sudah_mou == "Sudah") {
                        $bg = "bg-success";
                    } else {
                        $bg = "bg-danger";
                    }

                    if ($p->relasi == "Baru") {
                        $g = "bg-success";
                    } else {
                        $g = "bg-danger";
                    }

                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>master/perusahaan_id?id_perusahaan=<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></a></td>
                        <td><?= $p->bidang ?></td>
                        <td><?= $p->alamat ?></td>
                        <td><?= $p->kota ?></td>
                        <td><?= $p->kontak_person ?></td>
                        <td><?= $p->jabatan ?></td>
                        <td><?= $p->no_telp ?></td>
                        <td class="text-center"><span class="badge <?= $bg ?>"><?= $p->sudah_mou ?></span></td>
                        <td class="text-center"><span class="badge <?= $g ?>"><?= $p->relasi ?></span></td>
                        <td><?= $p->nama ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- /.card-body -->
    </div>
</div>

<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_perusahaan">
                    <span id="modal-body-delete">
                        Yakin untuk Aktif kan <b id="name-delete"></b> dari tabel ini?
                    </span>
                    <span id="modal-body-aktip">
                        Yakin untuk Non Aktif kan <b id="name-del"></b> dari tabel ini?
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block" id="modal-button">OK</button>
                    <button type="button" class="btn btn-block" data-dismiss="modal" id="batal" aria-d-none="true">Batal</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function aktifkan(id_perusahaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Aktifkan Perusahaan');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('#modal-body-aktip').addClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('Master/aktifkan'); ?>';
    }

    function non_aktifkan(id_perusahaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Non Aktifkan Perusahaan');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('#modal-body-aktip').removeClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('#name-del').html(nama_perusahaan);
        document.form.action = '<?= base_url('Master/non_aktifkan'); ?>';
    }
</script>