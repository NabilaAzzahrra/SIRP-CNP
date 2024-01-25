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

                <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Perusahaan</th>
                                    <th class="text-center">Relasi</th>
                                    <th class="text-center">Bidang</th>
                                    <th class="text-center">Type Perusahaan</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Kota</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Fax</th>
                                    <th class="text-center">Kode Pos</th>
                                    <th class="text-center">Kontak Person</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">No Telepon</th>
                                    <th class="text-center">Tingkat</th>
                                    <th class="text-center">MOU</th>
                                    <th class="text-center">Tanggal Mulai</th>
                                    <th class="text-center">Tanggal Berakhir</th>
                                    <th class="text-center">Sumber</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($perusahaan as $d) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $d->nama_perusahaan ?></td>
                                        <td><?= $d->relasi ?></td>
                                        <td><?= $d->bidang ?></td>
                                        <td><?= $d->type_perusahaan ?></td>
                                        <td><?= $d->alamat ?></td>
                                        <td><?= $d->kota ?></td>
                                        <td><?= $d->email ?></td>
                                        <td><?= $d->fax ?></td>
                                        <td><?= $d->kode_pos ?></td>
                                        <td><?= $d->kontak_person ?></td>
                                        <td><?= $d->jabatan ?></td>
                                        <td><?= $d->no_telp ?></td>
                                        <td><?= $d->tingkat ?></td>
                                        <td><?= $d->sudah_mou ?></td>
                                        <td><?= $d->tanggal_mulai ?></td>
                                        <td><?= $d->tanggal_berakhir ?></td>
                                        <td><?= $d->sumber ?></td>
                                        <td><?= $d->ket ?></td>
                                    </tr>
                                <?php } ?>
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