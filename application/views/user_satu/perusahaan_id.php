<style>
    .card-footer {
        color: #ffffff;
    }

    .btn-primary {
        background-color: #0073BD;
    }

    .btn-danger {
        background-color: #ED1C24;
    }
</style>

<div class="card card-primary">
    <?php
    foreach ($perusahaan as $p) {

        /* $id = $_GET['id_perusahaan'];
        $select = $this->db->where('perusahaan.id_perusahaan ', $id);
        $data['bukti_kerjasama'] = $this->Models->Get_All('perusahaan', $select);*/

    ?>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-3">
                <label>Perusahaan</label>
                <input value="<?= $p->nama_perusahaan ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Bidang</label>
                <input value="<?= $p->bidang ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Type Perusahaan</label>
                <input value="<?= $p->type_perusahaan ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-5">
                <label>Alamat</label>
                <input value="<?= $p->alamat ?>" class="form-control form-control-sm"  disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>Kontak Person</label>
                <input value="<?= $p->kontak_person ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Kota</label>
                <input value="<?= $p->kota ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2 ">
                <label>Jabatan</label>
                <input value="<?= $p->jabatan ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2 ">
                <label>No HP/Telepon</label>
                <input value="<?= $p->no_telp ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Tingkat</label>
                <input value="<?= $p->tingkat ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Email</label>
                <input value="<?= $p->email ?>" class="form-control form-control-sm"  disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>FAX</label>
                <input value="<?= $p->fax ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-1">
                <label>Kode Pos</label>
                <input value="<?= $p->kode_pos ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Tanggal Mulai</label>
                <input value="<?= $p->tanggal_mulai ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Tanggal Berakhir</label>
                <input value="<?= $p->tanggal_berakhir ?>" class="form-control form-control-sm"  disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
                <label>MOU</label>
                <input value="<?= $p->sudah_mou ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Sumber</label>
                <input value="<?= $p->sumber ?>" class="form-control form-control-sm"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Keterangan</label>
                <textarea value="<?= $p->ket ?>" class="form-control form-control-sm"  disabled></textarea>
            </div>
            <div class="form-group col-md-2">
                <label>Relasi</label>
                <input value="<?= $p->relasi ?>" class="form-control form-control-sm"  disabled>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <a onclick="return ubah(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`,`<?= $p->bidang ?>`,`<?= $p->type_perusahaan ?>`,`<?= $p->alamat ?>`,`<?= $p->kota ?>`,`<?= $p->email ?>`,`<?= $p->fax ?>`,`<?= $p->kode_pos ?>`,`<?= $p->tingkat ?>`,`<?= $p->kontak_person ?>`,`<?= $p->jabatan ?>`,`<?= $p->no_telp ?>`,`<?= $p->tanggal_mulai ?>`,`<?= $p->tanggal_berakhir ?>`,`<?= $p->sudah_mou ?>`,`<?= $p->sumber ?>`,`<?= $p->ket ?>`,`<?= $p->relasi ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Ubah
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
            <i class="fas fa-trash"></i> Hapus
        </a>
        <a class="btn btn-success btn-sm" href="<?= base_url('User_satu/perusahaan') ?>">
            <i class="fas fa-backward"></i> Kembali
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
                            <div class="form-group col-md-6">
                                <label>Perusahaan</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama_perusahaan" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Perusahaan">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Bidang</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="bidang" class="form-control form-control-sm" placeholder="Bidang" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Type Perusahaan</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="type_perusahaan" class="form-control form-control-sm" placeholder="Type Perusahaan" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="alamat" class="form-control form-control-sm" placeholder="Alamat">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Kota</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="kota" class="form-control form-control-sm" placeholder="Kota" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control form-control-sm" placeholder="Fax" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control form-control-sm" placeholder="Kode Pos" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tingkat</label>
                                <select name="tingkat" class="form-control form-control-sm select2 select2-primary" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Tingkat">
                                    <option value="">-Pilih-</option>
                                    <option value="Internasional">Internasional</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Lokal">Lokal</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Kontak Person</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="kontak_person" class="form-control form-control-sm" placeholder="Kontak Person" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Jabatan</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="jabatan" class="form-control form-control-sm" placeholder="Jabatan" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>No HP/Telp</label>
                                <input type="text" name="no_telp" class="form-control form-control-sm" placeholder="No HP/Telepon" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control form-control-sm" placeholder="Tanggal Mulai" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Berakhir</label>
                                <input type="date" name="tanggal_berakhir" class="form-control form-control-sm" placeholder="Tanggal Berakhir" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>MOU</label>
                                <select name="sudah_mou" class="form-control form-control-sm select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="MOU">
                                    <option value="" disabled selected hidden>MOU</option>
                                    <option value="Sudah">Sudah</option>
                                    <option value="Belum">Belum</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sumber</label>
                                <select name="sumber" class="form-control form-control-sm select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Sumber">
                                    <option value="">-Pilih-</option>
                                    <option value="Medsos">Medsos</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Keterangan</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="ket" class="form-control form-control-sm" placeholder="Keterangan" >
                            </div>
                            <div class="form-group col-md-2">
                                <label>Relasi</label>
                                <select name="relasi" class="form-control form-control-sm select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Relasi">
                                    <option value="">--PILIH--</option>
                                    <option value="Baru">BARU</option>
                                    <option value="Lama">LAMA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
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

<div class="card ca">
    <?php
    foreach ($perusahaan as $p) {
    ?>
        <div class="card-header">
            <h5 class="card-title">Follow Up Terbaru</h5>
        </div>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal Followup</th>
                    <th>Hasil Followup</th>
                    <th>Jumlah Hari</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            $no = 1;
            foreach ($belum_telleseling as $bt) {

                $tgl = $bt->tanggal_fu;

                $bg = "";
                if ($bt->jumlah_hari <= 30) {
                    $bg = "badge-warning";
                } else if ($t->jumlah_hari >= 30) {
                    $bg = "badge-danger";
                }

                $day = "";
                if ($bt->tanggal_penanda_fu == null) {
                    $day = $bt->jumlah_hari;
                } else if ($bt->tanggal_penanda_fu != null) {
                    $day = $bt->jumlah_hari_penanda_fu;
                }
            ?>
                <tbody>
                    <tr>
                        <td><?= $bt->tanggal_fu ?></td>
                        <td><?= $bt->hasil_fu ?></td>
                        <td class="text-center"><small class="badge <?= $bg ?>">+ <?= $day ?> Hari</small></td>
                    </tr>
                </tbody>
            <?php }
            ?>
        </table>

    </div>
</div>

<div class="card ca">
    <?php
    foreach ($perusahaan as $p) {
    ?>
        <div class="card-header">
            <h5 class="card-title">History Follow Up</h5>
        </div>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal Followup</th>
                    <th>Hasil Followup</th>
                    <th>Jumlah Hari</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            $no = 1;
            foreach ($sudah_telleseling as $t) {

                $tgl = $t->tanggal_fu;

                $bg = "";
                if ($t->jumlah_hari <= 30) {
                    $bg = "badge-warning";
                } else if ($t->jumlah_hari >= 30) {
                    $bg = "badge-danger";
                }

                $day = "";
                if ($t->tanggal_penanda_fu == null) {
                    $day = $t->jumlah_hari;
                } else if ($t->tanggal_penanda_fu != null) {
                    $day = $t->jumlah_hari_penanda_fu;
                }
            ?>
                <tbody>
                    <tr>
                        <td><?= $t->tanggal_fu ?></td>
                        <td><?= $t->hasil_fu ?></td>
                        <td class="text-center"><small class="badge <?= $bg ?>">+ <?= $day ?> Hari</small></td>
                    </tr>
                </tbody>
            <?php }
            ?>
        </table>

    </div>
    <div class="card-footer">
    </div>
</div>


<script>
    function ubah(id_perusahaan, nama_perusahaan, bidang, type_perusahaan, alamat, kota, email, fax, kode_pos, tingkat, kontak_person, jabatan, no_telp, tanggal_mulai, tanggal_berakhir, sudah_mou,sumber, ket, relasi) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Perusahaan');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('[name="nama_perusahaan"]').val(nama_perusahaan);
        $('[name="bidang"]').val(bidang);
        $('[name="type_perusahaan"]').val(type_perusahaan);
        $('[name="alamat"]').val(alamat);
        $('[name="kota"]').val(kota);
        $('[name="email"]').val(email);
        $('[name="fax"]').val(fax);
        $('[name="kode_pos"]').val(kode_pos);
        $('[name="tingkat"]').val(tingkat).trigger('change');
        $('[name="kontak_person"]').val(kontak_person);
        $('[name="jabatan"]').val(jabatan);
        $('[name="no_telp"]').val(no_telp);
        $('[name="tanggal_mulai"]').val(tanggal_mulai);
        $('[name="tanggal_berakhir"]').val(tanggal_berakhir);
        $('[name="sudah_mou"]').val(sudah_mou).trigger('change');
        $('[name="sumber"]').val(sumber).trigger('change');
        $('[name="ket"]').val(ket);
        $('[name="relasi"]').val(relasi).trigger('change');
        document.form.action = '<?= base_url('User_satu/perusahaan_update_aksi'); ?>';
    }

    function hapus(id_perusahaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Perusahaan');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('User_satu/perusahaan_delete'); ?>';
    }
</script>