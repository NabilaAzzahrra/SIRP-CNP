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
        <form id="Modal" name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php foreach ($ht_permintaan as $ht) { ?>
                <div class="form-group">
                    <label>Id Permintaan</label>
                    <input value="<?= $ht->id_permintaan ?>" class="form-control" maxlength="50" disabled>
                </div>

                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <select name="nim" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Mahasiswa" onchange="return getMahasiswa()">
                        <option value="">--PILIH--</option>
                        <?php foreach ($mahasiswa as $m) { ?>
                            <option value="<?= $m->nim ?>"><?= $m->nama_mhs ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('Nama Mahasiswa', '<div class="test-small text-danger">', '</div>'); ?>
                </div>
                <span id="data-mahasiswa"></span>
                <div class="form-group" hidden>
                    <label>Qty</label>
                    <input type="number" name="qty" class="form-control" placeholder="Qty" value="1">
                </div>
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">Prodi</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Asal Sekolah</th>
                                <th class="text-center">Tahun Akademik</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="keranjang"></tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="return simpan()"><i class="fas fa-plus"></i></button>
                <button type="submit" class="btn btn-primary btn-sm" onclick="return tambah()"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm" onclick="return ilang()"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </div>
</div>

<script>
    function getPerusahaan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-perusahaan').load("getPerusahaan?id_perusahaan=" + id, function() {});
    }

    function getMahasiswa() {
        var nim = $('[name="nim"]').val();
        $('#data-mahasiswa').load("getMahasiswa?nim=" + nim, function() {
            $('[name="nim"]').val(nim)
        });
    }


    function simpan() {
        var id = $('[name="nim"]').val();
        var qty = $('[name="qty"]').val();
        $('#keranjang').load("AddCart/" + id + "/" + qty);
        $('[name="nim"]').val('');
        $('[name="kelas"]').val('');
        $('[name="prodi"]').val('');
        $('[name="asal_sekolah"]').val('');
    }

    function batalan(row_id) {
        $('#keranjang').load("DeleteCart/" + row_id);
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

    function ilang() {
        var id = $('[name="nim"]').val();
        $('#data-mahasiswa').load("getMahasiswa?id_perusahaan=" + id, function() {
            $('[name="alamat"]').addClass('d-none');
            $('[name="bidang"]').addClass('d-none');
            $('[name="kontak_person"]').addClass('d-none');
            $('[name="jabatan"]').addClass('d-none');
            $('[name="no_telp"]').addClass('d-none');
            $('[name="relasi"]').addClass('d-none');
        });

    }

    function tambah(id_permintaan) {
        $('[name="id_permintaan"]').val(id_permintaan);
        // $('[name="id_supplier"]').val(null).trigger('change');
        // $('[name="id_stok"]').val(null).trigger('change');
        $('[name="qty"]').val("");
        $('#keranjang').load("ShowCart");
        $("[name='form']").removeAttr('action');
        $("[name='form']").attr('action', '<?= base_url(''); ?>Master/SaveKandidat?id_permintaan=<?= $ht->id_permintaan ?>');
    }
</script>
<?php } ?>