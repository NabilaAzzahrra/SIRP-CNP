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
                            <i class="fas fa-plus"></i> Input Breakdown
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5px;">No.</th>
                                    <th class="text-center" >Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($breakdown as $d) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td><a href ="<?=base_url('') ?>user_dua/breakdown_id?id_breakdown=<?= $d->id_breakdown ?>"><?= $d->tahun_akademik ?></a></td>
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
                    <input type="hidden" name="id_breakdown">
                    <span id="modal-body-update-or-create">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Tahun Akademik</label>
                                <input type="number" name="tahun_akademik" class="form-control" placeholder="Tahun Akademik">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Triwulan 1</label>
                                <input type="number" name="triwulan_1" class="form-control" placeholder="Triwulan 1">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Akumulasi Target 1</label>
                                <input type="number" name="akumulasi_target_1" class="form-control" placeholder="Akumulasi Target 1">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Realisasi 1</label>
                                <input type="number" name="realisasi_1" class="form-control" placeholder="Realisasi 1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Triwulan 2</label>
                                <input type="number" name="triwulan_2" class="form-control" placeholder="Triwulan 2">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Akumulasi Target 2</label>
                                <input type="number" name="akumulasi_target_2" class="form-control" placeholder="Akumulasi Target 2">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Realisasi 2</label>
                                <input type="number" name="realisasi_2" class="form-control" placeholder="Realisasi 2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Triwulan 3</label>
                                <input type="number" name="triwulan_3" class="form-control" placeholder="Triwulan 3">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Akumulasi Target 3</label>
                                <input type="number" name="akumulasi_target_3" class="form-control" placeholder="Akumulasi Target 3">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Realisasi 3</label>
                                <input type="number" name="realisasi_3" class="form-control" placeholder="Realisasi 3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Triwulan 4</label>
                                <input type="number" name="triwulan_4" class="form-control" placeholder="Triwulan 4">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Akumulasi Target 4</label>
                                <input type="number" name="akumulasi_target_4" class="form-control" placeholder="Akumulasi Target 4">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Realisasi 4</label>
                                <input type="number" name="realisasi_4" class="form-control" placeholder="Realisasi 4">
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
        $('[name="id_breakdown"]').val("");
        $('[name="triwulan_1"]').val("");
        $('[name="akumulasi_target_1"]').val("");
        $('[name="realisasi_1"]').val("");
        $('[name="triwulan_2"]').val("");
        $('[name="akumulasi_target_2"]').val("");
        $('[name="realisasi_2"]').val("");
        $('[name="triwulan_3"]').val("");
        $('[name="akumulasi_target_3"]').val("");
        $('[name="realisasi_3"]').val("");
        $('[name="triwulan_4"]').val("");
        $('[name="akumulasi_target_4"]').val("");
        $('[name="realisasi_4"]').val("");
        $('[name="tahun_akademik"]').val("");
        document.form.action = '<?= base_url('User_dua/breakdown_add'); ?>';
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
        document.form.action = '<?= base_url('User_dua/prodi_update'); ?>';
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
        document.form.action = '<?= base_url('User_dua/prodi_delete'); ?>';
    }
</script>