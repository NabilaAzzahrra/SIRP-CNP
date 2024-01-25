<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .btn-danger {
        background-color: #ED1C24;
    }

    .b {
        color: #fff;
    }
</style>
<div class="card card-primary">
    <?php
    //print_r($mahasiswa);
    foreach ($usaha as $m) {
    ?>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-2">
                <label>NIM</label>
                <input value="<?= $m->nim ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-md-5">
                <label>Nama Mahasiswa</label>
                <input value="<?= $m->nama_mhs ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Kelas</label>
                <input value="<?= $m->kelas ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>Asal Sekolah</label>
                <input value="<?= $m->asal_sekolah ?>" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>No HP</label>
                <input value="<?= $m->no_hp ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Nama Usaha</label>
                <input name="nama_perusahaan" value="<?= $m->nama_usaha ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>Alamat Usaha</label>
                <input value="<?= $m->alamat_usaha ?>" class="form-control" disabled>
            </div>
        </div>
        <div class="row" id="kerja">
            <div class="form-group col-md-2">
                <label>Tanggal Mulai</label>
                <input value="<?= $m->tanggal_mulai ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Omset</label>
                <input value="<?= $m->omset ?>" class="form-control" disabled>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a onclick="return ubah(`<?= $m->id_usaha ?>`,`<?= $m->nim ?>`,`<?= $m->nama_usaha ?>`,`<?= $m->alamat_usaha ?>`,`<?= $m->tanggal_mulai ?>`,`<?= $m->omset ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> <span class="b">Ubah</span>
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $m->id_usaha ?>`,`<?= $m->nama_usaha ?>`)">
            <i class="fas fa-trash"></i> <span class="b">Hapus</span>
        </a>
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
                    <input type="hidden" name="id_usaha">
                    <span id="modal-body-update-or-create">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nama Mahasiswa</label>
                                <select name="nim" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Mahasiswa" onchange="return getMahasiswa()">
                                    <option value="">--PILIH--</option>
                                    <?php foreach ($mahasiswa as $p) { ?>
                                        <option value="<?= $p->nim ?>"><?= $p->nama_mhs ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <span id="data-mhs"></span>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nama Usaha</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alamat Usaha</label>
                                <textarea onkeyup="this.value = this.value.toUpperCase()" type="text" name="alamat_usaha" class="form-control" placeholder="Alamat Usaha"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Omset</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="omset" class="form-control" placeholder="Omset">
                            </div>
                        </div>
                    </span>
                    <span id="modal-body-delete">
                        Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
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
    function getMahasiswa() {
        var id = $('[name="nim"]').val();
        $('#data-mhs').load("getMahasiswa?nim=" + id, function() {});
    }

    function ubah(id_usaha, nama_mhs, nama_usaha, alamat_usaha, tanggal_mulai, omset) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Usaha');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_usaha"]').val(id_usaha);
        $('[name="nim"]').val(nama_mhs).trigger('change');
        $('[name="nama_usaha"]').val(nama_usaha);
        $('[name="alamat_usaha"]').val(alamat_usaha);
        $('[name="tanggal_mulai"]').val(tanggal_mulai);
        $('[name="omset"]').val(omset);
        document.form.action = '<?= base_url('Master/usaha_update_aksi'); ?>';
    }

    function hapus(id_usaha, nama_usaha) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Usaha');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_usaha"]').val(id_usaha);
        $('#name-delete').html(nama_usaha);
        document.form.action = '<?= base_url('Master/usaha_delete'); ?>';
    }
</script>
