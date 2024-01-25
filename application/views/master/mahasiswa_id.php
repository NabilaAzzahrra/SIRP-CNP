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
    foreach ($mahasiswa as $m) {
    ?>
    <?php } ?>
    <!-- /.card-header -->
</div>

<div class="card">
    <div class="card-header">
        <a onclick="return ubah(
            `<?= $m->nim ?>`,
            `<?= $m->nama_mhs ?>`,
            `<?= $m->id_kelas ?>`,
            `<?= $m->prodi ?>`,
            `<?= $m->status_keuangan ?>`,
            `<?= $m->ipk ?>`,
            `<?= $m->status_sidang ?>`, 
            `<?= $m->pa ?>`, 
            `<?= $m->request_penempatan ?>`,
            `<?= $m->jk ?>`, 
            `<?= $m->tempat_lahir ?>`, 
            `<?= $m->tgl_lahir ?>`, 
            `<?= $m->usia ?>`, 
            `<?= $m->dusun ?>`, 
            `<?= $m->desa ?>`,
            `<?= $m->kecamatan ?>`, 
            `<?= $m->kotkab ?>`, 
            `<?= $m->no_hp ?>`,
            `<?= $m->nama_ortu ?>`,
            `<?= $m->pekerjaan ?>`,
            `<?= $m->no_hp_ortu ?>`,
            `<?= $m->uk1 ?>`,
            `<?= $m->uk2 ?>`,
            `<?= $m->uk3 ?>`,
            `<?= $m->uk4 ?>`,
            `<?= $m->asal_sekolah ?>`,
            `<?= $m->jurusan ?>`,
            `<?= $m->status_penempatan ?>`,
            `<?= $m->status_detail ?>`,
            `<?= $m->ket_penempatan ?>`,
            `<?= $m->ket_detail ?>`, 
            `<?= $m->tahun_akademik ?>`,
            `<?= $m->tahun_lulus ?>`,
            `<?= $m->gaji ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> <span class="b">Ubah</span>
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $m->nim ?>`,`<?= $m->nama_mhs ?>`)">
            <i class="fas fa-trash"></i> <span class="b">Hapus</span>
        </a>
        <a class="btn btn-success btn-sm" href="<?= base_url('') ?>Master/claporan_proses_penempatan_mahasiswa?nim=<?= $m->nim ?>" target="_blank">
            <i class="fas fa-print"></i> Preview Print
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Mahasiswa</th>
                    <th class="text-center">Prodi</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Status Keuangan</th>
                    <th class="text-center">IPK</th>
                    <th class="text-center">Status Sidang</th>
                    <th class="text-center">Pembimbing Akademik</th>
                    <th class="text-center">Request Penempatan</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Usia</th>
                    <th class="text-center">Kampung/Dusun</th>
                    <th class="text-center">Desa/Kelurahan</th>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center">Kota/Kabupaten</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Nama Ortu</th>
                    <th class="text-center">Pekerjaan</th>
                    <th class="text-center">No HP Orang Tua</th>
                    <th class="text-center">Uji Kometensi 1</th>
                    <th class="text-center">Uji Kometensi 2</th>
                    <th class="text-center">Uji Kometensi 3</th>
                    <th class="text-center">Uji Kometensi 4</th>
                    <th class="text-center">Asal Sekolah</th>
                    <th class="text-center">jurusan</th>
                    <th class="text-center">Status Penempatan</th>
                    <th class="text-center">Keterangan Penempatan</th>
                    <th class="text-center">Tahun Angkatan</th>
                    <th class="text-center">Gaji</th>
                    <th class="text-center">Tahun lulus</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                foreach ($mahasiswa as $m) {

                ?>
                    <tr>
                        <td><?= $m->nim ?></a></td>
                        <td><?= $m->nama_mhs ?></td>
                        <td><?= $m->prodi ?></td>
                        <td><?= $m->kelas ?></td>
                        <td><?= $m->status_keuangan ?></td>
                        <td><?= $m->ipk ?></td>
                        <td><?= $m->status_sidang ?></td>
                        <td><?= $m->pa ?></td>
                        <td><?= $m->request_penempatan ?></td>
                        <td><?= $m->jk ?></td>
                        <td><?= $m->tempat_lahir ?></td>
                        <td><?= $m->tgl_lahir ?></td>
                        <td><?= $m->usia ?></td>
                        <td><?= $m->dusun ?></td>
                        <td><?= $m->desa ?></td>
                        <td><?= $m->kecamatan ?></td>
                        <td><?= $m->kotkab ?></td>
                        <td><?= $m->no_hp ?></td>
                        <td><?= $m->nama_ortu ?></td>
                        <td><?= $m->pekerjaan ?></td>
                        <td><?= $m->no_hp_ortu ?></td>
                        <td><?= $m->uk1 ?></td>
                        <td><?= $m->uk2 ?></td>
                        <td><?= $m->uk3 ?></td>
                        <td><?= $m->uk4 ?></td>
                        <td><?= $m->asal_sekolah ?></td>
                        <td><?= $m->jurusan ?></td>
                        <td><?= $m->status_detail ?></td>
                        <td><?= $m->ket_detail ?></td>
                        <td class="text-center"><?= $m->tahun_akademik ?></td>
                        <td><?= $m->gaji ?></td>
                        <td><?= $m->tahun_lulus ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>


<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nim">
                    <span id="modal-body-update-or-create">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Nim</label>
                                <input type="text" name="nim" class="form-control" placeholder="NIM" readonly>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="nama_mhs" class="form-control" placeholder="Nama Mahasiswa">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Kelas" onchange="return getKelas()">
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
                            <div class="form-group col-md-4">
                                <label>Status Keuangan</label>
                                <input type="text" name="status_keuangan" class="form-control" placeholder="Status Keuangan">
                            </div>
                            <div class="form-group col-md-2">
                                <label>IPK</label>
                                <input type="decimal" name="ipk" class="form-control" placeholder="IPK">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Status Sidang</label>
                                <input type="text" name="status_sidang" class="form-control" placeholder="Status Sidang">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Pembimbing Akademik</label>
                                <input type="text" name="pa" class="form-control" placeholder="Pembimbing Akademik">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Request Penempatan</label>
                                <input type="text" name="request_penempatan" class="form-control" placeholder="Request Penempatan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Jenis Kelamin</label>
                                <input type="text" name="jk" class="form-control" placeholder="Jenis Kelamin">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Tempat Lahir</label>
                                <input type="text" onkeyup="this.value = this.value.toUpperCase()" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group col-md-1">
                                <label>Usia</label>
                                <input type="number" name="usia" class="form-control" placeholder="Usia">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Kampung/Dusun</label>
                                <input type="text" name="dusun" class="form-control" placeholder="Kampung/Dusun">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Desa/Kelurahan</label>
                                <input type="text" name="desa" class="form-control" placeholder="Desa/Kelurahan">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kota/Kabupaten</label>
                                <input type="text" name="kotkab" class="form-control" placeholder="Kota/Kabupaten">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="No HP">
                                <?= form_error('no_hp', '<div class="test-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Nama Orang Tua</label>
                                <input type="text" name="nama_ortu" class="form-control" placeholder="Nama Orang Tua">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                            </div>
                            <div class="form-group col-md-3">
                                <label>No HP Orang Tua</label>
                                <input type="text" name="no_hp_orang_tua" class="form-control" placeholder="No HP Orang Tua">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Uji Kompetensi 1</label>
                                <input type="text" name="uk1" class="form-control" placeholder="Uji Kompetensi 1">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Uji Kompetensi 2</label>
                                <input type="text" name="uk2" class="form-control" placeholder="Uji Kompetensi 2">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Uji Kompetensi 3</label>
                                <input type="text" name="uk3" class="form-control" placeholder="Uji Kompetensi 3">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Uji Kompetensi 4</label>
                                <input type="text" name="uk4" class="form-control" placeholder="Uji Kompetensi 4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Verifikasi Penempatan</label>
                                <select id="ver" name="status_penempatan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Status Penempatan">
                                    <option value="Belum">Belum</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Kerja">Kerja</option>
                                    <option value="Gugur">Gugur</option>
                                    <option value="Bermasalah">Bermasalah</option>
                                    <option value="Bermasalah">Berwirausaha</option>
                                </select>
                            </div>
                            <div id="magang" class="form-group col-md-4">
                                <label>Magang Berdasar</label>
                                <select name="status_detail" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Magang">
                                    <option value="OJT">OJT</option>
                                    <option value="KKI">KKI</option>
                                    <option value="MSIB">MSIB</option>
                                    <option value="PMMB">PMMB</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Keterangan verifikasi</label>
                                <select id="lainnya" name="ket_penempatan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Keterangan Penempatan">
                                    <option value="CNP">CNP</option>
                                    <option value="Sendiri">Sendiri</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div id="lain" class="form-group col-md-12">
                                <label>Keterangan</label>
                                <input type="text" name="ket_detail" class="form-control" placeholder="Keterangan" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Tahun Angkatan</label>
                                <input type="number" name="tahun_akademik" class="form-control" placeholder="Tahun Akademik">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Gaji</label>
                                <input type="text" name="gaji" class="form-control" placeholder="Gaji">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus">
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><b>Proses Penempatan Magang/Kerja</b></h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Perusahaan</th>
                                    <th class="text-center">Tanggal Proses/Hasil</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Hasil</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($history as $h) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $h->nama_perusahaan ?></td>
                                        <td><?= $h->tgl_hasil ?></td>
                                        <td><?= $h->posisi_yang_dibutuhkan ?></td>
                                        <td><?= $h->status ?></td>
                                        <td><?= $h->hasil ?></td>
                                        <td><?= $h->ket_lain ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><b>Usaha Mahasiswa</b></h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Usaha</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Tanggal Mulai</th>
                                    <th class="text-center">Omset</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($usaha as $h) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $h->nama_usaha ?></td>
                                        <td><?= $h->alamat_usaha ?></td>
                                        <td><?= $h->tanggal_mulai ?></td>
                                        <td><?= $h->omset ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


<script>
    function ubah(nim, nama_mhs, kelas, prodi, status_keuangan, ipk, status_sidang, pa, request_penempatan, jk, tempat_lahir, tgl_lahir, usia, dusun, desa, kecamatan, kotkab, no_hp, nama_ortu, pekerjaan, no_hp_ortu, uk1, uk2, uk3, uk4, asal_sekolah, jurusan, status_penempatan, status_detail, ket_penempatan,ket_detail, tahun_akademik, tahun_lulus,gaji) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Mahasiswa');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="nim"]').val(nim);
        $('[name="nama_mhs"]').val(nama_mhs);
        $('[name="id_kelas"]').val(kelas).trigger('change');
        $('[name="prodi"]').val(status_keuangan);
        $('[name="status_keuangan"]').val(status_keuangan);
        $('[name="ipk"]').val(ipk);
        $('[name="status_sidang"]').val(status_sidang);
        $('[name="pa"]').val(pa);
        $('[name="request_penempatan"]').val(request_penempatan);
        $('[name="jk"]').val(jk);
        $('[name="tempat_lahir"]').val(tempat_lahir);
        $('[name="tgl_lahir"]').val(tgl_lahir);
        $('[name="usia"]').val(usia);
        $('[name="dusun"]').val(dusun);
        $('[name="desa"]').val(desa);
        $('[name="kecamatan"]').val(kecamatan);
        $('[name="kotkab"]').val(kotkab);
        $('[name="no_hp"]').val(no_hp);
        $('[name="nama_ortu"]').val(nama_ortu);
        $('[name="pekerjaan"]').val(pekerjaan);
        $('[name="no_hp_ortu"]').val(no_hp_ortu);
        $('[name="uk1"]').val(uk1);
        $('[name="uk2"]').val(uk2);
        $('[name="uk3"]').val(uk3);
        $('[name="uk4"]').val(uk4);
        $('[name="asal_sekolah"]').val(asal_sekolah);
        $('[name="jurusan"]').val(jurusan);
        $('[name="status_penempatan"]').val(status_penempatan).trigger('change');
        $('[name="status_detail"]').val(status_detail).trigger('change');
        $('[name="ket_penempatan"]').val(ket_penempatan).trigger('change');
        $('[name="ket_detail"]').val(ket_detail);
        $('[name="tahun_akademik"]').val(tahun_akademik);
        $('[name="tahun_lulus"]').val(tahun_lulus);
        $('[name="gaji"]').val(gaji);
        document.form.action = '<?= base_url('Master/mahasiswa_update_aksi'); ?>';
    }

    function hapus(nim, nama_mhs) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Mahasiswa');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="nim"]').val(nim);
        $('#name-delete').html(nama_mhs);
        document.form.action = '<?= base_url('Master/mahasiswa_delete'); ?>';
    }

    function getKelas() {
        var id = $('[name="id_kelas"]').val();
        $('#data-prodi').load("getKelas?id_kelas=" + id, function() {
            //$('[name="prodi"]').val(prodi);
        });
    }
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
</script>
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

