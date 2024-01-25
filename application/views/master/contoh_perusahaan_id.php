<div class="card">
    <?php
    foreach ($perusahaan as $p) {
    ?>
        <div class="card-header">
            <h5 text-sm><?= $p->nama_perusahaan ?></h5>
        </div>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Perusahaan</label>
                <input value="<?= $p->nama_perusahaan ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Bidang</label>
                <input value="<?= $p->bidang ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Alamat</label>
                <input value="<?= $p->alamat ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Tingkat</label>
                <input value="<?= $p->tingkat ?>" class="form-control" maxlength="50" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>Kontak Person</label>
                <input value="<?= $p->kontak_person ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-2 ">
                <label>Jabatan</label>
                <input value="<?= $p->jabatan ?>" class="form-control" maxlength="50" disabled>
            </div>

            <div class="form-group col-md-4">
                <label>Judul Kegiatan Kerjasama</label>
                <input value="<?= $p->judul_kegiatan ?>" class="form-control" maxlength="50" disabled>
            </div>

            <div class="form-group col-md-4">
                <label>Manfaat bagi PS yang diakreditasi</label>
                <input value="<?= $p->manfaat ?>" class="form-control" maxlength="50" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Tanggal Mulai</label>
                <input value="<?= $p->tanggal_mulai ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Durasi</label>
                <input value="<?= $p->durasi ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Tanggal Berakhir</label>
                <input value="<?= $p->tanggal_berakhir ?>" class="form-control" maxlength="50" disabled>
            </div>
        </div>
        <div class="form-group col-md-14">
            <label>Bukti Kerjasama</label>
            <input value="<?= $p->bukti_kerjasama ?>" class="form-control" maxlength="50" disabled>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label>No MOU</label>
                <input value="<?= $p->no_mou ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>Sumber</label>
                <input value="<?= $p->sumber ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>Keterangan</label>
                <input value="<?= $p->ket ?>" class="form-control" maxlength="50" disabled>
            </div>
            <div class="form-group col-md-3">
                <label>Relasi</label>
                <input value="<?= $p->relasi ?>" class="form-control" maxlength="50" disabled>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a onclick="return ubah(`<?= $p->id_perusahaan ?>`, `<?= $p->nama_perusahaan ?>`, `<?= $p->bidang ?>`, `<?= $p->alamat ?>`, `<?= $p->kontak_person ?>`, `<?= $p->jabatan ?>`, `<?= $p->no_telp ?>`, `<?= $p->tingkat ?>`, `<?= $p->judul_kegiatan ?>`, `<?= $p->manfaat ?>`, `<?= $p->tanggal_mulai ?>`, `<?= $p->durasi ?>`, `<?= $p->tanggal_berakhir ?>`, `<?= $p->sumber ?>`, `<?= $p->bukti_kerjasama ?>`, `<?= $p->no_mou ?>`, `<?= $p->ket ?>`, `<?= $p->relasi ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Ubah
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
            <i class="fas fa-trash"></i> Hapus
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
                    <input type="hidden" name="id_perusahaan">
                    <span id="modal-body-update-or-create">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Perusahaan" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Bidang</label>
                                <select name="bidang" class="form-control select2 select2-primary" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Bidang">
                                    <option value="">-Pilih-</option>
                                    <option value="Teknologi">Teknologi</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alamat</label>
                                <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" maxlength="50"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Kontak Person</label>
                                <input type="text" name="kontak_person" class="form-control" placeholder="Kontak Person" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>No HP/Telp</label>
                                <input type="text" name="no_telp" class="form-control" placeholder="No HP/Telepon" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tingkat</label>
                                <select name="tingkat" class="form-control select2 select2-primary" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Tingkat">
                                    <option value="">-Pilih-</option>
                                    <option value="Internasional">Internasional</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Lokal">Lokal</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Judul Kegiatan Kerjasama</label>
                                <input type="text" name="judul_kegiatan" class="form-control" placeholder="Judul Kegiatan Kerjasama" maxlength="50">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Manfaat bagi PS yang diakreditasi</label>
                                <input type="text" name="manfaat" class="form-control" placeholder="Manfaat bagi PS yang diakreditasi" maxlength="50">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Durasi</label>
                                <input type="text" name="durasi" class="form-control" placeholder="Durasi" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Berakhir</label>
                                <input type="date" name="tanggal_berakhir" class="form-control" placeholder="Tanggal Berakhir" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sumber</label>
                                <select name="sumber" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Sumber">
                                    <option value="">-Pilih-</option>
                                    <option value="Medsos">Medsos</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label>Bukti Kerja Sama</label>
                                <input type="file" name="bukti_kerjasama" multiple="multiple" class="form-control" placeholder="Bukti Kerjasama" maxlength="50">
                            </div>
                            <div class="form-group col-md-4">
                                <label>No MOU</label>
                                <input type="text" name="no_mou" class="form-control" placeholder="No MOU" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Keterangan</label>
                                <select name="ket" class="form-control select2 select2-primary" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Keterangan">
                                    <option value="">-Pilih-</option>
                                    <option value="Medsos">Baru</option>
                                    <option value="Alumni">Lainnya</option>
                                </select>
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

    function ubah(id_perusahaan, nama_perusahaan, bidang, alamat, kontak_person, jabatan, no_telp,tingkat, judul_kegiatan, manfaat, tanggal_mulai, durasi, tanggal_berakhir, bukti_kerjasama, no_mou, sumber, ket, relasi) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Perusahaan');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('[name="nama_perusahaan"]').val(nama_perusahaan);
        $('[name="bidang"]').val(bidang);
        $('[name="alamat"]').val(alamat);
        $('[name="kontak_person"]').val(kontak_person);
        $('[name="jabatan"]').val(jabatan);
        $('[name="no_telp"]').val(no_telp);
        $('[name="tingkat"]').val(tingkat);
        $('[name="judul_kegiatan"]').val(judul_kegiatan);
        $('[name="manfaat"]').val(manfaat);
        $('[name="tanggal_mulai"]').val(tanggal_mulai);
        $('[name="durasi"]').val(durasi);
        $('[name="tanggal_berakhir"]').val(tanggal_berakhir);
        $('[name="bukti_kerjasama"]').val(bukti_kerjasama);
        $('[name="no_mou"]').val(no_mou);
        $('[name="sumber"]').val(sumber);
        $('[name="ket"]').val(ket);
        $('[name="relasi"]').val(relasi);
        document.form.action = '<?= base_url('Master/perusahaan_update_aksi'); ?>';
    }

    function hapus(id_perusahaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Mahasiswa');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('Master/perusahaan_delete'); ?>';
    }
</script>