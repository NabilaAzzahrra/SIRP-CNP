<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .fa-search {
        color: #000000;
    }
    .text-center{
        vertical-align: middle;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Tahun Akademik</th>
                                    <th class="text-center">Mahasiswa Awal</th>
                                    <th class="text-center">Mahasiswa Bermasalah - Gugur</th>
                                    <th class="text-center">Jumlah Mahasiswa</th>
                                    <th class="text-center">Mahasiswa Wajib Kerja</th>
                                    <th class="text-center">Magang/KKI</th>
                                    <th class="text-center">Kerja</th>
                                    <th class="text-center">Wirausaha</th>
                                    <th class="text-center">CNP</th>
                                    <th class="text-center">Sendiri</th>
                                    <th class="text-center">% Magang/KKI</th>
                                    <th class="text-center">% Kerja</th>
                                    <th class="text-center">% Wirausaha</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                $target_kerja = 0;
                                $total = 0;
                                $persen_kerja = 0;
                                $persen_usaha = 0;
                                $seratus = 100;
                                $bermasalahgugur = 0;
                                $persen_kki = 0;
                                
                                //====INI COPY===//
                                $totjml = 0;
                                $totbermasalahgugur = 0;
                                $tottarget_kerja = 0;
                                $totjumlah_ipk = 0;
                                $totkki = 0;
                                $totkerja = 0;
                                $totberwirausaha = 0;
                                $totcnp = 0;
                                $totsendiri = 0;
                                $totperkki = 0;
                                $total_kki = 0;
                                $totkerja = 0;
                                $total_kerja = 0;
                                $totusaha = 0;
                                $total_usaha = 0;
                                $tkerja = 0;
                                
                                $kki = 0;
                                foreach ($mahasiswa as $m) {
                                    $kki = $m->ojt + $m->kki + $m->msib + $m->pmmb;
                                    
                                    //===INI COPY ===//
                                    $target_kerja = $m->jml - ($m->gugur + $m->bermasalah);
                                    $total = $m->cnp  + $m->sendiri;
                                    $bermasalahgugur = ($m->gugur + $m->bermasalah);

                                    if ($m->berwirausaha > 0) {
                                        $persen_usaha = ($m->berwirausaha / $m->jumlah_ipk) * $seratus;
                                    } else {
                                        $persen_usaha = 0;
                                    }

                                    if ($m->kerja > 0) {
                                        $persen_kerja = ($m->kerja / $target_kerja) * $seratus;
                                    } else {
                                        $persen_kerja = 0;
                                    }

                                    if ($kki > 0) {
                                        $persen_kki = ($kki / $m->jml) * $seratus;
                                    } else {
                                        $persen_kki = 0;
                                    }

                                    $totjml += $m->jml;
                                    $totbermasalahgugur += $bermasalahgugur;
                                    $tottarget_kerja += $target_kerja;
                                    $totjumlah_ipk += $m->jumlah_ipk;
                                    $totkki += $kki;
                                    $tkerja += $m->kerja;
                                    $totberwirausaha += $m->berwirausaha;
                                    $totcnp += $m->cnp;
                                    $totsendiri += $m->sendiri;


                                    $totperkki += round($persen_kki);
                                    $total_kki = $totperkki / count($mahasiswa);

                                    $totkerja += round($persen_kerja);
                                    $total_kerja = $totkerja / count($mahasiswa);

                                    $totusaha += round($persen_usaha);
                                    $total_usaha = $totusaha / count($mahasiswa);

                                    //======== ===//
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $m->prodi ?></td>
                                        <td class="text-center"><?= $m->tahun_akademik ?></td>
                                        <td class="text-center"><?= $m->jml ?></td>
                                        <td class="text-center"><?= $bermasalahgugur ?></td>
                                        <td class="text-center"><?= $target_kerja ?></td>
                                        <td class="text-center"><?= $m->jumlah_ipk ?></td>
                                        <td class="text-center"><?= $kki ?></td>
                                        <td class="text-center"><?= $m->kerja ?></td>
                                        <td class="text-center"><?= $m->berwirausaha ?></td>
                                        <td class="text-center"><?= $m->cnp ?></td>
                                        <td class="text-center"><?= $m->sendiri ?></td>
                                        <td class="text-center"><?= round($persen_kki); ?><span> %</span></td>
                                        <td class="text-center"><?= round($persen_kerja); ?><span> %</span></td>
                                        <td class="text-center"><?= round($persen_usaha); ?><span> %</span></td>
                                    </tr>
                                <?php } ?>
                                <tfoot>
                                <tr>
                                    <td colspan="3" class="text-center"><b>Total</b></td>
                                    <td class="text-center"><b><?= $totjml ?></b></td>
                                    <td class="text-center"><b><?= $totbermasalahgugur ?></b></td>
                                    <td class="text-center"><b><?= $tottarget_kerja ?></b></td>
                                    <td class="text-center"><b><?= $totjumlah_ipk ?></b></td>
                                    <td class="text-center"><b><?= $totkki ?></b></td>
                                    <td class="text-center"><b><?= $tkerja ?></b></td>
                                    <td class="text-center"><b><?= $totberwirausaha ?></b></td>
                                    <td class="text-center"><b><?= $totcnp ?></b></td>
                                    <td class="text-center"><b><?= $totsendiri ?></b></td>
                                    <td class="text-center"><b><?= round($total_kki, 1) ?><span> %</span></b></td>
                                    <td class="text-center"><b><?= round($total_kerja) ?><span> %</span></b></td>
                                    <td class="text-center"><b><?= round($total_usaha); ?><span> %</span></b></td>
                                </tr>
                            </tfoot>
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
                    <div class="card-body">


                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tahun Akademik</th>
                                    <th class="text-center">Total KKI</th>
                                    <th class="text-center">100% Tertempatkan KKI</th>
                                    <th class="text-center">Total Bekerja</th>
                                    <th class="text-center">90% Tertempatkan Bekerja</th>
                                    <th class="text-center">Total Berwirausaha</th>
                                    <th class="text-center">5% Berwirausaha</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                $target_kerja = 0;
                                $total = 0;
                                $persen_kerja = 0;
                                $persen_usaha = 0;
                                $seratus = 100;
                                $bermasalahgugur = 0;
                                $persen_kki = 0;

                                //====INI COPY===//
                                $totjml = 0;
                                $totbermasalahgugur = 0;
                                $tottarget_kerja = 0;
                                $totjumlah_ipk = 0;
                                $totkki = 0;
                                $totkerja = 0;
                                $totberwirausaha = 0;
                                $totcnp = 0;
                                $totsendiri = 0;
                                $totperkki = 0;
                                $total_kki = 0;
                                $totkerja = 0;
                                $total_kerja = 0;
                                $totusaha = 0;
                                $total_usaha = 0;
                                $tkerja = 0;
                                $kki=0;

                                foreach ($mahasiswa as $m) {

                                    $kki = $m->ojt + $m->kki + $m->msib + $m->pmmb;

                                    //===INI COPY ===//
                                    $target_kerja = $m->jml - ($m->gugur + $m->bermasalah);
                                    $total = $m->cnp  + $m->sendiri;
                                    $bermasalahgugur = ($m->gugur + $m->bermasalah);

                                    if ($m->berwirausaha > 0) {
                                        $persen_usaha = ($m->berwirausaha / $m->jumlah_ipk) * $seratus;
                                    } else {
                                        $persen_usaha = 0;
                                    }

                                    if ($m->kerja > 0) {
                                        $persen_kerja = ($m->kerja / $target_kerja) * $seratus;
                                    } else {
                                        $persen_kerja = 0;
                                    }

                                    if ($kki > 0) {
                                        $persen_kki = ($kki / $m->jml) * $seratus;
                                    } else {
                                        $persen_kki = 0;
                                    }

                                    $totjml += $m->jml;
                                    $totbermasalahgugur += $bermasalahgugur;
                                    $tottarget_kerja += $target_kerja;
                                    $totjumlah_ipk += $m->jumlah_ipk;
                                    $totkki += $kki;
                                    $tkerja += $m->kerja;
                                    $totberwirausaha += $m->berwirausaha;
                                    $totcnp += $m->cnp;
                                    $totsendiri += $m->sendiri;


                                    $totperkki += round($persen_kki);
                                    $total_kki = $totperkki / count($mahasiswa);

                                    $totkerja += round($persen_kerja);
                                    $total_kerja = $totkerja / count($mahasiswa);

                                    $totusaha += round($persen_usaha);
                                    $total_usaha = $totusaha / count($mahasiswa);

                                    //======== ===//
                                ?>
                                    <tr hidden>
                                        <td class="text-center"><b><?= $m->tahun_akademik ?></b></td>
                                        <td class="text-center"><b><?= $totkki ?></b></td>
                                        <td class="text-center"><b><?= round($total_kki, 1) ?><span> %</span></b></td>
                                        <td class="text-center"><b><?= $tkerja ?></b></td>
                                        <td class="text-center"><b><?= round($total_kerja) ?><span> %</span></b></td>
                                        <td class="text-center"><b><?= $totberwirausaha ?></b></td>
                                        <td class="text-center"><b><?= round($total_usaha); ?><span> %</span></b></td>
                                    </tr>
                                <?php } ?>
                                <!--INI COPY -->
                            <tfoot>
                                <tr>
                                    <td class="text-center"><b><?= $m->tahun_akademik ?></b></td>
                                    <td class="text-center"><b><?= $totkki ?></b></td>
                                    <td class="text-center"><b><?= round($total_kki, 1) ?><span> %</span></b></td>
                                    <td class="text-center"><b><?= $tkerja ?></b></td>
                                    <td class="text-center"><b><?= round($total_kerja) ?><span> %</span></b></td>
                                    <td class="text-center"><b><?= $totberwirausaha ?></b></td>
                                    <td class="text-center"><b><?= round($total_usaha); ?><span> %</span></b></td>
                                </tr>
                            </tfoot>
                            <!---->
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
    function myfun() {
        ("#tabelku").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                "url": "<?php echo base_url('Master/getdata'); ?>",
                "type": "post",
                "data": {
                    tahun_akademik: $('#ta').val(),
                    prodi: $('#pr').val(),
                }
            },
            bDestroy: true,
            dom: 'Ifrtip8',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
        $('#Modal').on('shown.bs.modal', function() {
            $('[name="id_owner"]').focus();
        });
        $('.select2').select2({
            dropdownParent: $('#Modal')
        });
        $('[name="harga_beli"]').inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            digits: 0,
            digitsOptional: true
        });
        $('[name="harga_jual"]').inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            digits: 0,
            digitsOptional: true
        });
        $('[name="form"]').validate({
            rules: {
                id_owner: {
                    required: true
                },
                id_kategori: {
                    required: true
                },
                nama_produk: {
                    required: true
                },
                qty: {
                    required: true
                },
                harga_beli: {
                    required: true
                },
                harga_jual: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#ta').change(function() {
            myfun();
        });

        $('#pr').change(function() {
            myfun();
        });

    }

    //myfun();
</script>