<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .fa-search {
        color: #000000;
    }

    form {
        margin-bottom: 5px;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Perusahaan</th>
                    <th class="text-center">Bidang</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Kontak Person</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">MOU</th>
                    <th class="text-center">Relasi</th>
                    <th class="text-center">Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($perusahaan as $p) {
                    if ($p->sudah_mou == "Sudah") {
                        $bg = "bg-success";
                    } else {
                        $bg = "bg-danger";
                    }

                    if ($p->relasi == "Baru") {
                        $g = "bg-success";
                    } else {
                        $g = "bg-danger";
                    }

                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url('') ?>master/perusahaan_id?id_perusahaan=<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></a></td>
                        <td><?= $p->bidang ?></td>
                        <td><?= $p->alamat ?></td>
                        <td><?= $p->kota ?></td>
                        <td><?= $p->kontak_person ?></td>
                        <td><?= $p->jabatan ?></td>
                        <td><?= $p->no_telp ?></td>
                        <td class="text-center"><span class="badge <?= $bg ?>"><?= $p->sudah_mou ?></span></td>
                        <td class="text-center"><span class="badge <?= $g ?>"><?= $p->relasi ?></span></td>
                        <td class="text-center"><a class="btn btn-danger btn-sm" title="Non-Aktifkan Data" onclick="return verifikasi_nonaktif(`<?= $p->id_perusahaan ?>`,`<?= $p->nama_perusahaan ?>`)">
                                <i class="fas fa-ban"></i>
                            </a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- /.card-body -->
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
                    <span id="modal-body-delete">
                        Yakin untuk Non-Aktif kan <b id="name-delete"></b> dari tabel ini?
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
    function verifikasi_nonaktif(id_perusahaan, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Perusahaan');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_perusahaan"]').val(id_perusahaan);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('Master/verifikasi_nonaktif'); ?>';
    }
</script>