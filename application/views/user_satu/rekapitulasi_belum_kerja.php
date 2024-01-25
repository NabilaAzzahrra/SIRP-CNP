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
                                    <th class="text-center">Jumlah Mahasiswa</th>
                                    <th class="text-center">Belum Kerja</th>
                                    <th class="text-center">Persentase</th>
                                    <th class="text-center">Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                $jumlah_mahasiswa=0;
                                $target_kerja = 0;
                                $total = 0;
                                $persen_blm = 0;
                                $persen_total = 0;
                                $seratus = 100;
                                $total_jumlah_mahasiswa = 0;
                                $jml_blm = 0;
                                foreach ($mahasiswa as $m) {
                                    $jumlah_mahasiswa = ($m->jumlah-($m->gugur+$m->bermasalah));
                                    $persen_blm = ($m->jumlah_belum_kerja / $jumlah_mahasiswa) * $seratus;
                                    $total_jumlah_mahasiswa += $jumlah_mahasiswa;
                                    $jml_blm += $m->jumlah_belum_kerja;
                                    $persen_total = ($jml_blm / $total_jumlah_mahasiswa) * $seratus;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $m->prodi ?></td>
                                        <td class="text-center"><?= $jumlah_mahasiswa ?></td>
                                        <td class="text-center"><?= $m->jumlah_belum_kerja ?></td>
                                        <td class="text-center"><?= round($persen_blm); ?><span> %</span></td>
                                        <td class="text-center"><?= $m->tahun_akademik ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                             <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-center">Total</th>
                                        <th class="text-center"><?= $total_jumlah_mahasiswa ?></th>
                                        <th class="text-center"><?= $jml_blm ?></th>
                                        <th colspan="2" class="text-center"><?= round($persen_total, 2); ?><span> %</span></th>
                                    </tr>
                            </tfoot>

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