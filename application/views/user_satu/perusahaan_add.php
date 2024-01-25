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
        <form name="form" action="<?= base_url('User_satu/perusahaan_add_aksi') ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Nama Perusahaan</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan"  value="<?= set_value('nama_perusahaan') ?>">
                    <?= form_error('nama_perusahaan', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Bidang</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="bidang" class="form-control" placeholder="Bidang"  value="<?= set_value('bidang') ?>">
                    <?= form_error('bidang', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Type Perusahaan</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="type_perusahaan" class="form-control" placeholder="Type Perusahaan"  value="<?= set_value('type_perusahaan') ?>">
                    <?= form_error('type_perusahaan', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-7">
                    <label>Alamat</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="alamat" class="form-control" placeholder="Alamat"  value="<?= set_value('alamat') ?>">
                    <?= form_error('alamat', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Kota</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="kota" class="form-control" placeholder="Kota"  value="<?= set_value('kota') ?>">
                    <?= form_error('kota', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-5">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email"  value="<?= set_value('email') ?>">
                    <?= form_error('email', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Fax</label>
                    <input type="text" name="fax" class="form-control" placeholder="Fax"  value="<?= set_value('fax') ?>">
                    <?= form_error('fax', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-1">
                    <label>Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos"  value="<?= set_value('kode_pos') ?>">
                    <?= form_error('kode_pos', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Tingkat</label>
                    <select name="tingkat" class="form-control" value="<?= set_value('tingkat') ?>">
                        <option value="" disabled selected hidden>Tingkat</option>
                        <option value="Internasional">Internasional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Lokal">Lokal</option>
                    </select>
                    <?= form_error('tingkat', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Kontak Person</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="kontak_person" class="form-control" placeholder="Kontak Person"  value="<?= set_value('kontak_person') ?>">
                    <?= form_error('kontak_person', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Jabatan</label>
                    <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="jabatan" class="form-control" placeholder="Jabatan"  value="<?= set_value('jabatan') ?>">
                    <?= form_error('jabatan', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>No HP/Telepon</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="No HP/Telepon"  value="<?= set_value('no_telp') ?>">
                    <?= form_error('no_telp', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Relasi</label>
                    <select name="relasi" class="form-control" value="<?= set_value('relasi') ?>">
                        <option value="" disabled selected hidden>Relasi</option>
                        <option value="Baru">BARU</option>
                        <option value="Lama">LAMA</option>
                    </select>
                    <?= form_error('sumber', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>MOU</label>
                    <select id="mou" name="sudah_mou" class="form-control" value="<?= set_value('sudah_mou') ?>">
                        <option value="" disabled selected hidden>MOU</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>
                    <?= form_error('sudah_mou', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="row" id="sd">
                <div class="form-group col-md-2" id="tm">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai"  value="<?= set_value('tanggal_mulai') ?>">
                </div>
                <div class="form-group col-md-2" id="tb">
                    <label>Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" class="form-control" placeholder="Tanggal Berakhir"  value="<?= set_value('tanggal_berakhir') ?>">
                </div>

                <div class="form-group col-md-2">
                    <label>Sumber</label>
                    <select name="sumber" class="form-control" value="<?= set_value('sumber') ?>">
                        <option value="" disabled selected hidden>Sumber</option>
                        <option value="Medsos">Medsos</option>
                        <option value="Alumni">Alumni</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <?= form_error('sumber', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Keterangan</label>
                    <textarea onkeyup="this.value = this.value.toUpperCase()" type="text" name="ket" class="form-control" placeholder="Keterangan"  value="<?= set_value('ket') ?>"></textarea>
                    <?= form_error('ket', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#tm").hide();
        $("#dr").hide();
        $("#tb").hide();
        $("#sd").hide();
        $("#mou").change(function() {
            var _this = $(this);
            if (_this.val() == 'Belum') {
                $("#tm").hide();
                $("#dr").hide();
                $("#tb").hide();
                $("#sd").hide();
            } else {
                $("#tm").show();
                $("#dr").show();
                $("#tb").show();
                $("#sd").show();
            }
        });
    });
</script>