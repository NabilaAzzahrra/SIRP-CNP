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
        <form id="Modal" name="form" action="<?= base_url('User_dua/telleseling_add_aksi') ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <div class="form-group">
                <label>Tanggal Follow Up</label>
                <input type="datetime-local" step="1" name="tanggal_fu" class="form-control" placeholder="tanggal_fu" value="YYYY:MM:DDThh:mm:ss" required>
            </div>
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <select name="id_perusahaan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Perusahaan" onchange="return getPerusahaan()">
                    <option value="">--PILIH--</option>
                    <?php foreach ($perusahaan as $p) { ?>
                        <option value="<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></option>
                    <?php } ?>
                </select>
                <?= form_error('nama_perusahaan', '<div class="test-small text-danger">', '</div>'); ?>
            </div>
            <span id="data-perusahaan"></span>
            <div class="form-group">
                <label>Melalui</label>
                <select name="melalui" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Via">
                    <option value="">--PILIH--</option>
                    <option value="Email">Email</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Kunjungan">Kunjungan</option>
                    <option value="Telepon">Telepon</option>
                </select>
                <?= form_error('melalui', '<div class="test-small text-danger">', '</div>'); ?>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Hasil Followup</label>
                    <textarea onkeyup="this.value = this.value.toUpperCase()" type="text" name="hasil_fu" class="form-control" placeholder="Hasil Followup" maxlength="50"></textarea>
                    <?= form_error('hasil_fu', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm" onclick="return sembunyikan()"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<script>
    function getPerusahaan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-perusahaan').load("getPerusahaan?id_perusahaan=" + id, function() {
            $('[name="alamat"]').val(alamat)
            $('[name="bidang"]').val(bidang)
            $('[name="kontak_person"]').val(kontak_person)
            $('[name="jabatan"]').val(jabatan)
            $('[name="no_telp"]').val(no_telp)
        });
    }

    function sembunyikan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-perusahaan').load("getPerusahaan?id_perusahaan=" + id, function() {
            $('[name="alamat"]').addClass('d-none');
            $('[name="bidang"]').addClass('d-none');
            $('[name="kontak_person"]').addClass('d-none');
            $('[name="jabatan"]').addClass('d-none');
            $('[name="no_telp"]').addClass('d-none');
            $('[name="relasi"]').addClass('d-none');
        });
    }
</script>