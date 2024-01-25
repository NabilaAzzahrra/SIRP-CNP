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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outlin">
                    <div class="card-header">
                        <button id="tambahkan" class="btn btn-primary btn-sm float-left" onclick="return tambah()">
                            <i class="fas fa-plus"></i> Tambah Prodi
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($prodi as $d) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td><?= $d->prodi ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-primary" onclick="return ubah(`<?= $d->id_prodi ?>`, `<?= $d->prodi ?>`)"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger" onclick="return hapus(`<?= $d->id_prodi ?>`, `<?= $d->prodi ?>`)"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_prodi">
                    <span id="modal-body-update-or-create">
                        <div class="form-group">
                            <label>Prodi</label>
                            <input type="text" name="prodi" class="form-control" placeholder="Prodi">
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
    function tambah() {
        $('#Modal').modal('show');
        $('#modal-header').html('Tambah Prodi');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_prodi"]').val("");
        $('[name="prodi"]').val("");
        document.form.action = '<?= base_url('User_satu/prodi_add'); ?>';
    }

    function ubah(id_prodi, prodi) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Prodi');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_prodi"]').val(id_prodi);
        $('[name="prodi"]').val(prodi);
        document.form.action = '<?= base_url('User_satu/prodi_update'); ?>';
    }

    function hapus(id_prodi, prodi) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Prodi');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_prodi"]').val(id_prodi);
        $('#name-delete').html(prodi);
        document.form.action = '<?= base_url('User_satu/prodi_delete'); ?>';
    }
</script>