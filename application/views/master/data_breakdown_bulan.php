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
    foreach ($breakdown as $d) {
    ?>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width:5px;">No.</th>
                    <th class="text-center">Target M1</th>
                    <th class="text-center">Target M2</th>
                    <th class="text-center">Target M3</th>
                    <th class="text-center">Realisasi M1</th>
                    <th class="text-center">Realisasi M2</th>
                    <th class="text-center">Realisasi M3</th>
                    <th class="text-center">Tahun Akademik</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $persentasi1 = 0;
                $persentasi2 = 0;
                $persentasi3 = 0;
                $persentasi4 = 0;

                $rm1satu = 0;
                $rm2satu = 0;
                $rm3satu = 0;

                $rm1dua = 0;
                $rm2dua = 0;
                $rm3dua = 0;

                $rm1tiga = 0;
                $rm2tiga = 0;
                $rm3tiga = 0;

                $rm1empat = 0;
                $rm2empat = 0;
                $rm3empat = 0;
                foreach ($breakdown as $d) {

                    if ($d->realisasi_1 > 0) {
                        $persentasi1 = ($d->realisasi_1/$d->akumulasi_target_1)*100;
                    }else{
                        $persentasi1;
                    }

                    if ($d->realisasi_2 > 0) {
                        $persentasi2 = ($d->realisasi_2/($d->akumulasi_target_2+$d->akumulasi_target_1))*100;
                    }else{
                        $persentasi2;
                    }

                    if ($d->realisasi_3 > 0) {
                        $persentasi3 = ($d->realisasi_3/($d->akumulasi_target_3+($d->akumulasi_target_2+$d->akumulasi_target_1)))*100;
                    }else{
                        $persentasi3;
                    }

                    if ($d->realisasi_4 > 0) {
                        $persentasi4 = ($d->realisasi_4/($d->akumulasi_target_4 +($d->akumulasi_target_3+($d->akumulasi_target_2+$d->akumulasi_target_1))))*100;
                    }else{
                        $persentasi4;
                    }

                    $rm1satu = ((count($rm10))/($d->akumulasi_target_1/3))*100;
                    $rm2satu = ((count($rm11))/($d->akumulasi_target_1/3))*100;
                    $rm3satu = ((count($rm12))/($d->akumulasi_target_1/3))*100;

                    $rm1dua = ((count($rm01))/($d->akumulasi_target_2/3))*100;
                    $rm2dua = ((count($rm02))/($d->akumulasi_target_2/3))*100;
                    $rm3dua = ((count($rm03))/($d->akumulasi_target_2/3))*100;

                    $rm1tiga = ((count($rm04))/($d->akumulasi_target_3/3))*100;
                    $rm2tiga = ((count($rm05))/($d->akumulasi_target_3/3))*100;
                    $rm3tiga = ((count($rm06))/($d->akumulasi_target_3/3))*100;

                    $rm1empat = ((count($rm07))/($d->akumulasi_target_4/3))*100;
                    $rm2empat = ((count($rm08))/($d->akumulasi_target_4/3))*100;
                    $rm3empat = ((count($rm09))/($d->akumulasi_target_4/3))*100;
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td  class="text-center"><?= $d->akumulasi_target_1/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_1/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_1/3 ?></td>
                        <td class="text-center"><?= $rm1satu ?>%</td>
                        <td class="text-center"><?= $rm2satu ; ?>%</td>
                        <td class="text-center"><?= $rm3satu ; ?>%</td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td  class="text-center"><?= $d->akumulasi_target_2/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_2/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_2/3 ?></td>
                        <td class="text-center"><?= $rm1dua ?>%</td>
                        <td class="text-center"><?= $rm2dua ; ?>%</td>
                        <td class="text-center"><?= $rm3dua ; ?>%</td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td  class="text-center"><?= $d->akumulasi_target_3/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_3/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_3/3 ?></td>
                        <td class="text-center"><?= $rm1tiga ?>%</td>
                        <td class="text-center"><?= $rm2tiga ; ?>%</td>
                        <td class="text-center"><?= $rm3tiga ; ?>%</td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td  class="text-center"><?= $d->akumulasi_target_4/3 ?></td>
                        <td class="text-center"><?= $d->akumulasi_target_4/3?></td>
                        <td class="text-center"><?= $d->akumulasi_target_4/3 ?></td>
                        <td class="text-center"><?= $rm1empat ?>%</td>
                        <td class="text-center"><?= $rm2empat ; ?>%</td>
                        <td class="text-center"><?= $rm3empat ; ?>%</td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
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
    function getMahasiswa() {
        var id = $('[name="nim"]').val();
        $('#data-mhs').load("getMahasiswa?nim=" + id, function() {});
    }

    function ubah(id_breakdown,tahun_akademik, triwulan_1, akumulasi_target_1, realisasi_1, triwulan_2, akumulasi_target_2,realisasi_2,triwulan_3,akumulasi_target_3,realisasi_3,triwulan_4,akumulasi_target_4,realisasi_4) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Usaha');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_breakdown"]').val(id_breakdown);
        $('[name="tahun_akademik"]').val(tahun_akademik);
        $('[name="triwulan_1"]').val(triwulan_1);
        $('[name="akumulasi_target_1"]').val(akumulasi_target_1);
        $('[name="realisasi_1"]').val(realisasi_1);
        $('[name="triwulan_2"]').val(triwulan_2);
        $('[name="akumulasi_target_2"]').val(akumulasi_target_2);
        $('[name="realisasi_2"]').val(realisasi_2);
        $('[name="triwulan_3"]').val(triwulan_3);
        $('[name="akumulasi_target_3"]').val(akumulasi_target_3);
        $('[name="realisasi_3"]').val(realisasi_3);
        $('[name="triwulan_4"]').val(triwulan_4);
        $('[name="akumulasi_target_4"]').val(akumulasi_target_4);
        $('[name="realisasi_4"]').val(realisasi_4);
        document.form.action = '<?= base_url('Master/breakdown_update'); ?>';
    }

    function hapus(id_breakdown, tahun_akademik) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Usaha');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_breakdown"]').val(id_breakdown);
        $('#name-delete').html(tahun_akademik);
        document.form.action = '<?= base_url('Master/breakdown_delete'); ?>';
    }
</script>