<!--STATUS DETAIL-->
<script>
    $(document).ready(function() {
        $("#magang").hide();
        $("#ver").change(function() {
            var _this = $(this);
            if (_this.val() == 'Magang') {
                $("#magang").show();
            } else if (_this.val() != 'Magang') {
                $("#magang").hide();
            }
        });

    });
</script>
<!----------------->

<script>
    /*$(document).ready(function() {
        $("#a").hide();
        $("#k").hide();
        $("#kt").val(function() {
            var ket_mhs = $(this);
            if (ket_mhs.val() == 'Aktif') {
                $("#a").show();
                $("#k").show();
            } else if (ket_mhs.val() == 'Tidak Melanjutkan') {
                $("#a").hide();
                $("#k").show();
            } else if (ket_mhs.val() == 'Drop Out') {
                $("#a").hide();
                $("#k").show();
            }
        });
    });*/
</script>
<script>
    $(document).ready(function() {
        $("#lain").hide();
        $("#lainnya").change(function() {
            var _this = $(this);
            if (_this.val() == 'CNP') {
                $("#lain").hide();
            } else if (_this.val() == 'Sendiri') {
                $("#lain").hide();
            } else if (_this.val() == 'Lainnya') {
                $("#lain").show();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#kerja").hide();
        $("#usaha").hide();
        $("#sts").val(function() {
            var status = $(this);
            if (status.val() == 'Kerja') {
                $("#kerja").show();
                $("#usaha").hide();
                status.val(Kerja);
            } else if (status.val() == 'KKI') {
                $("#usaha").hide();
                $("#kerja").show();
                status.val(KKI);
            } else if (status.val() == 'Bermasalah') {
                $("#kerja").hide();
                $("#usaha").hide();
                status.val(Bermasalah);
            } else if (status.val() == 'Belum') {
                $("#kerja").hide();
                $("#usaha").hide();
                status.val(Belum);
            }
        });
    });
</script>