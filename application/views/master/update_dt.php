<style>
    .card-header{
        background-color: #0073BD;
    }
    .btn-primary{
        background-color: #0073BD;
    }
    .btn-danger{
        background-color: #ED1C24;
    }
    span{
        color: #000;
    }
</style>

<div class="card">
    <?php
    foreach ($dt_permintaan as $dm) {

    ?>
    <?php } ?>

    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-2">
                <label>ID</label>
                <input value="<?= $dm->id_permintaan ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-md-2">
                <label>NIM</label>
                <input value="<?= $dm->nim ?>" class="form-control" readonly >
            </div>
            <div class="form-group col-md-4">
                <label>Nama Mahasiswa</label>
                <input value="<?= $dm->nama_mhs ?>" class="form-control" readonly >
            </div>
            <div class="form-group col-md-4">
                <label>Prodi</label>
                <input value="<?= $dm->prodi ?>" class="form-control" readonly >
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
                <label>Kelas</label>
                <input value="<?= $dm->kelas ?>" class="form-control" readonly >
            </div>
            <div class="form-group col-md-3">
                <label>Asal Sekolah</label>
                <input value="<?= $dm->asal_sekolah ?>" class="form-control" readonly >
            </div>
            <div class="form-group col-md-2">
                <label>Hasil</label>
                <input value="<?= $dm->hasil ?>" class="form-control" readonly >
            </div>
            <div class="form-group col-md-2">
                <label>Status</label>
                <input value="<?= $dm->status ?>" class="form-control" readonly >
            </div>
            <div id="ket_lain" class="form-group col-md-2">
                <label>Keterangan</label>
                <input value="<?= $dm->ket_lain ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-md-2">
                <label>Tanggal Proses</label>
                <input value="<?= $dm->tgl_hasil ?>" class="form-control" readonly >
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a onclick="return ubah(`<?= $dm->id_permintaan ?>`,`<?= $dm->nim ?>`,`<?= $dm->nama_mhs ?>`,`<?= $dm->prodi ?>`,`<?= $dm->kelas ?>`,`<?= $dm->asal_sekolah ?>`,`<?= $dm->hasil ?>`,`<?= $dm->status ?>`,`<?= $dm->ket ?>`, `<?= $dm->ket_lain ?>`, `<?= $dm->tgl_hasil ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i><span> Ubah</span> 
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $dm->id_permintaan ?>`,`<?= $dm->nim ?>`,`<?= $dm->nama_mhs ?>`)">
            <i class="fas fa-trash"></i><span> Hapus</span>
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
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Nim</label>
                                <input type="text" name="nim" class="form-control" placeholder="NIM"  >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="nama_mhs" class="form-control" placeholder="Nama Mahasiswa"  >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Prodi</label>
                                <input type="text" name="prodi" class="form-control" placeholder="Prodi" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas"   >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah"   >
                            </div>
                            <div class="form-group col-md-2">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value=""  selected hidden>Status</option>
                                    <option value="Belum">Belum</option>
                                    <option value="KKI">KKI</option>
                                    <option value="Kerja">Kerja</option>
                                    <option value="Bermasalah">Bermasalah</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Hasil</label>
                                <select name="hasil" class="form-control">
                                    <option value="Belum">Belum</option>
                                    <option value="Kirim CV">Kirim CV</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Gagal Test">Gagal Test</option>
                                    <option value="Lolos Test">Lolos Test</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Menolak">Menolak</option>
                                    <option value="Tidak Datang Test">Tidak Datang Test</option>
                                    <option value="Tidak Ada Peminat">Tidak Ada Peminat</option>
                                    <option value="Diterima KKI">Diterima KKI</option>
                                </select>
                            </div>
                             <div class="form-group col-md-3">
                                <label>Keterangan</label>
                                <select id="ket" name="ket" class="form-control">
                                    <option value="CNP">CNP</option>
                                    <option value="Sendiri">Sendiri</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div id="lain" class="form-group col-md-4">
                                <label>Keterangan</label>
                                <input type="text" name="ket_lain" class="form-control" placeholder="Keterangan" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tgl_hasil" class="form-control" placeholder="Tanggal Mulai" >
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#lain").hide();
        $("#ket").change(function() {
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

    function ubah(id_permintaan, nim, nama_mhs, prodi, kelas, asal_sekolah, hasil, status, ket, ket_lain,tgl_hasil) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Mahasiswa');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_permintaan"]').val(id_permintaan);
        $('[name="nim"]').val(nim);
        $('[name="nama_mhs"]').val(nama_mhs);
        $('[name="prodi"]').val(prodi);
        $('[name="kelas"]').val(kelas);
        $('[name="asal_sekolah"]').val(asal_sekolah);
        $('[name="hasil"]').val(hasil);
        $('[name="status"]').val(status);
        $('[name="ket"]').val(ket).trigger('change');
        $('[name="ket_lain"]').val(ket_lain);
        $('[name="tgl_hasil"]').val(tgl_hasil);
        document.form.action = '<?= base_url('Master/dt_update_aksi'); ?>';
    }

    function hapus(id_permintaan,nim, nama_mhs) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Mahasiswa');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_permintaan"]').val(id_permintaan);
        $('[name="nim"]').val(nim);
        $('#name-delete').html(nama_mhs);
        document.form.action = '<?= base_url('Master/dt_delete'); ?>';
    }
</script>