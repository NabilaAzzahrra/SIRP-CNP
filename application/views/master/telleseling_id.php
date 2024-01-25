<style>
    .card-header {
        background-color: #0073BD;
    }

    .btn-primary {
        background-color: #0073BD;
    }

    .btn-danger {
        background-color: #ED1C24;
    }

    .btn-warning {
        background-color: #F2994A;
    }

    label {
        color: #000;
        ;
    }

    .b {
        color: #fff;
    }

    .t {
        color: #000;
    }
</style>
<div class="card card-primary">
    <?php
    foreach ($telleseling as $t) {
    ?>



    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-12">
                <label>Perusahaan</label>
                <input value="<?= $t->nama_perusahaan ?>" class="form-control"  disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>Bidang</label>
                <input value="<?= $t->bidang ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-1">
                <label>Relasi</label>
                <input value="<?= $t->relasi ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Alamat</label>
                <input value="<?= $t->alamat ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Kontak Person</label>
                <input value="<?= $t->kontak_person ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-2 ">
                <label>Jabatan</label>
                <input value="<?= $t->jabatan ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-1 ">
                <label>Melalui</label>
                <input value="<?= $t->melalui ?>" class="form-control"  disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>No HP/Tepelon</label>
                <input value="<?= $t->no_telp ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Tanggal Followup</label>
                <input value="<?= $t->tanggal_fu ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-8">
                <label>Hasil Followup</label>
                <input value="<?= $t->hasil_fu ?>" class="form-control"  disabled>
            </div>
        </div>
        <div class="row">
            
            <div class="form-group col-md-4">
                <label>Di tambahkan oleh</label>
                <input value="<?= $t->oleh ?>" class="form-control"  disabled>
            </div>
            <div class="form-group col-md-2">
                <label>Kota</label>
                <input value="<?= $t->kota ?>" class="form-control"  disabled>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a onclick="return ubah(`<?= $t->id_telleseling ?>`, `<?= $t->id_perusahaan ?>`, `<?= $t->bidang ?>`, `<?= $t->relasi ?>`, `<?= $t->alamat ?>`, `<?= $t->kontak_person ?>`, `<?= $t->jabatan ?>`, `<?= $t->no_telp ?>`, `<?= $t->melalui ?>`, `<?= $t->tanggal_fu ?>`, `<?= $t->hasil_fu ?>`)" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i><span class="b"> Ubah</span>
        </a>
        <a class="btn btn-danger btn-sm" onclick="return hapus(`<?= $t->id_telleseling ?>`,`<?= $t->nama_perusahaan ?>`)">
            <i class="fas fa-trash"></i><span class="b"> Hapus</span>
        </a>
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
                    <input type="hidden" name="id_telleseling">
                    <span class="t" id="modal-body-update-or-create">
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <select name="id_perusahaan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Perusahaan" onchange="return getPerusahaan()">
                                <option value="">--PILIH--</option>
                                <?php foreach ($perusahaan as $p) { ?>
                                    <option value="<?= $p->id_perusahaan ?>"><?= $p->nama_perusahaan ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('nama_perusahaan', '<div class="test-small text-danger">', '</div>'); ?>
                        </div>
                        <span id="data-perusahaan"></span>
                        <div class="form-group">
                            <label>Melalui</label>
                            <select name="melalui" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Via">
                                <option value="">--PILIH--</option>
                                <option value="Email">Email</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Kunjungan">Kunjungan</option>
                                <option value="Telepon">Telepon</option>
                            </select>
                            <?= form_error('melalui', '<div class="test-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Tanggal Followup</label>
                                <input type="datetime-local" step="1" name="tanggal_fu" class="form-control" placeholder="Tanggal Followup" >
                                <?= form_error('tanggal_fu', '<div class="test-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Hasil Followup</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="hasil_fu" class="form-control" placeholder="Hasil Followup" >
                                <?= form_error('hasil_fu', '<div class="test-small text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </span>

                    <!--ADD-->
                    <input type="hidden" name="id_telleseling">
                    <span id="modal-body-feedback">
                        <div class="form-group">
                            <label>Melalui</label>
                            <select name="feedback_melalui" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Via">
                                <option value="">--PILIH--</option>
                                <option value="Email">Email</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Kunjungan">Kunjungan</option>
                                 <option value="Telepon">Telepon</option>
                            </select>
                            <?= form_error('feedback_melalui', '<div class="test-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>Hasil Feedback</label>
                                <input onkeyup="this.value = this.value.toUpperCase()" type="text" name="hasil_feedback" class="form-control" placeholder="Hasil Feedback" >
                                <?= form_error('hasil_feedback', '<div class="test-small text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </span>

                    <span class="t" id="modal-body-delete">
                        Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
                    </span>

                    <span class="t" id="modal-body-accept">
                        Yakin untuk menyetujui Follow Up ini ?
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
    $(function() {
        $("#tabelku").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "language": {
                "url": "<?= base_url('assets/plugins/datatables/i18n/id.json'); ?>"
            }
        });
        $('#Modal').on('shown.bs.modal', function() {
            $('[name="id_perusahaan"]').focus();
        });
        $('[name="form"]').validate({
            rules: {
                nama_perusahaan: {
                    required: true
                },
                prodi: {
                    required: true
                },
                kelas: {
                    required: true
                },
                asal_sekolah: {
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
    });

    function getPerusahaan() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-perusahaan').load("getPerusahaan?id_perusahaan=" + id, function() {
            $('[name="alamat"]').val(alamat)
            $('[name="bidang"]').val(bidang)
            $('[name="kota"]').val(kota)
            $('[name="kontak_person"]').val(kontak_person)
            $('[name="jabatan"]').val(jabatan)
            $('[name="no_telp"]').val(no_telp)
        });
    }

    function getP() {
        var id = $('[name="id_perusahaan"]').val();
        $('#data-p').load("getP?id_perusahaan=" + id, function() {
            $('[name="alamat"]').val(alamat)
            $('[name="bidang"]').val(bidang)
            $('[name="kota"]').val(kota)
            $('[name="kontak_person"]').val(kontak_person)
            $('[name="jabatan"]').val(jabatan)
            $('[name="no_telp"]').val(no_telp)
        });
    }

    function feedback(id_telleseling) {
        $('#Modal').modal('show');
        $('#modal-header').html('Feedback');
        $('#batal').removeClass('btn-success').addClass('btn-danger');
        $('#modal-button').removeClass('btn-danger').addClass('btn-success');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-feedback').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('#modal-body-accept').addClass('d-none');
        $('[name="id_telleseling"]').val(id_telleseling);
        document.form.action = '<?= base_url('Master/fb'); ?>';
    }

    function ubah(id_telleseling, nama_perusahaan, bidang, relasi, alamat, kontak_person, jabatan, no_telp, melalui, tanggal_fu, hasil_fu) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Telleseling');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-feedback').addClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('#modal-body-accept').addClass('d-none');
        $('[name="id_telleseling"]').val(id_telleseling);
        $('[name="id_perusahaan"]').val(nama_perusahaan).trigger('change');
        $('[name="bidang"]').val(bidang);
        $('[name="alamat"]').val(alamat);
        $('[name="kontak_person"]').val(kontak_person);
        $('[name="jabatan"]').val(jabatan);
        $('[name="kontak_person"]').val(kontak_person);
        $('[name="no_telp"]').val(no_telp);
        $('[name="melalui"]').val(melalui).trigger('change');
        $('[name="tanggal_fu"]').val(tanggal_fu);
        $('[name="hasil_fu"]').val(hasil_fu);

        document.form.action = '<?= base_url('Master/telleseling_update_aksi'); ?>';
    }

    function hapus(id_telleseling, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Mahasiswa');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-feedback').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('#modal-body-accept').addClass('d-none');
        $('[name="id_telleseling"]').val(id_telleseling);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('Master/telleseling_delete'); ?>';
    }


   function fb(id_telleseling, nama_perusahaan) {
        $('#Modal').modal('show');
        $('#modal-header').html('Follow Up Form Request');
        $('#batal').removeClass('btn-danger').addClass('btn-success');
        $('#modal-button').removeClass('btn-success').addClass('btn-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id_telleseling"]').val(id_telleseling);
        $('#name-delete').html(nama_perusahaan);
        document.form.action = '<?= base_url('Master/fb'); ?>';
    }
</script>