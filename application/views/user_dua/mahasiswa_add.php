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
        <form id="Modal" name="form" action="<?= base_url('User_dua/mahasiswa_add_aksi') ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Nim</label>
                    <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= set_value('nim') ?>">
                    <?= form_error('nim', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-5">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" class="form-control" placeholder="Nama Mahasiswa" value="<?= set_value('nama_mhs') ?>">
                    <?= form_error('nama_mhs', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Kelas" onchange="return getKelas()" value="<?= set_value('id_kelas') ?>">
                        <option value="">--PILIH--</option>
                        <?php foreach ($kelas as $p) { ?>
                            <option value="<?= $p->id_kelas ?>"><?= $p->kelas ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('kelas', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <span id="data-prodi"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Status Keuangan</label>
                    <input type="text" name="status_keuangan" class="form-control" placeholder="Status Keuangan" value="<?= set_value('status_keuangan') ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>IPK</label>
                    <input type="decimal" name="ipk" class="form-control" placeholder="IPK" value="<?= set_value('ipk') ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Status Sidang</label>
                    <input type="text" name="status_sidang" class="form-control" placeholder="Status Sidang" value="<?= set_value('status_sidang') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Pembimbing Akademik</label>
                    <input type="text" name="pa" class="form-control" placeholder="Tahun Akademik" value="<?= set_value('pa') ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Request Penempatan</label>
                    <input type="text" name="request_penempatan" class="form-control" placeholder="Request Penempatan" value="<?= set_value('request_penempatan') ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Jenis Kelamin" value="<?= set_value('jk') ?>" required>
                        <option value="">Pilih</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir') ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lahir') ?>">
                </div>
                <div class="form-group col-md-1">
                    <label>Usia</label>
                    <input type="number" name="usia" class="form-control" placeholder="Usia" value="<?= set_value('usia') ?>">
                </div>
                <div class="form-group col-md-5">
                    <label>Kampung/Dusun</label>
                    <input type="text" name="dusun" class="form-control" placeholder="Kampung/Dusun" value="<?= set_value('dusun') ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Desa/Kelurahan</label>
                    <input type="text" name="desa" class="form-control" placeholder="Desa/Kelurahan" value="<?= set_value('desa') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= set_value('kecamatan') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Kota/Kabupaten</label>
                    <input type="text" name="kotkab" class="form-control" placeholder="Kota/Kabupaten" value="<?= set_value('kotkab') ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="No HP" value="<?= set_value('no_hp') ?>">
                    <?= form_error('no_hp', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Nama Orang Tua</label>
                    <input type="text" name="nama_ortu" class="form-control" placeholder="Nama Orang Tua" value="<?= set_value('nama_ortu') ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Pekerjaan Orang Tua</label>
                    <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan Orang Tua" value="<?= set_value('pekerjaan') ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>No HP Orang Tua</label>
                    <input type="text" name="no_hp_ortu" class="form-control" placeholder="No HP Orang Tua" value="<?= set_value('no_hp_ortu') ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Uji Kompetensi 1</label>
                    <input type="text" name="uk1" class="form-control" placeholder="Uji Kompetensi 1" value="<?= set_value('uk1') ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Uji Kompetensi 2</label>
                    <input type="text" name="uk2" class="form-control" placeholder="Uji Kompetensi 2" value="<?= set_value('uk2') ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Uji Kompetensi 3</label>
                    <input type="text" name="uk3" class="form-control" placeholder="Uji Kompetensi 3" value="<?= set_value('uk3') ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Uji Kompetensi 4</label>
                    <input type="text" name="uk4" class="form-control" placeholder="Uji Kompetensi 4" value="<?= set_value('uk4') ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah" value="<?= set_value('asal_sekolah') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?= set_value('jurusan') ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Tahun Angkatan</label>
                    <input type="text" name="tahun_akademik" class="form-control" placeholder="Tahun Angkatan" value="<?= set_value('tahun_akademik') ?>">
                    <?= form_error('tahun_akademik', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label>Tahun Lulus</label>
                    <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value="<?= set_value('tahun_lulus') ?>">
                </div>
            </div>
            <div class="row" hidden>
                <div class="form-group col-md-2">
                    <label>IPK 1</label>
                    <input type="decimal" name="ipk1" class="form-control" placeholder="IPK 1">
                </div>
                <div class="form-group col-md-2">
                    <label>IPK 2</label>
                    <input type="decimal" name="ipk2" class="form-control" placeholder="IPK 2">
                </div>
                <div class="form-group col-md-2">
                    <label>IPK 3</label>
                    <input type="decimal" name="ipk3" class="form-control" placeholder="IPK 3">
                </div>
                <div class="form-group col-md-2">
                    <label>IPK 4</label>
                    <input type="decimal" name="ipk4" class="form-control" placeholder="IPK 4">
                </div>
                <div class="form-group col-md-2">
                    <label>IPK 5</label>
                    <input type="decimal" name="ipk5" class="form-control" placeholder="IPK 5">
                </div>
                <div class="form-group col-md-2">
                    <label>IPK 6</label>
                    <input type="decimal" name="ipk6" class="form-control" placeholder="IPK 6">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" onclick="return sembunyikan()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#bk").hide();
        $("#bi").hide();
        $("#status").change(function() {
            var _this = $(this);
            if (_this.val() == 'Kerja') {
                $("#bk").show();
                $("#bi").hide();
            } else if (_this.val() == 'Wirausaha') {
                $("#bi").show();
                $("#bk").hide();
            } else if (_this.val() == 'KKI') {
                $("#bk").show();
                $("#bi").hide();
            } else {
                $("#bk").hide();
                $("#bi").hide();
            }
        });

    });
</script>
<script>
    function getKota() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-kota').load("getKota?id_perusahaan=" + id, function() {
            //$('[name="kota"]').val(kota)
        });
    }

    function sembunyikan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-kota').load("getKota?id_perusahaan=" + id, function() {
            $('[name="kota"]').addClass('d-none');
        });
    }

    function getKelas() {
        var id = $('[name="id_kelas"]').val();
        $('#data-prodi').load("getKelas?id_kelas=" + id, function() {
            //$('[name="prodi"]').val(prodi);
        });
    }
</script>