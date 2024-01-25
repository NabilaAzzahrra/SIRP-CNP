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

<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-cc elevation-1"><a href="<?= base_url('User_satu/perusahaan') ?>"><i class="fas fa-building"></i></a></span>

            <div class="info-box-content">
                <span class="info-box-text">Perusahaan</span>
                <span class="info-box-number"><?= count($per); ?></span>
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


<?= $this->session->flashdata('pesan'); ?>
<?php if (count($perusahaan) == 500) {
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Jika ingin menambah data perusahaan harap hapus salah satu terlebih dahulu</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
} ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('User_satu/perusahaan_add') ?>" class="btn btn-primary btn-sm <?php if (count($perusahaan) == 500) {
                                                                                                echo "disabled";
                                                                                            } ?>">
            <i class="fas fa-plus"></i> Tambah Perusahaan
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('User_satu/perusahaan') ?>" method="GET">
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
                        <th class="text-center">NO HP</th>
                        <th class="text-center">MOU</th>
                        <th class="text-center">Relasi</th>
                        <th class="text-center">Non-Aktifkan</th>
                        <th class="text-center">Account Executive</th>
                        <th class="text-center">Grade</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                $no = 1;
                //$id_perusahaan = "";
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
                    if ($p->nama == $this->session->userdata('username')) {
                        //if (count($p->nama = $this->session->userdata('username')) == 5) {
                        if (count($nama) == 5) {
                ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><a href="<?= base_url('') ?>user_satu/perusahaan_id?id_perusahaan=<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></a></td>
                                <td><?= $p->bidang ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?= $p->kota ?></td>
                                <td><?= $p->kontak_person ?></td>
                                <td><?= $p->jabatan ?></td>
                                <td><?= $p->no_telp ?></td>
                                <td class="text-center"><span class="badge <?= $bg ?>"><?= $p->sudah_mou ?></span></td>
                                <td class="text-center"><span class="badge <?= $g ?>"><?= $p->relasi ?></span></td>
                                <td><a class="btn btn-danger btn-sm" title="Non-Aktifkan Data" onclick="return aktif(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
                                        <i class="fas fa-ban"></i>
                                    </a></td>
                                <td><?= $p->nama ?></td>
                                <td></td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><a href="<?= base_url('') ?>user_satu/perusahaan_id?id_perusahaan=<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></a></td>
                                <td><?= $p->bidang ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?= $p->kota ?></td>
                                <td><?= $p->kontak_person ?></td>
                                <td><?= $p->jabatan ?></td>
                                <td><?= $p->no_telp ?></td>
                                <td class="text-center"><span class="badge <?= $bg ?>"><?= $p->sudah_mou ?></span></td>
                                <td class="text-center"><span class="badge <?= $g ?>"><?= $p->relasi ?></span></td>
                                <td><a class="btn btn-danger btn-sm <?php if (count($perusahaan) > 5 || count($perusahaan) < 5) {
                                                                        echo "disabled";
                                                                    } ?>" onclick="return aktif(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
                                        <i class="fas fa-ban"></i>
                                    </a></td>
                                <td><?= $p->nama ?></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        <?php
                    } else {
                        //if (count($p->nama == $this->session->userdata('username')) == 5) {
                        if (count($perusahaan) == 5) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->nama_perusahaan ?></td>
                                <td><?= $p->bidang ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?= $p->kota ?></td>
                                <td><?= $p->kontak_person ?></td>
                                <td><?= $p->jabatan ?></td>
                                <td><?= $p->no_telp ?></td>
                                <td class="text-center"><span class="badge <?= $bg ?>"><?= $p->sudah_mou ?></span></td>
                                <td class="text-center"><span class="badge <?= $g ?>"><?= $p->relasi ?></span></td>
                                <td><a class="btn btn-danger btn-sm" title="Non-Aktifkan Data" onclick="return aktif(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
                                        <i class="fas fa-ban"></i>
                                    </a></td>
                                <td><?= $p->nama ?></td>
                                <td></td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->nama_perusahaan ?></td>
                                <td><?= $p->bidang ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?= $p->kota ?></td>
                                <td><?= $p->kontak_person ?></td>
                                <td><?= $p->jabatan ?></td>
                                <td><?= $p->no_telp ?></td>
                                <td class="text-center"><span class="badge <?= $bg ?>"><?= $p->sudah_mou ?></span></td>
                                <td class="text-center"><span class="badge <?= $g ?>"><?= $p->relasi ?></span></td>
                                <td><a class="btn btn-danger btn-sm <?php if (count($perusahaan) > 5 || count($perusahaan) < 5) {
                                                                        echo "disabled";
                                                                    } ?>" onclick="return aktif(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
                                        <i class="fas fa-ban"></i>
                                    </a></td>
                                <td><?= $p->nama ?></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
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
                        Yakin untuk Non-Aktif kan <b id="name-delete"></b> dari tabel ini?
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
    function aktif(id_perusahaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Non-Aktifkan Perusahaan');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('User_satu/aktif'); ?>';
    }
</script>