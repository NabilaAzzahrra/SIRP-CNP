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
                            <i class="fas fa-plus"></i> Input Target
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5px;">No.</th>
                                    <th class="text-center">Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($breakdown as $d) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td><a href="<?= base_url('') ?>master/target_bulan_id?id_target=<?= $d->id_target ?>"><?= $d->tahun_akademik ?></a></td>
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
                    <input type="hidden" name="id_target">
                    <span id="modal-body-update-or-create">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Tahun Akademik</label>
                                <input type="text" name="tahun_akademik" class="form-control" placeholder="Tahun Akademik">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 1</label>
                                <input type="number" name="minggu1" class="form-control" placeholder="Target Minggu 1">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 2</label>
                                <input type="number" name="minggu2" class="form-control" placeholder="Target Minggu 2">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 3</label>
                                <input type="number" name="minggu3" class="form-control" placeholder="Target Minggu 3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Target Minggu 4</label>
                                <input type="number" name="minggu4" class="form-control" placeholder="Target Minggu 4">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 5</label>
                                <input type="number" name="minggu5" class="form-control" placeholder="Target Minggu 5">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 6</label>
                                <input type="number" name="minggu6" class="form-control" placeholder="Target Minggu 6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Target Minggu 7</label>
                                <input type="number" name="minggu7" class="form-control" placeholder="Target Minggu 7">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 8</label>
                                <input type="number" name="minggu8" class="form-control" placeholder="Target Minggu 8">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 9</label>
                                <input type="number" name="minggu9" class="form-control" placeholder="Target Minggu 9">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Target Minggu 10</label>
                                <input type="number" name="minggu10" class="form-control" placeholder="Target Minggu 10">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 11</label>
                                <input type="number" name="minggu11" class="form-control" placeholder="Target Minggu 11">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Target Minggu 12</label>
                                <input type="number" name="minggu12" class="form-control" placeholder="Target Minggu 12">
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
    function tambah() {
        $('#Modal').modal('show');
        $('#modal-header').html('Input Breakdown');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_target"]').val("");
        $('[name="tahun_akademik"]').val("");
        $('[name="minggu1"]').val("");
        $('[name="minggu2"]').val("");
        $('[name="minggu3"]').val("");
        $('[name="minggu4"]').val("");
        $('[name="minggu5"]').val("");
        $('[name="minggu6"]').val("");
        $('[name="minggu7"]').val("");
        $('[name="minggu8"]').val("");
        $('[name="minggu9"]').val("");
        $('[name="minggu10"]').val("");
        $('[name="minggu11"]').val("");
        $('[name="minggu12"]').val("");
        document.form.action = '<?= base_url('Master/target_add'); ?>';
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
        document.form.action = '<?= base_url('Master/prodi_update'); ?>';
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
        document.form.action = '<?= base_url('Master/prodi_delete'); ?>';
    }
</script>