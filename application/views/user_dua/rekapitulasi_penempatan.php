<style>
    .btn-primary {
        background-color: #0073BD;
    }

    .fa-search {
        color: #000000;
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
                                    <th class="text-center">jml Mahasiswa</th>
                                    <th class="text-center">Target KKI</th>
                                    <th class="text-center">Gugur</th>
                                    <th class="text-center">Bermasalah</th>
                                    <th class="text-center">Target Keja</th>
                                    <th class="text-center">CNP</th>
                                    <th class="text-center">Sendiri</th>
                                    <th class="text-center">Wirausaha</th>
                                    <th class="text-center">Total</th>
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
                                
                                $totjml = 0;
                                $totkki =0;
                                $totgugur = 0;
                                $totbermasalah = 0;
                                $tottarget_kerja=0;
                                $totcnp =0;
                                $totsendiri =0;
                                $totusaha = 0;
                                $ttotal=0;
                                $totpkerja = 0;
                                $totpusaha=0;
                                foreach ($mahasiswa as $m) {
                                    $target_kerja = $m->jumlah - ($m->gugur + $m->bermasalah);
                                    $total = $m->cnp  + $m->sendiri;
                                    if($total >= 0){
                                        $persen_kerja = ($total / $target_kerja) * $seratus;
                                    }else{
                                        $persen_kerja;
                                    }
                                    if($m->berwirausaha != 0){
                                        $persen_usaha = ($m->berwirausaha / $target_kerja) * $seratus;
                                    }else{
                                        $persen_usaha;
                                    }
                                    
                                    $totjml += $m->jumlah;
                                    $totkki += $m->jumlah;
                                    $totgugur += $m->gugur;
                                    $totbermasalah += $m->bermasalah;
                                    $tottarget_kerja += $target_kerja ;
                                    $totcnp += $m->cnp;
                                    $totsendiri += $m->sendiri;
                                    $totusaha += $m->berwirausaha;
                                    $ttotal +=  $total;
                                    $totpkerja += round($persen_kerja, 2);
                                    $total_kerja = $totpkerja/count($mahasiswa);
                                    $totpusaha += round($persen_usaha, 2);
                                    $total_usaha = $totpusaha/count($mahasiswa);
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td ><?= $m->prodi ?></td>
                                        <td class="text-center"><?= $m->jumlah ?></td>
                                        <td class="text-center"><?= $m->jumlah ?></td>
                                        <td class="text-center"><?= $m->gugur ?></td>
                                        <td class="text-center"><?= $m->bermasalah ?></td>
                                        <td class="text-center"><?= $target_kerja ?></td>
                                        <td class="text-center"><?= $m->cnp ?></td>
                                        <td class="text-center"><?= $m->sendiri ?></td>
                                        <td class="text-center"><?= $m->berwirausaha ?></td>
                                        <td class="text-center"><?= $total ?></td>
                                        <td class="text-center"><?= round($persen_kerja,2) ?><span> %</span></td>
                                        <td class="text-center"><?= round($persen_usaha,2) ?><span> %</span></td>
                                    </tr>
                                <?php } ?>
                                <tfoot>
                                <tr>
                                    <th colspan="2" class="text-center"><b>Total</b></th>
                                    <th class="text-center"><b><?= $totjml ?></b></th>
                                    <th class="text-center"><b><?= $totkki ?></b></th>
                                    <th class="text-center"><b><?= $totgugur ?></b></th>
                                    <th class="text-center"><b><?= $totbermasalah ?></b></th>
                                    <th class="text-center"><b><?= $tottarget_kerja ?></b></th>
                                    <th class="text-center"><b><?= $totcnp ?></b></th>
                                    <th class="text-center"><b><?= $totsendiri ?></b></th>
                                    <th class="text-center"><b><?= $totusaha ?></b></th>
                                    <th class="text-center"><b><?= $ttotal?></b></th>
                                    <th class="text-center"><b><?= round($total_kerja, 1) ?><span> %</span></b></th>
                                    <th class="text-center"><b><?= round($total_usaha) ?><span> %</span></b></th>
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
 
                                 $totjml = 0;
                                 $totkki =0;
                                 $totgugur = 0;
                                 $totbermasalah = 0;
                                 $tottarget_kerja=0;
                                 $totcnp =0;
                                 $totsendiri =0;
                                 $totusaha = 0;
                                 $ttotal=0;
                                 $totpkerja = 0;
                                 $totpusaha=0;
                                foreach ($mahasiswa as $m) {


                                    $target_kerja = $m->jumlah - ($m->gugur + $m->bermasalah);
                                    $total = $m->cnp  + $m->sendiri;

                                    if ($total > 0) {
                                        $persen_kerja = ($total / $target_kerja) * $seratus;
                                    } else {
                                        $persen_kerja = 0;
                                    }

                                    if ($m->berwirausaha > 0) {
                                        $persen_usaha = ($m->berwirausaha / $target_kerja) * $seratus;
                                    } else {
                                        $persen_usaha = 0;
                                    }

                                    $totjml += $m->jumlah;
                                    $totkki += $m->jumlah;
                                    $totgugur += $m->gugur;
                                    $totbermasalah += $m->bermasalah;
                                    $tottarget_kerja += $target_kerja ;
                                    $totcnp += $m->cnp;
                                    $totsendiri += $m->sendiri;
                                    $totusaha += $m->berwirausaha;
                                    $ttotal +=  $total;
                                    $totpkerja += round($persen_kerja, 2);
                                    $total_kerja = $totpkerja/count($mahasiswa);
                                    $totpusaha += round($persen_usaha, 2);
                                    $total_usaha = $totpusaha/count($mahasiswa);

                                    //======== ===//
                                ?>
                                    <tr hidden>
                                        <td class="text-center"><b><?= $m->tahun_akademik ?></b></td>
                                        <td class="text-center"><b><?= $ttotal ?></b></td>
                                        <td class="text-center"><b><?= round($total_kerja, 1) ?><span> %</span></b></td>
                                        <td class="text-center"><b><?= $totusaha?></b></td>
                                        <td class="text-center"><b><?= round($total_usaha); ?><span> %</span></b></td>
                                    </tr>
                                <?php } ?>
                                <!--INI COPY -->
                            <tfoot>
                                <tr>
                                    <td class="text-center"><b><?= $m->tahun_akademik ?></b></td>
                                    <td class="text-center"><b><?= $ttotal ?></b></td>
                                    <td class="text-center"><b><?= round($total_kerja, 1) ?><span> %</span></b></td>
                                    <td class="text-center"><b><?= $totusaha ?></b></td>
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
                "url": "<?php echo base_url('User_dua/getdata'); ?>",
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