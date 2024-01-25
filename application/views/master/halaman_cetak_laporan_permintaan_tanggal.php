<style>
    .fa-minus {
        color: #000000;
    }

    .fa-times {
        color: #000000;
    }

    .fa-plus {
        color: #fff;
    }

    .card-cc {
        background-color: #0073BD;
    }

    .card-title {
        color: #fff;
    }

    .fa-minus {
        color: #fff;
    }

    .fa-times {
        color: #fff;
    }

    .bg-cc {
        background-color: #0073BD;
    }

    .jdl {
        font-weight: bold;
    }

    .bg-dd {
        background-color: #ED1C24;
    }

    .btn-primary {
        background-color: #0073BD;
    }

    #load {
        width: 100%;
        height: 100%;
        position: fixed;
        text-indent: 100%;
        background: #e0e0e0 url('../assets/template/dist/img/images/loading.gif') no-repeat center;
        z-index: 1;
        opacity: 0.4;
        background-size: 8%;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <button onclick="location.href='<?= base_url('Master/export'); ?>'" class="btn btn-success">Export to Excel</button>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" border="1" cellspacing="0" cellpadding="5" style="margin:auto">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Perusahaan</th>
                                    <th rowspan="2">Bidang</th>
                                    <th rowspan="2">Kota</th>
                                    <th rowspan="2">Relasi</th>
                                    <th rowspan="2">PIC</th>
                                    <th rowspan="2">No Telepon</th>
                                    <th rowspan="2">Posisi yang dibutuhkan</th>
                                    <th colspan="3">Kandidat</th>
                                    <th rowspan="2">Hasil</th>
                                    <th rowspan="2">Status</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Mahasiswa</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $nom = 1;
                                $totaldata = "";
                                $totalsbelum = 0;
                                $id_perusahaan = "";
                                foreach ($permintaan as $d) {
                                    $totaldata = count($permintaan);
                                    //$totalsbelum = count($permintaan);
                                    // if ($id_perusahaan == $d->id_perusahaan) {
                                ?>
                                        <!-- <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= $nom++ ?></td>
                                            <td><?= $d->nama_mhs ?></td>
                                            <td><?= $d->kelas ?></td>
                                            <td><?= $d->hasil ?></td>
                                            <td><?= $d->status ?></td>
                                            <td><?= $d->ket_lain ?></td>
                                        </tr> -->
                                    <?php
                                    // } else {
                                    //     $id_perusahaan = $d->id_perusahaan;
                                    // ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $d->nama_perusahaan ?></td>
                                            <td><?= $d->bidang ?></td>
                                            <td><?= $d->kota ?></td>
                                            <td><?= $d->relasi ?></td>
                                            <td><?= $d->kontak_person ?></td>
                                            <td><?= $d->no_telp ?></td>
                                            <td><?= $d->posisi_yang_dibutuhkan ?></td>
                                            <td><?= $nom++ ?></td>
                                            <td><?= $d->nama_mhs ?></td>
                                            <td><?= $d->kelas ?></td>
                                            <td><?= $d->hasil ?></td>
                                            <td><?= $d->status ?></td>
                                            <td><?= $d->ket_lain ?></td>
                                        </tr>
                                    <?php
                                   // }
                                    ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table><br>

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