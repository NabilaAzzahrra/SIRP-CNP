<style>
    .card-header {
        background-color: #0073BD;
    }

    .btn-primary {
        background-color: #0073BD;
    }

    .btn-danger {
        background-color: #ED1C24;
    }
</style>
<div class="card card-primary">
    <div class="card-body">
        <form id="Modal" name="form" action="<?= base_url('Master/usaha_add_aksi') ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Nama Mahasiswa</label>
                    <select name="nim" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Mahasiswa" onchange="return getMahasiswa()">
                        <option value="">--PILIH--</option>
                        <?php foreach ($mahasiswa as $p) { ?>
                            <option value="<?= $p->nim ?>"><?= $p->nama_mhs ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('nama_mhs', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <span id="data-mhs"></span>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nama Usaha</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha">
                    <?= form_error('nama_usaha', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label>Alamat Usaha</label>
                    <textarea onkeyup="this.value = this.value.toUpperCase()" type="text" name="alamat_usaha" class="form-control" placeholder="Alamat Usaha"></textarea>
                    <?= form_error('alamat_usaha', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai">
                    <?= form_error('tanggal_mulai', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Omset</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="omset" class="form-control" placeholder="Omset">
                    <?= form_error('omset', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" onclick="return sembunyikan()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<script>
    function getMahasiswa() {
        var id = $('[name="nim"]').val();
        $('#data-mhs').load("getMahasiswa?nim=" + id, function() {
            //$('[name="kota"]').val(kota)
        });
    }
</script>