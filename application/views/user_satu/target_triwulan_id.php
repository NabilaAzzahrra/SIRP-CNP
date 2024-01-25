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
                    <th class="text-center" style="width:5px;">Q</th>
                    <th class="text-center">Tahun Akademik</th>
                    <th class="text-center">Akumulasi Target</th>
                    <th class="text-center">Realisasi</th>
                    <th class="text-center">Presentasi</th>
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

                $q1 = 0;
                $q2 = 0;
                $q3 = 0;
                $q4 = 0;

                $rq1 = 0;
                $rq2 = 0;
                $rq3 = 0;
                $rq4 = 0;
                foreach ($breakdown as $d) {

                    if ($rq1 > 0) {
                        $persentasi1 = ($rq1 / $q1) * 100;
                    } else {
                        $persentasi1;
                    }

                    if ($rq2 > 0) {
                        $persentasi2 = ($rq2 / $q2) * 100;
                    } else {
                        $persentasi2;
                    }

                    if ($rq2 > 0) {
                        $persentasi3 = ($rq3 / $q3) * 100;
                    } else {
                        $persentasi3;
                    }

                    if ($rq4 > 0) {
                        $persentasi4 = ($rq4 / $q4) * 100;
                    } else {
                        $persentasi4;
                    }


                    $q1 = ($d->minggu1 + $d->minggu2 + $d->minggu3);
                    $q2 = $q1 + ($d->minggu4 + $d->minggu5 + $d->minggu6);
                    $q3 = $q2 + ($d->minggu7 + $d->minggu8 + $d->minggu9);
                    $q4 = $q3 + ($d->minggu10 + $d->minggu11 + $d->minggu12);

                    $rq1 = (count($rm10) + count($rm11) + count($rm12));
                    $rq2 = (count($rm01) + count($rm02) + count($rm03));
                    $rq3 = (count($rm04) + count($rm05) + count($rm06));
                    $rq4 = (count($rm07) + count($rm08) + count($rm09));



                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                        <td class="text-center"><?= $q1 ?></td>
                        <td class="text-center"><?= $rq1 ?></td>
                        <td class="text-center"><?= round($persentasi1); ?>%</td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                        <td class="text-center"><?= $q2 ?></td>
                        <td class="text-center"><?= $rq2 ?></td>
                        <td class="text-center"><?= round($persentasi1); ?>%</td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                        <td class="text-center"><?= $q3 ?></td>
                        <td class="text-center"><?= $rq3 ?></td>
                        <td class="text-center"><?= round($persentasi1); ?>%</td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $d->tahun_akademik ?></td>
                        <td class="text-center"><?= $q4 ?></td>
                        <td class="text-center"><?= $rq4 ?></td>
                        <td class="text-center"><?= round($persentasi1); ?>%</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
    function getMahasiswa() {
        var id = $('[name="nim"]').val();
        $('#data-mhs').load("getMahasiswa?nim=" + id, function() {});
    }

    function ubah(id_target, tahun_akademik, minggu1, minggu2, minggu3, minggu4, minggu5, minggu6, minggu7, minggu8, minggu9, minggu10, minggu11, minggu12) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Data Usaha');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_target"]').val(id_target);
        $('[name="tahun_akademik"]').val(tahun_akademik);
        $('[name="minggu1"]').val(minggu1);
        $('[name="minggu2"]').val(minggu2);
        $('[name="minggu3"]').val(minggu3);
        $('[name="minggu4"]').val(minggu4);
        $('[name="minggu5"]').val(minggu5);
        $('[name="minggu6"]').val(minggu6);
        $('[name="minggu7"]').val(minggu7);
        $('[name="minggu8"]').val(minggu8);
        $('[name="minggu9"]').val(minggu9);
        $('[name="minggu10"]').val(minggu10);
        $('[name="minggu11"]').val(minggu11);
        $('[name="minggu12"]').val(minggu12);
        document.form.action = '<?= base_url('User_satu/target_update'); ?>';
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
        document.form.action = '<?= base_url('User_satu/breakdown_delete'); ?>';
    }
</script>