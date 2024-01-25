<style>
    .btn-danger {
        background-color: #ED1C24;
    }
    .btn-primary {
        background-color: #0073BD;
    }

</style>
<div class="card card-primary">
    <?php
    foreach ($ht_permintaan as $ht) {
    ?>

    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Perusahaan</label>
                <input value="<?= $ht->nama_perusahaan ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Bidang</label>
                <input value="<?= $ht->bidang ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-1">
                <label>Relasi</label>
                <input value="<?= $ht->relasi ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Alamat</label>
                <input value="<?= $ht->alamat ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Kontak Person</label>
                <input value="<?= $ht->kontak_person ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>No HP/Telepon</label>
                <input value="<?= $ht->no_telp ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Tanggal</label>
                <input value="<?= date('d/m/Y', strtotime($ht->waktu)) ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Waktu</label>
                <input value="<?= date('H:i', strtotime($ht->waktu)) ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Posisi yang dibutuhkan</label>
                <input value="<?= $ht->posisi_yang_dibutuhkan ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Jumlah Mahasiswa</label>
                <input value="<?= $ht->jml_mhs ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-12">
                <label>Kualifikasi</label>
                <textarea class="form-control"  disabled><?= $ht->kualifikasi ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Detail Mahasiswa</label>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kelas</th>
                    <th>Prodi</th>
                    <th>Hasil</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($dt as $dt) {
                $bg= "";
                if ( $dt->status == "Belum") {
                    $bg = "bg-secondary";
                }elseif($dt->status == "KKI"){
                    $bg = "bg-info";
                }elseif($dt->status == "Kerja"){
                    $bg = "bg-primary";
                }else{
                    $bg = "bg-danger";
                }

                $h = "";
                if ($dt->hasil == "Belum") {
                    $h = "bg-secondary";
                }elseif($dt->hasil == "Cancel") {
                    $h = "bg-danger";
                }elseif($dt->hasil == "Diterima KKI") {
                    $h = "bg-info";
                }elseif($dt->hasil == "Lolos Test") {
                    $h = "bg-primary";
                }elseif($dt->hasil == "Gagal Test") {
                    $h = "bg-danger";
                }elseif($dt->hasil == "Menolak") {
                    $h = "bg-danger";
                }else{
                    $h = "bg-danger";
                }
            ?>
                <tbody>
                    <tr>
                        <td><a href="<?= base_url('') ?>user_dua/update_dt?id_permintaan=<?= $dt->id_permintaan ?>&nim=<?= $dt->nim ?>"><?= $dt->nim ?></a></td>
                        <td><?= $dt->nama_mhs ?></td>
                        <td><?= $dt->kelas ?></td>
                        <td><?= $dt->prodi ?></td>
                        <td><span class="badge <?= $h ?>"><?= $dt->hasil ?></span></td>
                        <td><span class="badge <?= $bg ?>"><?= $dt->status ?></span></td>
                        <td><?= $dt->ket_lain ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    </div>
    <div class="card-footer">
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $ht->id_permintaan ?>`,`<?= $ht->nama_perusahaan ?>`)">
            <i class="fas fa-trash"></i><span style="color:#fff;"> Hapus</span>
        </a>
        <a class="btn btn-primary btn-sm" href="<?= base_url('') ?>user_dua/tambah_kandidat?id_permintaan=<?= $dt->id_permintaan ?>">
            <i class="fas fa-plus"></i> <span class="b">Tambah Kandidat</span>
        </a>
        <a onclick="return ubah(`<?= $ht->id_permintaan ?>`,`<?= $ht->id_perusahaan ?>`, `<?= $ht->bidang ?>`, `<?= $ht->relasi ?>`, `<?= $ht->alamat ?>`, `<?= $ht->kontak_person ?>`, `<?= $ht->jabatan ?>`, `<?= $ht->no_telp ?>`,`<?= $ht->posisi_yang_dibutuhkan ?>`, `<?= $ht->kualifikasi ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i><span class="b" style="color:#fff;"> Ubah</span>
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
                    <input type="hidden" name="id_permintaan">
                    <span id="modal-body-update-or-create">
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <select name="id_perusahaan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Perusahaan" onchange="return getPerusahaan()">
                                <option value="">--PILIH--</option>
                                <?php foreach ($perusahaan as $p) { ?>
                                    <option value="<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span id="data-perusahaan"></span>
                        <div class="form-group">
                            <label>Posisi yang dibutuhkan</label>
                            <input type="text" name="posisi_yang_dibutuhkan" class="form-control" placeholder="Posisi yang dibutuhkan">
                        </div>
                        <div class="form-group">
                            <label>Kualifikasi</label>
                            <textarea type="text" name="kualifikasi" class="form-control" placeholder="Kualifikasi"></textarea>
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


    function ubah(id_permintaan, nama_perusahaan, bidang, relasi, alamat, kontak_person, jabatan, no_telp, posisi_yang_dibutuhkan, kualifikasi) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Permintaan');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        // $('#modal-body-permintaan').addClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_permintaan"]').val(id_permintaan);
        $('[name="id_perusahaan"]').val(nama_perusahaan).trigger('change');
        $('[name="bidang"]').val(bidang);
        $('[name="relasi"]').val(relasi);
        $('[name="alamat"]').val(alamat);
        $('[name="kontak_person"]').val(kontak_person);
        $('[name="jabatan"]').val(jabatan);
        $('[name="no_telp"]').val(no_telp);
        $('[name="posisi_yang_dibutuhkan"]').val(posisi_yang_dibutuhkan);
        $('[name="kualifikasi"]').val(kualifikasi);
        document.form.action = '<?= base_url('User_dua/permintaan_update_aksi'); ?>';
    }

    function hapus(id_permintaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Permintaan');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_permintaan"]').val(id_permintaan);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('User_dua/permintaan_delete'); ?>';
    }
</script>